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
        $animal = Animal::find($id);
        include('../Views/Animals/oneAnimal.php');
    }

    public function create()
    {
        $persons = Person::all();
        include('../Views/Animals/createAnimal.php');
    }

    public function store($data)
    {
        $owner = $data['owner_id'] ? Person::find($data['owner_id']) : false;
        $name = $data['name'] ? $data['name'] : false;
        $specie = $data['specie'];
        $gender = $data['gender'];
        $bday = $data['bday'] ? $data['bday'] : false;
        $sterilized = $data['sterilized'];
        $microship = $data['microship'];

        $this->checkData($data);

        if(empty($_SESSION['ERROR']['STORE'])){
            $animal = new Animal(0, $name, $specie, $gender, $bday, $sterilized, $microship, $owner);
            $animal->save();
            return $this->index();
        }
        else{
            return header("Location: /animal/create");
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


        $animal->owner = $data['owner_id'] ? Person::find($data['owner_id']) : $animal->owner;
        $animal->name = $data['name'] ? $data['name'] : $animal->name;
        $animal->specie = $data['specie'] ? $data['specie'] : $animal->specie;
        $animal->gender = $data['gender'] ? $data['gender'] : $animal->gender;
        $animal->bday = $data['bday'] ? $data['bday'] : $animal->bday;
        $animal->sterilized = $data['sterilized'] ? $data['sterilized'] : $animal->sterilized;
        $animal->microship = $data['microship'] ? $data['microship'] : $animal->microship;

        $animal->save();
        return $this->index();
    }

    public function destroy($id)
    {
        $animal = Animal::find($id['id']);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return $this->index();
    }

    public function checkDoublon($newAnimal)
    {
        $animals = Animal::all();
        if(!empty($animals)){
            foreach ($animals as $animal) {
                if ($animal->microship == $newAnimal) {
                    $_SESSION['ERROR']['STORE']['microship'] = "Le numero de puce existe déjà";
                    return true;
                }
            }
            return false;
        }
    }

    public function checkData($datas){
        unset($_SESSION['ERROR']);
        var_dump($datas);
        foreach($datas as $data => $value){
            if($data == 'gender' || $data == 'sterilized'){
                if($value != 1){
                    if($value != 0){
                        $_SESSION['ERROR']['STORE'][$data] = "La valeur est vide !";
                    }
                }
            }else{
                if(empty($value)){
                    $_SESSION['ERROR']['STORE'][$data] = "La valeur est vide !";
                }
            }
            if($data == 'microship'){
                if(strlen($value) < 15 || strlen($value) > 15 || !is_numeric($value)){
                    $_SESSION['ERROR']['STORE']['microship'] = "Le numero de puce n'est pas valide (15 Chiffres)";
                }
                $this->checkDoublon($data);
            }
        }
    }
}
