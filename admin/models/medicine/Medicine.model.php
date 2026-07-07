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


public static function html_select($name="cmbMedicines")
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicines
            ORDER BY id
        ");

       $html="<select name='$name' id='$name' class='form-select'>";
            while(  $row = $stmt->fetch_object()){
                $html.=" <option value='$row->id'>$row->medicine_name</option>";
            }

        return $html.= "</select>";
    }


    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO medicines (medicine_name, generic_id, manufacturer_id, type_id, strength_id, status)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "siiiis",
            $this->medicine_name,
            $this->generic_id,
            $this->manufacturer_id,
            $this->type_id,
            $this->strength_id,
            $this->status
        );

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE medicines
            SET medicine_name = ?, generic_id = ?, manufacturer_id = ?, type_id = ?, strength_id = ?, status = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "siiiiis",
            $this->medicine_name,
            $this->generic_id,
            $this->manufacturer_id,
            $this->type_id,
            $this->strength_id,
            $this->status,
            $this->id
        );

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                m.*,
                g.generic_name,
                mf.manufacturer_name,
                t.type_name,
                s.strength_name
            FROM medicines m
            LEFT JOIN medicine_generics g ON m.generic_id = g.id
            LEFT JOIN medicine_manufacturers mf ON m.manufacturer_id = mf.id
            LEFT JOIN medicine_types t ON m.type_id = t.id
            LEFT JOIN medicine_strengths s ON m.strength_id = s.id
            ORDER BY m.id DESC
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
            FROM medicines
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
            DELETE FROM medicines
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}