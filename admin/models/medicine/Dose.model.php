<?php

class Dose
{
    public $id;
    public $dose_name;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicine_doses(
                dose_name
            )
            VALUES(
                '$this->dose_name'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicine_doses
            SET
                dose_name='$this->dose_name'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_doses
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
            FROM medicine_doses
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicine_doses
            WHERE id='$id'
        ");
    }
}