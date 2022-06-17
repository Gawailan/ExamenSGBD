<?php

class PersonController extends Controller {
    public function index () {
        unset($_SESSION['ERROR']);
        $persons = Person::all();
        include('../Views/Persons/listPerson.php');
    }
    
    public function show ($id) {
        $person = Person::find($id);
        include('../Views/Persons/onePerson.php');
    }
    
    public function create () {
        $person = Person::all();
        include('../Views/Persons/createPerson.php');
    }
     
    public function store ($data) {

        $this->checkData($data);

        if(empty($_SESSION['ERROR']['STORE'])){
            $person = new Person(0, $data['name'],$data['firstname'],$data['bday'],$data['email'],$data['phone']);
            $person->save();
            return $this->index();
        }else{
            return header("Location: /person/create");
        }
    }
    
    public function edit ($id) {
        $person = Person::find($id);
        include('../Views/Persons/editPerson.php');
    }
    
    public function update($data) {
        $person = Person::find($data['id']);
        if (!$person) {
            return false;
        }
        
        $person->name = $data['name'] ? $data['name'] : $person->name;
        $person->firstname = $data['firstname'];
        $person->bday = $data['bday'];
        $person->email = $data['email'];
        $person->phone = $data['phone'];

        $person->save();
        return $this->index();
    }
    
    public function destroy ($id) {
        $person = Person::find($id['id']);
        if (!$person) {
            return false;
        }
        $person->delete();
        return $this->index();
    }

    public function checkDoublon($newPersonName, $newPersonFirstname)
    {
        $persons = Person::all();
        if(!empty($persons)){
            foreach ($persons as $person) {
                if ($person->name == $newPersonName && $person->firstname == $newPersonFirstname) {
                    $_SESSION['ERROR']['STORE']['name'] = "Le proprietaire existe déjà.";
                    $_SESSION['ERROR']['STORE']['firstname'] = "Le proprietaire existe déjà.";
                }
            }
        }
    }

    public function checkData($datas){
        unset($_SESSION['ERROR']);
        foreach($datas as $data => $value){
            if(empty($value)){
                $_SESSION['ERROR']['STORE'][$data] = "La valeur est vide !";
            }
            if($data == 'phone'){
                if(!is_numeric($value)){
                    $_SESSION['ERROR']['STORE'][$data] = "Invalide seulement des chiffres (0-9).";
                }
            }
            if($data == 'email'){
                if(!strstr($value, '@')){
                    $_SESSION['ERROR']['STORE'][$data] = "Email n'est pas au format valide.";
                }
            }
        }
        $this->checkDoublon($datas['name'], $datas['firstname']);
    }
}