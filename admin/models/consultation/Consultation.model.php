<?php

class Consultation
{
    public $id;
    public $appointment_id;
    public $patient_id;
    public $doctor_id;
    public $chief_complaint;
    public $clinical_notes;
    public $medical_history;
    public $report;
    public $diagnosis;
    public $treatment_plan;
    public $consultation_date;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO consultations(
                appointment_id,
                patient_id,
                doctor_id,
                chief_complaint,
                clinical_notes,
                medical_history,
                report,
                diagnosis,
                treatment_plan,
                consultation_date
            )
            VALUES(
                '$this->appointment_id',
                '$this->patient_id',
                '$this->doctor_id',
                '$this->chief_complaint',
                '$this->clinical_notes',
                '$this->medical_history',
                '$this->report',
                '$this->diagnosis',
                '$this->treatment_plan',
                '$this->consultation_date'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE consultations SET
                appointment_id='$this->appointment_id',
                patient_id='$this->patient_id',
                doctor_id='$this->doctor_id',
                chief_complaint='$this->chief_complaint',
                clinical_notes='$this->clinical_notes',
                medical_history='$this->medical_history',
                report='$this->report',
                diagnosis='$this->diagnosis',
                treatment_plan='$this->treatment_plan',
                consultation_date='$this->consultation_date'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                c.*,
                p.name AS patient_name,
                u.name AS doctor_name,
                a.serial_number
            FROM consultations c
            INNER JOIN patients p
                ON c.patient_id = p.id
            INNER JOIN doctors d
                ON c.doctor_id = d.id
            INNER JOIN users u
                ON d.user_id = u.id
            INNER JOIN appointments a
                ON c.appointment_id = a.id
            WHERE c.deleted_at IS NULL
            ORDER BY c.id DESC
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }
    public static function all_by_patient_id($patient_id)
    {
        global $db;

        $stmt = $db->query("
            SELECT
                c.*,
                p.name AS patient_name,
                u.name AS doctor_name,
                a.serial_number
            FROM consultations c
            INNER JOIN patients p
                ON c.patient_id = p.id
            INNER JOIN doctors d
                ON c.doctor_id = d.id
            INNER JOIN users u
                ON d.user_id = u.id
            INNER JOIN appointments a
                ON c.appointment_id = a.id
            WHERE c.deleted_at IS NULL and a.patient_id = $patient_id
            ORDER BY c.id DESC
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
            FROM consultations
            WHERE id='$id'
            AND deleted_at IS NULL
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $consultation = self::find($id);

        if ($consultation && !empty($consultation->report)) {
            File::delete($consultation->report, "uploads/reports");
        }

        return $db->query("
            UPDATE consultations
            SET deleted_at = NOW()
            WHERE id='$id'
        ");
    }

    public static function patients()
    {
        global $db;

        $stmt = $db->query("
            SELECT id, patient_code, name
            FROM patients
            ORDER BY name ASC
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function doctors()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                d.id,
                u.name AS doctor_name
            FROM doctors d
            INNER JOIN users u
                ON d.user_id=u.id
            WHERE d.deleted_at IS NULL
            ORDER BY u.name
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function appointments()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                a.id,
                a.serial_number,
                p.name AS patient_name
            FROM appointments a
            INNER JOIN patients p
                ON a.patient_id=p.id
            WHERE a.deleted_at IS NULL and a.status != 'completed'
            ORDER BY a.appointment_date DESC,
                     a.serial_number ASC
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }
}