<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonSaveRequest;
use App\Models\Person;

class PersonController extends Controller
{
    // show all person
    public function getAllPerson() {
        $name = request('name');
        $age = request('age');
        $page = request('page');
        $limit = request('limit');
        
        if ($name ?? false && $age ?? false) {
            if ($page ?? false && $limit ?? false) {
                return response()->json(Person::where('name', 'like', "%". $name. "%")
                    ->orWhere('age', $age)
                    ->paginate($limit, ['*'], 'page', $page)
                );
            }
            return response()->json(Person::where('name', 'like', "%". $name. "%")
                ->orWhere('age', $age)
                ->get());
        } else if($name ?? false) {
            if ($page ?? false && $limit ?? false) {
                return response()->json(Person::where('name', 'like', "%". $name. "%")->paginate($limit, ['*'], 'page', $page));    
            }
            return response()->json(Person::where('name', 'like', "%". $name. "%")->get());
        } else if ($age ?? false) {
            if ($page ?? false && $limit ?? false) {
                return response()->json(Person::where('age', $age)->paginate($limit, ['*'], 'page', $page));
            }
            return response()->json(Person::where('age', $age)->get());
        }
        if ($page ?? false && $limit ?? false) {
            return response()->json(Person::paginate($limit, ['*'], 'page', $page));
        }
        return response()->json(Person::all());
    }
    // show single person
    public function getPersonById(Person $person) {
        return response()->json($person);
    }
    public function createPerson(PersonSaveRequest $request) {
        $person = Person::create($request->all());
        return response()->json($person, 201);
    }
    public function updatePerson(PersonSaveRequest $request, Person $person) {
        $person->update($request->all());
        return response()->json($person, 200);
    }
    public function deletePerson(Person $person) {
        $person->delete();
        return response()->json($person, 200);
    }
}
