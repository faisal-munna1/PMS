<?php

class Manufacturer
{
    public $id;
    public $manufacturer_name;
    public $status;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicine_manufacturers(
                manufacturer_name,
                status
            )
            VALUES(
                '$this->manufacturer_name',
                '$this->status'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicine_manufacturers
            SET
                manufacturer_name='$this->manufacturer_name',
                status='$this->status'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_manufacturers
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
            FROM medicine_manufacturers
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicine_manufacturers
            WHERE id='$id'
        ");
    }
}
?>