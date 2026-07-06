<?php

class Instruction
{
    public $id;
    public $instruction_name;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO medicine_instructions (instruction_name)
            VALUES (?)
        ");

        $stmt->bind_param("s", $this->instruction_name);

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE medicine_instructions
            SET instruction_name = ?
            WHERE id = ?
        ");

        $stmt->bind_param("si", $this->instruction_name, $this->id);

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM medicine_instructions
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
            FROM medicine_instructions
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
            DELETE FROM medicine_instructions
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}