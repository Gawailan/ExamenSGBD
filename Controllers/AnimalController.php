<?php

class AnimalController extends Controller
{
    public function index()
    {
        $Animals = Animal::all();
        include('../Public/Views/Animals/listAnimal.php');
    }

    public function show($id)
    {
        $game = Animal::find($id);
        include('views/games/one.php');
    }

    public function create()
    {
        $persons = Person::all();
        include('../Public/Views/Animals/createAnimal.php');
    }

    public function store($data)
    {
        var_dump($data);
        $owner = $data['owner_id'] ? Person::find($data['owner_id']) : false;
        var_dump($owner);
        $name = $data['name'] ? $data['name'] : false;
        $gender = $data['gender'] ? $data['gender'] : false;
        $bday = $data['bday'] ? $data['bday'] : false;
        $sterilized = $data['sterilized'] ? $data['sterilized'] : false;
        $owner = $data['owner_id'] ? $data['owner_id'] : false;

        $animal = new Animal(0, $name, $gender, $bday, $sterilized, $owner);
        $animal->save();
        return $this->index();
    }

    public function edit($id)
    {
        $game = Animal::find($id);
        $types = Type::all();
        include('views/games/edit.php');
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
        $game = Animal::find($id);
        if (!$game) {
            return false;
        }
        $game->delete();
        return $this->index();
    }
}
