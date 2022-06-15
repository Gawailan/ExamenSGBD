<?php

class BoardingController extends Controller
{
    public function index()
    {
        $boardings = Boarding::all();
        include('../Views/Boardings/listBoarding.php');
    }

    public function show($id)
    {
        $boarding = Boarding::find($id);
        include('../Views/Boardings/oneBoarding.php');
    }

    public function create()
    {
        $animals = Animal::all();
        include('../Views/Boardings/createBoarding.php');
    }

    public function store($data)
    {

        $animal = $data['animal_id'] ? Animal::find($data['animal_id']) : false;
        $dateStart = $data['dateStart'] ? $data['dateStart'] : false;
        $dateEnd = $data['dateEnd'];
        //$owner = $data['owner_id'] ? $data['owner_id'] : false;

        $boarding = new Boarding(0, $dateStart, $dateEnd, $animal);
        $boarding->save();
        return $this->index();
    }

    public function edit($id)
    {
        $boarding = Boarding::find($id);
        $animals = Animal::all();
        include('../Views/Boardings/editBoarding.php');
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
        $boarding = Boarding::find($id);
        if (!$boarding) {
            return false;
        }
        $boarding->delete();
        return $this->index();
    }
}
