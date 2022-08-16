<?php

namespace App\Http\Services;

use App\Models\Person;

// 並べ替えを行うクラス
class SortService
{
    public $activeList;
    public $order;

    public function __construct(array $activeList, $order)
    {
        $this->activeList = $activeList;
        $this->order = $order;
    }

    // 並べ替えを行う項目から，それぞれにあった並べ替えを行う
    public function sort()
    {
        $sql = Person::query();
        foreach ($this->activeList as $active) {
            if ($active === "male" || $active === "female") {
                $sql->where('gender', $active);
            } elseif ($active === "age" || $active === "height" || $active === "annual_income") {
                $sql->orderBy($active, $this->order);
            }
        }
        return $sql->get();     // sqlの実行は最後に行う
    }
}

