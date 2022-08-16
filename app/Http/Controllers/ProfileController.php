<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Services\SortService;
use App\Http\Services\ProfileService;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    // データベースから全てのデータを取得して，それをajax通信で返す
    public function showAll(ProfileService $profileService)
    {
        $persons = Person::latest()->get();                     // データベースから全てのデータを取得する
        $profileList = $profileService->to_list($persons);      // オブジェクトを連想配列に変換する

        return response()->json($profileList, JSON_UNESCAPED_UNICODE);      // ajax通信
    }

    // データベースから項目にそったデータの取得と並べ替えを行い，それをajax通信で返す
    public function showSort(Request $request, ProfileService $profileService)
    {
        $activeList = json_decode($request->input('active'));   // 配列のデータを取得する（並べ替える項目）
        $order = $request->input('order');                      // 文字列のデータを取得する（並べ替える順番）

        $sortServece = new SortService($activeList, $order);    // 並べ替えのためのクラスのインスタンスの作成
        $persons = $sortServece->sort();                        // クラス内の並べ替える関数を実行し，結果をオブジェクトで得る

        $profileList = $profileService->to_list($persons);      // オブジェクトを連想配列に変換する

        return response()->json($profileList, JSON_UNESCAPED_UNICODE);      // ajax通信
    }

}
