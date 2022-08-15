<?php

namespace App\Http\Services;

use App\Models\Person;

class SortService
{
    public $activeList;
    public $order;

    public function __construct(array $activeList, $order)
    {
        $this->activeList = $activeList;
        $this->order = $order;
    }

    public function sort()
    {
        $person = Person::query();
        foreach ($this->activeList as $active) {
            if ($active === "male" || $active === "female") {
                $person->where('gender', $active);
            } elseif ($active === "age" || $active === "height" || $active === "annual_income") {
                $person->orderBy($active, $this->order);
            }
        }
        return $person->get();
    }

    public function show_gender($active)
    {
        return Person::where('gender', $active)->latest()->get();
    }

    public function sort_numerical($active)
    {
        return Person::orderBy($active, $this->order)->get();
    }

    public function sort_gender_numerical()
    {
        // $person = new Person;
        // $person->where('gender', $this->activeListe[0]);
        // $person->orderBy($this->activeListtive[1], $this->order)->get();
    }
}

