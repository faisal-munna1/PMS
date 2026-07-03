<?php

class Role{
    public $id;
    public $name;
    public $description;

    public function set($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function create()
    {
        global $db;
        $stmt = $db->query("insert into role (name, description) values('$this->name', '$this->description') ");
        return $db->insert_id;
    }
    public function update()
    {
        global $db;
        $stmt = $db->query("update role set 
          
          name= '$this->name', 
          description= '$this->description'
          where id= $this->id");
        return $stmt;
    }

    public static function all()
    {
        global $db;
        $stmt = $db->query("select * from role");
        return  array_map(fn($data) => (object) $data, $stmt->fetch_all(MYSQLI_ASSOC));
    }
    public static function find($id)
    {
        global $db;
        $stmt = $db->query("select * from role where id=$id");
        return   $stmt->fetch_object();
    }
    public static function delete($id)
    {
        global $db;
        $stmt = $db->query("delete  from role where id= $id");
        return $stmt;
    }
}
