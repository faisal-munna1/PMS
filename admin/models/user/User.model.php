<?php

class User
{
    public $id;
    public $role_id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $phone;
    public $image;
    public $status;

    public function set($id, $role_id, $username, $password, $name, $email, $phone, $image, $status)
    {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->image = $image;
        $this->status = $status;
    }

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO users (role_id, username, password, name, email, phone, image, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $stmt->bind_param(
            "isssssss", 
            $this->role_id, $this->username, $this->password, 
            $this->name, $this->email, $this->phone, $this->image, $this->status
        );
        
        $stmt->execute();
        return $db->insert_id;
    }

   public function update()
{
    global $db;

    if (!empty($this->password)) {

        $stmt = $db->prepare("
            UPDATE users
            SET
                role_id = ?,
                username = ?,
                password = ?,
                name = ?,
                email = ?,
                phone = ?,
                image = ?,
                status = ?
            WHERE id = ?
        ");

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "isssssssi",
            $this->role_id,
            $this->username,
            $this->password,
            $this->name,
            $this->email,
            $this->phone,
            $this->image,
            $this->status,
            $this->id
        );

    } else {

        $stmt = $db->prepare("
            UPDATE users
            SET
                role_id = ?,
                username = ?,
                name = ?,
                email = ?,
                phone = ?,
                image = ?,
                status = ?
            WHERE id = ?
        ");

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "issssssi",
            $this->role_id,
            $this->username,
            $this->name,
            $this->email,
            $this->phone,
            $this->image,
            $this->status,
            $this->id
        );
    }

    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
    public static function all()
    {
        global $db;

        $result = $db->query("
            SELECT u.id, r.name AS role, u.image, u.username, u.name, u.email, u.phone, u.status 
            FROM users u 
            INNER JOIN role r ON u.role_id = r.id
        ");

        return array_map(fn($row) => (object)$row, $result->fetch_all(MYSQLI_ASSOC));
    }

    public static function find($id)
    {
        global $db;

        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        return $stmt->execute();
    }
}