<?php

class Manufacturer
{
    public $id;
    public $manufacturer_name;
    public $status;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO medicine_manufacturers (manufacturer_name, status)
            VALUES (?, ?)
        ");

        $stmt->bind_param("ss", $this->manufacturer_name, $this->status);

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE medicine_manufacturers
            SET manufacturer_name = ?, status = ?
            WHERE id = ?
        ");

        $stmt->bind_param("ssi", $this->manufacturer_name, $this->status, $this->id);

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM medicine_manufacturers
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
            FROM medicine_manufacturers
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
            DELETE FROM medicine_manufacturers
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}