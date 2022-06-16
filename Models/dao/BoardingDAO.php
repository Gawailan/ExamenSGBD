<?php 

class BoardingDAO extends DAO {
      
    public function __construct () {
        parent::__construct("t_boardings");
    }
    
    public function create ($data) {
        if ($data instanceof Boarding) {
            return $data;
        }
        
        if (!is_object($data)) {
            return new Boarding(
                isset($data['id']) ? $data['id'] : 0,
                $data['startDate_boarding'],
                $data['endDate_boarding'],
                $data['fk_id_animal']
            );
        }
        return false;
    }
    
    public function store ($data , $statement = false) {
        $boarding = $this->create($data);
        if (!$boarding) {
            return false;
        }
        if ($boarding->animal) {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (startDate_boarding, endDate_boarding, fk_id_animal) VALUES (?, ?, ?)");
            parent::store([$boarding->dateStart, $boarding->dateEnd, $boarding->animal->id], $statement);
        } else {
            //$statement = $this->db->prepare("INSERT INTO {$this->table} (name) VALUES (?)");
            //parent::store([$boarding->name], $statement);
        }
        
    }
    
    public function update ($data, $statement = false) {
        $boarding = $this->create($data);
        if (!$boarding) {
            return false;
        }
        
        if ($boarding->animal) {
            $statement = $this->db->prepare("UPDATE {$this->table} SET startDate_boarding = ?, endDate_boarding = ?, fk_id_animal = ? WHERE id = ?");
            parent::store([$boarding->dateStart, $boarding->dateEnd, $boarding->animal->id, $boarding->id], $statement);
        } else {
            //$statement = $this->db->prepare("UPDATE {$this->table} SET name = ? WHERE id = ?");
            //parent::store([$animal->name, $animal->id], $statement);
        }
    }
}