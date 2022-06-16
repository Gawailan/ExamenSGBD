<?php

class Animal extends Entity {
    
    protected $id;
    protected $name;
    protected $specie;
    protected $gender;
    protected $bday;
    protected $sterilized;
    protected $microship;
    protected $owner;
    private $behavior;
    protected static $dao_name = "AnimalDAO";
    
    public function __construct ($id, $name, $specie, $gender, $bday, $sterilized, $microship, $owner) {
        $this->id = $id;
        $this->name = $name;
        $this->specie = $specie;
        $this->gender = $gender;
        $this->bday = $bday;
        $this->sterilized = $sterilized;
        $this->microship = $microship;
        $this->owner = $owner;
        switch ($specie){
            case "Canin":
                $this->behavior = new Canin();
            break;
            case "Felin":
                $this->behavior = new Felin();
            break;
        }
        
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        return $this->name." (". $this->owner .")";
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "owner") {
                return $this->owner();
            }
            return $this->$prop;
        }
    }
    
    protected function owner () {
        if($this->owner instanceof Person) {
            return $this->owner;
        }
        $this->owner = Person::find($this->owner);
        return $this->owner;
    }

    public function toEat(){
        echo "Tu tiens à ton animal ? Nourrit le !";
    }
}

?>
