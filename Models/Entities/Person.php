<?php

class Person extends Entity {
    
    protected $id;
    protected $name;
    protected $firstname;
    protected $bday;
    protected $email;
    protected $phone;
    protected static $dao_name = "PersonDAO";
    
    public function __construct ($id, $name, $firstname, $bday, $email, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->bday = $bday;
        $this->email = $email;
        $this->phone = $phone;
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
        if ($this->games) {
            return $this->games;
        }
        $this->games = Animal::where('type_id', $this->id);
        return $this->games;
    }
}


