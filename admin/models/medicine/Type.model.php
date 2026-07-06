<?php

class Type
{
    public $id;
    public $type_name;
    public $status;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO medicine_types (type_name, status)
            VALUES (?, ?)
        ");

        $stmt->bind_param("ss", $this->type_name, $this->status);

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE medicine_types
            SET type_name = ?, status = ?
            WHERE id = ?
        ");

        $stmt->bind_param("ssi", $this->type_name, $this->status, $this->id);

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM medicine_types
            ORDER BY id DESC
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function find($id)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM medicine_types
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $stmt = $db->prepare("
            DELETE FROM medicine_types
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}