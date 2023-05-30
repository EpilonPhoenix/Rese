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
        $shop=Shop::with(['area','genre'])->Id($id)->first();
        if (Auth::id() == $shop->user_id)
        {
            return view('Shopmanage.index',compact('shop','areas','genres'));
        }else {
            return redirect('login');
        }
    }
    public function create()
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view('Shopmanage.create',compact('areas','genres'));
    }

    public function post(ShopRequest $request)
    {
        if ($request->id !=Null)
        {
            $shop = Shop::Id($request->id)->first();
            $form = $request->all();
            unset($form['_token']);
            if ($form['picture'] != Null)
            {
                $dir = 'public/images/'.$form['id'];
                Storage::deleteDirectory($dir);
                $file_name = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs($dir, $file_name);
                $form["picture"]=$file_name;
            }
            $shop->fill($form)->save();
            return redirect(url('/shopmanage',[$shop->id]));
        }else{
            $shop = new Shop;
            $form = $request->all();
            unset($form['_token']);
            $form["id"]= Uuid::uuid7()->toString();
            if ($form['picture'] != Null)
            {
                $dir = 'public/images/'.$form['id'];
                Storage::deleteDirectory($dir);
                $file_name = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs($dir, $file_name);
                $form["picture"]=$file_name;
            }
            $shop->fill($form)->save();
            return redirect(url('/shopmanage',[$form["id"]]));
        }
    }
    public function delete(Request $request)
    {
        $dir = 'public/images/'.$request->id;
        Storage::deleteDirectory($dir);
        Shop::Id($request->id)->first()->delete();
        return redirect('/mypage');
    }

}
