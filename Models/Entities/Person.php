<?php

class Person extends Entity {
    
    protected $id;
    protected $name;
    protected $firstname;
    protected $bday;
    protected $email;
    protected $phone;
    protected $animals;
    protected static $dao_name = "PersonDAO";
    
    public function __construct ($id, $name, $firstname, $bday, $email, $phone, $animals = false) {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->bday = $bday;
        $this->email = $email;
        $this->phone = $phone;
        $this->animals = $animals;
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        return $this->name." (". $this->firstname .")";
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "animals") {
                return $this->animals();
            }
            return $this->$prop;
        }
    }
    
    protected function animals () {
        if ($this->animals) {
            return $this->animals;
        }
        $this->animals = Animal::where('fk_id_person', $this->id);
        return $this->animals;
    }
}


