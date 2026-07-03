<?php

class Medicine
{
    public $id;
    public $medicine_name;
    public $generic_id;
    public $manufacturer_id;
    public $type_id;
    public $strength_id;
    public $status;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO medicines(
                medicine_name,
                generic_id,
                manufacturer_id,
                type_id,
                strength_id,
                status
            )
            VALUES(
                '$this->medicine_name',
                '$this->generic_id',
                '$this->manufacturer_id',
                '$this->type_id',
                '$this->strength_id',
                '$this->status'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE medicines
            SET
                medicine_name='$this->medicine_name',
                generic_id='$this->generic_id',
                manufacturer_id='$this->manufacturer_id',
                type_id='$this->type_id',
                strength_id='$this->strength_id',
                status='$this->status'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                m.*,
                g.generic_name,
                mf.manufacturer_name,
                t.type_name,
                s.strength_name
            FROM medicines m
            LEFT JOIN medicine_generics g
                ON m.generic_id = g.id
            LEFT JOIN medicine_manufacturers mf
                ON m.manufacturer_id = mf.id
            LEFT JOIN medicine_types t
                ON m.type_id = t.id
            LEFT JOIN medicine_strengths s
                ON m.strength_id = s.id
            ORDER BY m.id DESC
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
            FROM medicines
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM medicines
            WHERE id='$id'
        ");
    }
}