<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Shop;


class HomeController extends Controller
{
    public function index()
    {
        $valarr = array('sort' => Null, 'area' => Null, 'genre' => Null, 'text' => Null);
        $areas = Area::all();
        $genres = Genre::all();
        $collect  = collect();

        if (Auth::check()) {
            $user = User::IdEq(Auth::id())->first();
            if ($user->role_id == 1) {
                $shops = Shop::with(['area', 'genre', 'favorite'])->get();
                return view('Home.owner', compact('user', 'areas', 'genres', 'shops', 'valarr'));
            } elseif ($user->role_id == 2) {
                $shops = Shop::with(['area', 'genre', 'favorite'])->Owner($user->id)->get();
                return view('Home.owner', compact('user', 'areas', 'genres', 'shops', 'valarr'));
            } else
                $shops = Shop::with(['area', 'genre', 'favorite'])->get();
            return view('Home.index', compact('user', 'areas', 'genres', 'collect', 'shops', 'valarr'));
        } else {
            $shops = Shop::with(['area', 'genre'])->get();
            return view('Home.index', compact('areas', 'genres', 'collect', 'shops', 'valarr'));
        }
    }
    public function post(Request $request)
    {
        $valarr = array('sort' => $request->sort, 'area' => $request->area, 'genre' => $request->genre, 'text' => $request->search);
        $areas = Area::all();
        $genres = Genre::all();
        $collect  = collect();
        if (Auth::check()) {
            $user = User::IdEq(Auth::id())->first();
            if ($user->role_id == 1) {
                $shops = Shop::with(['area', 'genre', 'favorite'])->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
                return view('Home.owner', compact('user', 'areas', 'genres', 'shops', 'valarr'));
            } elseif ($user->role_id == 2) {
                $shops = Shop::with(['area', 'genre', 'favorite'])->Owner($user->id)->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
                return view('Home.owner', compact('user', 'areas', 'genres', 'shops', 'valarr'));
            } else
                $shops = Shop::with(['area', 'genre', 'favorite'])->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
            switch ($request->sort) {
                case 'random':
                    $shops = $shops->shuffle();
                    break;
                case 'descending':
                    $shops = $shops->shuffle();
                    $reviews = Review::all();
                    $reviews = $reviews->groupBy('shop_id');
                    foreach ($reviews as $review) {
                        $c  = collect(['shop_id' => $review->first()['shop_id'], 'evaluate' => $review->avg('evaluate')]);
                        $shop = $shops->where('id', $c['shop_id'])->values()->toArray();
                        $shop = $shop[0];
                        $shop['evaluate'] = $c['evaluate'];
                        $collect->push(collect($shop));
                        $shops->forget(($shops->where('id', $c['shop_id'])->keys())[0]);
                    }
                    $collect = $collect->sortByDesc('evaluate');
                    break;
                case 'ascending':
                    $shops = $shops->shuffle();
                    $reviews = Review::all();
                    $reviews = $reviews->groupBy('shop_id');
                    foreach ($reviews as $review) {
                        $c  = collect(['shop_id' => $review->first()['shop_id'], 'evaluate' => $review->avg('evaluate')]);
                        $shop = $shops->where('id', $c['shop_id'])->values()->toArray();
                        $shop = $shop[0];
                        $shop['evaluate'] = $c['evaluate'];
                        $collect->push(collect($shop));
                        $shops->forget(($shops->where('id', $c['shop_id'])->keys())[0]);
                    }
                    $collect = $collect->sortBy('evaluate');
                    break;
                default:
                    break;
            }
            return view('Home.index', compact('user', 'areas', 'genres', 'collect', 'shops', 'valarr'));
        } else {
            $shops = Shop::with(['area', 'genre'])->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
            switch ($request->sort) {
                case 'random':
                    $shops = $shops->shuffle();
                    break;
                case 'descending':
                    $shops = $shops->shuffle();
                    $reviews = Review::all();
                    $reviews = $reviews->groupBy('shop_id');
                    foreach ($reviews as $review) {
                        $c  = collect(['shop_id' => $review->first()['shop_id'], 'evaluate' => $review->avg('evaluate')]);
                        $shop = $shops->where('id', $c['shop_id'])->values()->toArray();
                        $shop = $shop[0];
                        $shop['evaluate'] = $c['evaluate'];
                        $collect->push(collect($shop));
                        $shops->forget(($shops->where('id', $c['shop_id'])->keys())[0]);
                    }
                    $collect = $collect->sortByDesc('evaluate');
                    break;
                case 'ascending':
                    $shops = $shops->shuffle();
                    $reviews = Review::all();
                    $reviews = $reviews->groupBy('shop_id');
                    foreach ($reviews as $review) {
                        $c  = collect(['shop_id' => $review->first()['shop_id'], 'evaluate' => $review->avg('evaluate')]);
                        $shop = $shops->where('id', $c['shop_id'])->values()->toArray();
                        $shop = $shop[0];
                        $shop['evaluate'] = $c['evaluate'];
                        $collect->push(collect($shop));
                        $shops->forget(($shops->where('id', $c['shop_id'])->keys())[0]);
                    }
                    $collect = $collect->sortBy('evaluate');
                    break;
                default:
                    break;
            }
            return view('Home.index', compact('areas', 'genres', 'collect', 'shops', 'valarr'));
        }
    }
}
