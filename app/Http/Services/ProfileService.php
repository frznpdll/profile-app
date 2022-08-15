<?php

namespace App\Http\Services;

class ProfileService
{
    public function to_list($objects)
    {
        $list = array();
        foreach($objects as $object) {
            $list[] = array(
                'id' => $object->id,
                'family_name' => $object->family_name,
                'first_name' => $object->first_name,
                'gender' => $object->gender,
                'age' => $object->age,
                'birthplace' => $object->birthplace,
                'residence' => $object->residence,
                'height' => $object->height,
                'edu_back' => $object->edu_back,
                'annual_income' => $object->annual_income,
            );
        }
        return $list;
    }
}

