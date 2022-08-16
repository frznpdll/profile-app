<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Services\SortService;
use App\Http\Services\ProfileService;

class PersonController extends Controller
{
    public function create(Request $request)
    {
        $new_person = json_decode($request->input('person'));

        $person = new Person;
        $person->falimy_name = $new_person->family_name;
        $person->first_name = $new_person->first_name;
        $person->age = $new_person->age;
        $person->birthplace = $new_person->birthplace;
        $person->residence = $new_person->residence;
        $person->height = $new_person->height;
        $person->edu_back = $new_person->edu_back;
        $person->annual_income = $new_person->annual_income;
        $person->save();

        return redirect()
                ->route('profile.show');
    }
}
