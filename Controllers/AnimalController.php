<?php


class AnimalController extends Controller
{
    public function index()
    {
        unset($_SESSION['ERROR']);
        $animals = Animal::all();
        include('../Views/Animals/listAnimal.php');
    }

    public function show($id)
    {
        $dateDay = Parent::getDateDay();
        $animal = Animal::find($id);
        if($animal->gender = 1){
            $animal->gender = "Mâle";
        }
        else{
            $animal->gender = "Femelle";
        }
        if($animal->sterilized = 1){
            $animal->sterilized = "Oui";
        }
        else{
            $animal->sterilized = "Non";
        }
        include('../Views/Animals/oneAnimal.php');
    }

    public function create()
    {
        $persons = Person::all();
        include('../Views/Animals/createAnimal.php');
    }

    public function store($data)
    {

        $data = $this->checkData($data, "STORE");

        $owner = $data['owner_id'] ? Person::find($data['owner_id']) : false;
        $name = $data['name'] ? $data['name'] : false;
        $specie = $data['specie'];
        $gender = $data['gender'];
        $bday = $data['bday'] ? $data['bday'] : false;
        $sterilized = $data['sterilized'];
        $microship = $data['microship'];

        if(empty($_SESSION['ERROR']['STORE'])){
            $animal = new Animal(0, $name, $specie, $gender, $bday, $sterilized, $microship, $owner);
            $animal->save();
            return $this->index();
        }
        else{
            return $this->create();
        }
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

        $data = $this->checkData($data, "UPDATE");

        $animal->owner = $data['owner_id'] ? Person::find($data['owner_id']) : $animal->owner;
        $animal->name = $data['name'] ? $data['name'] : $animal->name;
        $animal->specie = $data['specie'] ? $data['specie'] : $animal->specie;
        $animal->gender = $data['gender'] ? $data['gender'] : $animal->gender;
        $animal->bday = $data['bday'] ? $data['bday'] : $animal->bday;
        $animal->sterilized = $data['sterilized'] ? $data['sterilized'] : $animal->sterilized;
        $animal->microship = $data['microship'] ? $data['microship'] : $animal->microship;

        if(empty($_SESSION['ERROR']['UPDATE'])){
            $animal->save();
            return $this->index();
        }
        else{
            return $this->edit($data['id']);
        }
    }

    public function destroy($id)
    {
        $animal = Animal::find($id['id']);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return header("Location: /animal");
    }

    public function checkDoublon($data, $action)
    {
        $animals = Animal::all();
        if(!empty($animals)){
            foreach ($animals as $animal) {
                if($action == 'STORE'){
                    if ($animal->microship == $data['microship']) {
                        $_SESSION['ERROR'][$action]['microship'] = "Le numero de puce existe déjà";
                    }
                }else{
                    if ($animal->microship == $data['microship'] && $animal->id != $data['id']){
                        $_SESSION['ERROR'][$action]['microship'] = "Le numero de puce existe déjà";
                    }
                }

            }
            return false;
        }
    }

    public function checkData($datas,$action){
        unset($_SESSION['ERROR']);
        foreach($datas as $data => $value){
            if($data == 'gender' || $data == 'sterilized'){
                if($value != 1){
                    if($value != 0){
                        $_SESSION['ERROR'][$action][$data] = "La valeur est vide !";
                    }
                }
            }else{
                if(empty($value)){
                    $_SESSION['ERROR'][$action][$data] = "La valeur est vide !";
                }
            }
            if($data == 'microship'){
                if(strlen($value) < 15 || strlen($value) > 15 || !is_numeric($value)){
                    $_SESSION['ERROR'][$action]['microship'] = "Le numero de puce n'est pas valide (15 Chiffres)";
                }
                $this->checkDoublon($datas, $action);
            }
            if(!empty($data) && $data == 'name'){
                $datas[$data] = ucfirst($value);
            }
        }
        return $datas;
    }
}
