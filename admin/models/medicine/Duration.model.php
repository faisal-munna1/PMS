<?php

class Duration
{
    public $id;
    public $duration_name;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicine_durations(
                duration_name
            )
            VALUES(
                '$this->duration_name'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicine_durations
            SET
                duration_name='$this->duration_name'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_durations
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
            FROM medicine_durations
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicine_durations
            WHERE id='$id'
        ");
    }
}