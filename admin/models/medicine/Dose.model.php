<?php

class Dose
{
    public $id;
    public $dose_name;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO medicine_doses (dose_name)
            VALUES (?)
        ");

        $stmt->bind_param("s", $this->dose_name);

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE medicine_doses
            SET dose_name = ?
            WHERE id = ?
        ");

        $stmt->bind_param("si", $this->dose_name, $this->id);

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM medicine_doses
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
            FROM medicine_doses
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
            DELETE FROM medicine_doses
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public static function html_select($name="cmbDose")
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM medicine_doses
            ORDER BY id
        ");

       $html="<select name='$name' id='$name' class='form-select'>";
            while(  $row = $stmt->fetch_object()){
                $html.=" <option value='$row->id'>$row->dose_name</option>";
            }

        return $html.= "</select>";
    }
}
