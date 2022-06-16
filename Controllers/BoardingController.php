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
        $boarding = Boarding::find($data['id']);
        if (!$boarding) {
            return false;
        }

        $boarding->dateStart = $data['dateStart'];
        $boarding->dataEnd = $data['dateEnd'];
        $boarding->animal = $data['animal_id'];

        $boarding->save();
        return $this->index();
    }

    public function destroy($id)
    {
        $boarding = Boarding::find($id['id']);
        if (!$boarding) {
            return false;
        }
        $boarding->delete();
        return $this->index();
    }
}
