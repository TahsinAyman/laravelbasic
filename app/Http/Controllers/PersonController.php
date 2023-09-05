<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    // show all person
    public function getAllPerson() {
        $name = request('name');
        $age = request('age');
        if ($name ?? false && $age ?? false) {
            return response()->json(Person::where('name', 'like', "%". $name. "%")
                ->orWhere('age', $age)
                ->get());
        } else if($name ?? false) {
            return response()->json(Person::where('name', 'like', "%". $name. "%")->get());
        } else if ($age ?? false) {
            return response()->json(Person::where('age', $age)->get());
        }
        
        return response()->json(Person::all());
    }
    // show single person
    public function getPersonById(Person $person) {
        return response()->json($person);
    }
    public function createPerson() {
        // dd(request()->all());
        $result = request()->validate([
            "name" => ['required', 'string', 'max:255'],
            "age" => ['required', 'numeric', 'min:1']
        ]);
        dd($result);
        
    }
}
