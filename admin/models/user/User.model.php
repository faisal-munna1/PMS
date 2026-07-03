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
    public $status;

    public function create()
    {
        global $db;

        $db->query("
            INSERT INTO users
            (role_id, username, password, name, email, phone, status)
            VALUES
            (
                '$this->role_id',
                '$this->username',
                '$this->password',
                '$this->name',
                '$this->email',
                '$this->phone',
                '$this->status'
            )
        ");

        return $db->insert_id;
    }

    public function update()
    {
        global $db;

        if (!empty($this->password)) {

            $sql = "
                UPDATE users SET
                    role_id = '$this->role_id',
                    username = '$this->username',
                    password = '$this->password',
                    name = '$this->name',
                    email = '$this->email',
                    phone = '$this->phone',
                    status = '$this->status'
                WHERE id = '$this->id'
            ";
        } else {

            $sql = "
                UPDATE users SET
                    role_id = '$this->role_id',
                    username = '$this->username',
                    name = '$this->name',
                    email = '$this->email',
                    phone = '$this->phone',
                    status = '$this->status'
                WHERE id = '$this->id'
            ";
        }

        return $db->query($sql);
    }

    public static function all()
{
    global $db;

    $stmt = $db->query("
        SELECT
            u.id,
            r.name AS role,
            u.username,
            u.name,
            u.email,
            u.phone,
            u.status
        FROM users u
        INNER JOIN role r
            ON u.role_id = r.id
    ");

    return array_map(fn($row) => (object)$row, $stmt->fetch_all(MYSQLI_ASSOC));
}

    public static function find($id)
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM users
            WHERE id = '$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query(
            "
            DELETE FROM users
            WHERE id = '$id'"
        );
    }
}
