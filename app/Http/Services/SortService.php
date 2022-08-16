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
}

