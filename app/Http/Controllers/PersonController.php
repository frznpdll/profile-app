<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Services\SortService;
use App\Http\Services\ProfileService;

class PersonController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function showAll(ProfileService $profileService)
    {
        $persons = Person::latest()->get();
        $profileList = $profileService->to_list($persons);

        return response()->json($profileList, JSON_UNESCAPED_UNICODE);
    }

    public function showSort(Request $request, ProfileService $profileService, Person $person)
    {
        $activeList = json_decode($request->input('active'));
        $order = $request->input('order');

        $sortServece = new SortService($activeList, $order);
        $persons = $sortServece->sort();

        $profileList = $profileService->to_list($persons);

        return response()->json($profileList, JSON_UNESCAPED_UNICODE);
    }


}
