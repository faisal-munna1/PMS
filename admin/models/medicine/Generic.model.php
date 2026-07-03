<?php

class Generic
{
    public $id;
    public $generic_name;
    public $status;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicine_generics(
                generic_name,
                status
            )
            VALUES(
                '$this->generic_name',
                '$this->status'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicine_generics
            SET
                generic_name='$this->generic_name',
                status='$this->status'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_generics
            ORDER BY id DESC
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function find($id)
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_generics
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicine_generics
            WHERE id='$id'
        ");
    }
}