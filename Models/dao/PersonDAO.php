<?php

class PersonDAO extends DAO
{

    public function __construct()
    {
        parent::__construct("t_persons");
    }

    public function create($data)
    {
        if ($data instanceof Person) {
            return $data;
        }

        if (!is_object($data)) {
            return new Person(
                isset($data['id']) ? $data['id'] : 0,
                $data['name_person'],
                $data['firstname_person'],
                $data['bday_person'],
                $data['email_person'],
                $data['phone_person']
            );
        }

        return false;
    }

    public function store($data, $statement = false)
    {
        $person = $this->create($data);

        if (!$person) {
            return false;
        }
        if (parent::fetchNameFirstname($person->name, $person->firstname) == false) {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (name_person, firstname_person, bday_person, email_person, phone_person) VALUES (?,?,?,?,?)");
            $dataStore = [$person->name, $person->firstname, $person->bday, $person->email, $person->phone];
            parent::store($dataStore, $statement);
        }
    }


    public function update($data, $statement = false)
    {
        $person = $this->create($data);
        if (!$person) {
            return false;
        }

        $statement = $this->db->prepare("UPDATE {$this->table} SET name_person = ?, firstname_person = ?, bday_person = ?, email_person = ?, phone_person = ? WHERE id = ?");
        parent::store([$person->name, $person->firstname, $person->bday, $person->email, $person->phone, $person->id], $statement);
    }
}
