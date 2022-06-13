<?php

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        include('../Public/Views/Animals/listAnimal.php');
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        include('../Public/Views/Animals/oneAnimal.php');
    }

    public function create()
    {
        $persons = Person::all();
        include('../Public/Views/Animals/createAnimal.php');
    }

    public function store($data)
    {
        $owner = $data['owner_id'] ? Person::find($data['owner_id']) : false;
        $name = $data['name'] ? $data['name'] : false;
        $gender = $data['gender'];
        $bday = $data['bday'] ? $data['bday'] : false;
        $sterilized = $data['sterilized'];
        $owner = $data['owner_id'] ? $data['owner_id'] : false;

        $animal = new Animal(0, $name, $gender, $bday, $sterilized, $owner);
        $animal->save();
        return $this->index();
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $persons = Person::all();
        include('../Public/Views/Animals/editAnimal.php');
    }

    public function update($id, $data)
    {
        $game = Animal::find($id);
        if (!$game) {
            return false;
        }


        $game->type = $data['type_id'] ? Person::find($data['type_id']) : $game->type;
        $game->name = $data['name'] ? $data['name'] : $game->name;

        $game->save();
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
