<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class ShopmanageController extends Controller
{
    public function index($id)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shop = Shop::with(['area', 'genre'])->Id($id)->first();
        if (Auth::id() == $shop->user_id) {
            return view('Shopmanage.index', compact('shop', 'areas', 'genres'));
        } else {
            return redirect('login');
        }
    }
    public function create()
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view('Shopmanage.create', compact('areas', 'genres'));
    }

    public function post(ShopRequest $request)
    {
        if ($request->id != Null) {
            $shop = Shop::Id($request->id)->first();
            $form = $request->all();
            unset($form['_token']);
            if ($request->picture != Null) {
                $dir = 'public/images/' . $form['id'];
                Storage::deleteDirectory($dir);
                $file_name = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs($dir, $file_name);
                $form["picture"] = $file_name;
            }
            $shop->fill($form)->save();
            return redirect(url('/shopmanage', [$shop->id]));
        } else {
            $shop = new Shop;
            $form = $request->all();
            unset($form['_token']);
            $form["id"] = Uuid::uuid7()->toString();
            if ($request->picture != Null) {
                $dir = 'public/images/' . $form['id'];
                Storage::deleteDirectory($dir);
                $file_name = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs($dir, $file_name);
                $form["picture"] = $file_name;
            }
            $shop->fill($form)->save();
            return redirect(url('/shopmanage', [$form["id"]]));
        }
    }
    public function delete(Request $request)
    {
        $dir = 'public/images/' . $request->id;
        Storage::deleteDirectory($dir);
        Shop::Id($request->id)->first()->delete();
        return redirect('/mypage');
    }
    public function csvImport()
    {
        return view('Shopmanage.csv');
    }
    public function csvImportPost(Request $request)
    {
        $shop = new Shop();
        // CSVファイルが存在するかの確認
        if ($request->hasFile('csvFile')) {
            //拡張子がCSVであるかの確認
            if ($request->csvFile->getClientOriginalExtension() !== "csv") {
                throw new Exception('不適切な拡張子です。');
            }
            //ファイルの保存
            $newCsvFileName = $request->csvFile->getClientOriginalName();
            $request->csvFile->storeAs('public/csv', $newCsvFileName);
        } else {
            throw new Exception('CSVファイルの取得に失敗しました。');
        }
        //保存したCSVファイルの取得
        $csv = Storage::disk('local')->get("public/csv/{$newCsvFileName}");
        // OS間やファイルで違う改行コードをexplode統一
        $csv = str_replace(array("\r\n", "\r"), "\n", $csv);
        // $csvを元に行単位のコレクション作成。explodeで改行ごとに分解
        $uploadedData = collect(explode("\n", $csv));
        // テーブルとCSVファイルのヘッダーの比較
        $header = collect($shop->csvHeader());
        $uploadedHeader = collect(explode(",", $uploadedData->shift()));
        if ($header->count() !== $uploadedHeader->count()) {
            throw new Exception('Error:ヘッダーが一致しません');
        }
        // 連想配列のコレクションを作成
        //combine 一方の配列をキー、もう一方を値として一つの配列生成。haederをキーとして、一つ一つの$oneRecordと組み合わせて、連想配列のコレクション作成
        try {
            $shops = $uploadedData->map(fn ($oneRecord) => $header->combine(collect(explode(",", $oneRecord))));
        } catch (Exception $e) {
            throw new Exception('Error:ヘッダーが一致しません');
        }
        foreach ($shops as $form) {
            $shop = new Shop();
            $form['id'] = Uuid::uuid7()->toString();
            $form['user_id'] = $request->user_id;
            $shop->fill($form->toArray())->save();
        }
        return redirect(url('/mypage'));
    }
}
