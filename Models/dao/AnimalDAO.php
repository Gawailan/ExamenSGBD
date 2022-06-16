<?php 

class AnimalDAO extends DAO{
      
    public function __construct () {
        parent::__construct("t_animals");
    }
    
    public function create ($data) {

        if ($data instanceof Animal) {
            return $data;
        }
        
        if (!is_object($data)) {
            return new Animal(
                isset($data['id']) ? $data['id'] : 0,
                $data['name_animal'],
                $data['specie_animal'],
                $data['gender_animal'],
                $data['bday_animal'],
                $data['sterilized_animal'],
                $data['microship_animal'],
                $data['fk_id_person']
            );
        }
        return false;
    }
    
    public function store ($data , $statement = false) {
        $animal = $this->create($data);
        if (!$animal) {
            return false;
        }
        if ($animal->owner) {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (name_animal, specie_animal, gender_animal, bday_animal, sterilized_animal, microship_animal, fk_id_person) VALUES (?, ?, ?, ?, ?, ?, ?)");
            parent::store([$animal->name, $animal->specie, $animal->gender, $animal->bday, $animal->sterilized, $animal->microship, $animal->owner->id], $statement);
        } else {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (name) VALUES (?)");
            parent::store([$animal->name], $statement);
        }     
    }
    
    public function update ($data, $statement = false) {
        $animal = $this->create($data);
        if (!$animal) {
            return false;
        }

        if ($animal->owner) {
            $statement = $this->db->prepare("UPDATE {$this->table} SET name_animal = ?, specie_animal = ?, gender_animal = ?, bday_animal = ?, sterilized_animal = ?, microship_animal = ?, fk_id_person = ? WHERE id = ?");
            parent::store([$animal->name, $animal->specie, $animal->gender, $animal->bday, $animal->sterilized, $animal->microship, $animal->owner->id, $animal->id], $statement);
        } else {
            //$statement = $this->db->prepare("UPDATE {$this->table} SET name = ? WHERE id = ?");
            //parent::store([$animal->name, $animal->id], $statement);
        }
    }


}