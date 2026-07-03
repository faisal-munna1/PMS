<?php

class Frequency
{
    public $id;
    public $frequency_name;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicine_frequencies(
                frequency_name
            )
            VALUES(
                '$this->frequency_name'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicine_frequencies
            SET
                frequency_name='$this->frequency_name'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_frequencies
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
            FROM medicine_frequencies
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicine_frequencies
            WHERE id='$id'
        ");
    }
}