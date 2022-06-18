<?php

class BoardingController extends Controller
{
    public function index()
    {
        $dateDay = Parent::getDateDay();
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

        $this->checkData($data, 'STORE');

        if (empty($_SESSION['ERROR']['STORE'])) {
            $boarding = new Boarding(0, $dateStart, $dateEnd, $animal);
            $boarding->save();
            header("Location: /boarding/index");
            die();
        } else {
            header("Location: /boarding/create");
            die();
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
            header("Location: /boarding/index");
            die();
        }

        $data['dateStart'] = $boarding->dateStart;
        $data['dateEnd'] = $boarding->dateEnd;
        $boarding->animal = $data['animal_id'] ? $data['animal_id'] : $boarding->animal;

        $this->checkData($data, 'UPDATE');

        if (empty($_SESSION['ERROR']['UPDATE'])) {
            $boarding->save();
            header("Location: /boarding/index");
            die();
        } else {
            header("Location: /boarding/edit/".$data['id']);
            die();
        }
    }

    public function destroy($id)
    {
        $boarding = Boarding::find($id['id']);
        if (!$boarding) {
            header("Location: /boarding/index");
            die();
        }
        $boarding->delete();
        header("Location: /boarding/index");
        die();
    }

    public function checkData($datas, $action)
    {
        unset($_SESSION['ERROR']);

        foreach ($datas as $data => $value) {
            if (empty($value)) {
                $_SESSION['ERROR'][$action][$data] = 'La valeur est vide !';
            }
        }
        $this->checkDoublon($datas, $action);
    }

    public function checkDoublon($data, $action)
    {
        $boardings = Boarding::where('fk_id_animal', $data['animal_id']);

        if (!empty($boardings)) {
            foreach ($boardings as $boarding) {
                if (($boarding->dateStart <= $data['dateStart'] && $boarding->dateEnd >= $data['dateStart']) || ($boarding->dateStart <= $data['dateEnd'] && $boarding->dateEnd >= $data['dateEnd'])) {
                    $_SESSION['ERROR'][$action]['dateStart'] = 'Conflit avec un autre séjour.';
                    $_SESSION['ERROR'][$action]['dateEnd'] = 'Conflit avec un autre séjour.';
                }
                if ($boarding->dateStart > $data['dateStart'] && $boarding->dateEnd < $data['dateEnd']) {
                    $_SESSION['ERROR'][$action]['dateStart'] = 'Conflit avec un autre séjour (Chevauchement).';
                    $_SESSION['ERROR'][$action]['dateEnd'] = 'Conflit avec un autre séjour (Chevauchement).';
                }
            }
        }
    }
}
