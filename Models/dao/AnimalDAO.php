<?php 

class AnimalDAO extends DAO {
      
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
                $data['gender_animal'],
                $data['bday_animal'],
                $data['sterilized_animal'],
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
            $statement = $this->db->prepare("INSERT INTO {$this->table} (name_animal, gender_animal, bday_animal, sterilized_animal, fk_id_person) VALUES (?, ?, ?, ?, ?)");
            parent::store([$animal->name, $animal->gender, $animal->bday, $animal->sterilized, $animal->owner->id], $statement);
        } else {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (name) VALUES (?)");
            parent::store([$animal->name], $statement);
        }
        
    }
    
    public function update ($data, $statement = false) {
        $game = $this->create($data);
        if (!$game) {
            return false;
        }
        
        if ($game->type) {
            $statement = $this->db->prepare("UPDATE {$this->table} SET name = ?, type_id = ? WHERE id = ?");
            parent::store([$game->name, $game->type->id, $game->id], $statement);
        } else {
            $statement = $this->db->prepare("UPDATE {$this->table} SET name = ? WHERE id = ?");
            parent::store([$game->name, $game->id], $statement);
        }
    }
}