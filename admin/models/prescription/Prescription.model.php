<?php

class Prescription
{
    public $id;
    public $consultation_id;
    public $patient_id;
    public $doctor_id;
    public $prescription_date;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO prescriptions(
                consultation_id,
                patient_id,
                doctor_id,
                prescription_date
            )
            VALUES(
                '$this->consultation_id',
                '$this->patient_id',
                '$this->doctor_id',
                '$this->prescription_date'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE prescriptions SET
                consultation_id='$this->consultation_id',
                patient_id='$this->patient_id',
                doctor_id='$this->doctor_id',
                prescription_date='$this->prescription_date'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                p.*,
                pt.name AS patient_name,
                u.name as doctor_name,
                c.consultation_date
            FROM prescriptions p

            LEFT JOIN consultations c
                ON c.id = p.consultation_id

            LEFT JOIN patients pt
                ON pt.id = p.patient_id

            LEFT JOIN doctors d
                ON d.id = p.doctor_id

            Left join users u
            on u.id=d.user_id

            ORDER BY p.id DESC
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
            FROM prescriptions
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM prescriptions
            WHERE id='$id'
        ");
    }
}