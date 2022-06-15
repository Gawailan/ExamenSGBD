<?php

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        include('../Views/Animals/listAnimal.php');
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        include('../Views/Animals/oneAnimal.php');
    }

    public function create()
    {
        $persons = Person::all();
        include('../Views/Animals/createAnimal.php');
    }

    public function store($data)
    {
        $owner = $data['owner_id'] ? Person::find($data['owner_id']) : false;
        $name = $data['name'] ? $data['name'] : false;
        $gender = $data['gender'];
        $bday = $data['bday'] ? $data['bday'] : false;
        $sterilized = $data['sterilized'];
        $microship = $data['microship'];
        //$owner = $data['owner_id'] ? $data['owner_id'] : false;

        $animal = new Animal(0, $name, $gender, $bday, $sterilized, $microship, $owner);
        $animal->save();
        return $this->index();
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $persons = Person::all();
        include('../Views/Animals/editAnimal.php');
    }

    public function update($data)
    {
        $animal = Animal::find($data['id']);
        if (!$animal) {
            return false;
        }


        $animal->owner = $data['owner_id'] ? Person::find($data['owner_id']) : $animal->owner;
        $animal->name = $data['name'] ? $data['name'] : $animal->name;

        $animal->save();
        return $this->index();
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return $this->index();
    }
}
