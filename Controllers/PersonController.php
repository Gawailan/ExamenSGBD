<?php

class PersonController extends Controller
{
    public function index()
    {
        unset($_SESSION['ERROR']);
        $persons = Person::all();
        include('../Views/Persons/listPerson.php');
    }

    public function show($id)
    {
        $person = Person::find($id);
        include('../Views/Persons/onePerson.php');
    }

    public function create()
    {
        $person = Person::all();
        include('../Views/Persons/createPerson.php');
    }

    public function store($data)
    {

        $data = $this->checkData($data, 'STORE');

        if (empty($_SESSION['ERROR']['STORE'])) {
            $person = new Person(0, $data['name'], $data['firstname'], $data['bday'], $data['email'], $data['phone']);
            $person->save();
            return $this->index();
        } else {
            return $this->create();
        }
    }

    public function edit($id)
    {
        $person = Person::find($id);
        include('../Views/Persons/editPerson.php');
    }

    public function update($data)
    {
        $person = Person::find($data['id']);
        if (!$person) {
            return false;
        }

        $data = $this->checkData($data, 'UPDATE');

        $person->name = $data['name'] ? $data['name'] : $person->name;
        $person->firstname = $data['firstname'];
        $person->bday = $data['bday'];
        $person->email = $data['email'];
        $person->phone = $data['phone'];

        if (empty($_SESSION['ERROR']['UPDATE'])) {

            $person->save();
            return $this->index();
        }
        else{
            return $this->edit($data['id']);
        }
    }

    public function destroy($id)
    {
        $person = Person::find($id['id']);
        if (!$person) {
            return false;
        }
        $person->delete();
        return $this->index();
    }

    public function checkDoublon($data, $action)
    {
        $persons = Person::all();
        if (!empty($persons)) {
            foreach ($persons as $person) {
                if($action == 'STORE'){
                    if ($person->name == $data['name'] && $person->firstname == $data['firstname']) {
                        $_SESSION['ERROR'][$action]['name'] = "Le proprietaire existe déjà.";
                        $_SESSION['ERROR'][$action]['firstname'] = "Le proprietaire existe déjà.";
                    }
                }else{
                    if (($person->name == $data['name'] && $person->firstname == $data['firstname']) && $person->id != $data['id']) {
                        $_SESSION['ERROR'][$action]['name'] = "Le proprietaire existe déjà.";
                        $_SESSION['ERROR'][$action]['firstname'] = "Le proprietaire existe déjà.";
                    }
                }

            }
        }
    }

    public function checkData($datas, $action)
    {
        unset($_SESSION['ERROR']);
        foreach ($datas as $data => &$value) {
            if (empty($value)) {
                $_SESSION['ERROR'][$action][$data] = "La valeur est vide !";
            }
            if ($data == 'phone') {
                if (!is_numeric($value)) {
                    $_SESSION['ERROR'][$action][$data] = "Invalide seulement des chiffres (0-9).";
                }
            }
            if ($data == 'email') {
                if (!strstr($value, '@')) {
                    $_SESSION['ERROR'][$action][$data] = "Email n'est pas au format valide.";
                }
            }
            if((!empty($data) && $data == 'name') || (!empty($data) && $data == 'firstname')){
                $datas[$data] = ucfirst($value);
            }
        }
        $this->checkDoublon($datas, $action);
        return $datas;
    }
}
