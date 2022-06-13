<?php

class Boarding extends Entity {
    
    protected $id;
    protected $dateStart;
    protected $dateEnd;
    protected $animal;
    protected static $dao_name = "BoardingDAO";
    
    public function __construct ($id, $dateStart, $dateEnd, $animal) {
        $this->id = $id;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->animal = $animal;
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        return $this->name." (". $this->owner .")";
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "animal") {
                return $this->animal();
            }
            return $this->$prop;
        }
    }
    
    protected function animal () {
        if($this->animal instanceof Animal) {
            return $this->animal;
        }
        $this->animal = Animal::find($this->animal);
        return $this->animal;
    }
}

?>
