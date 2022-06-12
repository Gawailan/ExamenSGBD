<?php

class PersonController extends Controller {
    public function index () {
        $persons = Person::all();
        include('../Public/Views/Persons/listPerson.php');
    }
    
    public function show ($id) {
        $person = Person::find($id);
        include('../Public/Views/Persons/onePerson.php');
    }
    
    public function create () {
        $person = Person::all();
        include('../Public/Views/Persons/createPerson.php');
    }
     
    public function store ($data) {
       /*
       $type = $data['type_id'] ? Type::find($data['type_id']) : false;
       $name = $data['name'] ? $data['name'] : false;
        */
       $person = new Person(0, $data['name'],$data['firstname'],$data['bday'],$data['email'],$data['phone']);
       $person->save();
       return $this->index();
    }
    
    public function edit ($id) {
        $person = Person::find($id);
        //$types = Type::all();
        include('../Public/Views/Persons/editPerson.php');
    }
    
    public function update($id, $data) {
        $person = Person::find($id);
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
        $person = Person::find($id);
        if (!$person) {
            return false;
        }
        $person->delete();
        return $this->index();
    }
}