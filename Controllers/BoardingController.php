<?php

class BoardingController extends Controller
{
    public function index()
    {
        unset($_SESSION['ERROR']);
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

        $this->checkData($data);

        if (empty($_SESSION['ERROR']['STORE'])) {
            $boarding = new Boarding(0, $dateStart, $dateEnd, $animal);
            $boarding->save();
            return $this->index();
        } else {
            return header("Location: /boarding/create");
        }
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

    public function checkData($datas)
    {
        unset($_SESSION['ERROR']);

        foreach ($datas as $data => $value) {
            if (empty($value)) {
                $_SESSION['ERROR']['STORE'][$data] = 'La valeur est vide !';
            }
        }
        $this->checkDoublon($datas["dateStart"], $datas["dateEnd"], $datas['animal_id']);
    }

    public function checkDoublon($dateStart, $dateEnd, $animal)
    {
        $boardings = Boarding::where('fk_id_animal', $animal);

        if (!empty($boardings)) {
            foreach ($boardings as $boarding) {
                if (($boarding->dateStart <= $dateStart && $boarding->dateEnd >= $dateStart) || ($boarding->$dateStart <= $dateEnd && $boarding->dateEnd >= $dateEnd)) {
                    $_SESSION['ERROR']['STORE']['dateStart'] = 'Conflit avec un autre séjour.';
                    $_SESSION['ERROR']['STORE']['dateEnd'] = 'Conflit avec un autre séjour.';
                }
                if ($boarding->dateStart > $dateStart && $boarding->dateEnd < $dateEnd) {
                    $_SESSION['ERROR']['STORE']['dateStart'] = 'Conflit avec un autre séjour (Chevauchement).';
                    $_SESSION['ERROR']['STORE']['dateEnd'] = 'Conflit avec un autre séjour (Chevauchement).';
                }
            }
        }
    }
}
