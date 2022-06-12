<?php

class Animal extends Entity {
    
    protected $id;
    protected $name;
    protected $gender;
    protected $bday;
    protected $sterilized;
    protected $owner;
    protected static $dao_name = "AnimalDAO";
    
    public function __construct ($id, $name, $gender, $bday, $sterilized, $owner) {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
        $this->bday = $bday;
        $this->sterilized = $sterilized;
        $this->owner = $owner;
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
}

?>
