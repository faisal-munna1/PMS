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

    public $physical_examination;
    public $neurological_examination;
    public $followup_date;
    public $status;
    public $height;
    public $weight;
    public $bmi;
    public $blood_pressure;
    public $pulse;
    public $temperature;
    public $spo2;
    public $blood_sugar;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO consultations (
                appointment_id, patient_id, doctor_id, chief_complaint, 
                clinical_notes, medical_history, physical_examination, neurological_examination,
                report, diagnosis, treatment_plan, consultation_date, 
                followup_date, status, height, weight, 
                bmi, blood_pressure, pulse, temperature, 
                spo2, blood_sugar
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "iiisssssssssssddddidid",
            $this->appointment_id,
            $this->patient_id,
            $this->doctor_id,
            $this->chief_complaint,
            $this->clinical_notes,
            $this->medical_history,
            $this->physical_examination,
            $this->neurological_examination,
            $this->report,
            $this->diagnosis,
            $this->treatment_plan,
            $this->consultation_date,
            $this->followup_date,
            $this->status,
            $this->height,
            $this->weight,
            $this->bmi,
            $this->blood_pressure,
            $this->pulse,
            $this->temperature,
            $this->spo2,
            $this->blood_sugar
        );

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE consultations SET
                appointment_id = ?,
                patient_id = ?,
                doctor_id = ?,
                chief_complaint = ?,
                clinical_notes = ?,
                medical_history = ?,
                physical_examination = ?,
                neurological_examination = ?,
                report = ?,
                diagnosis = ?,
                treatment_plan = ?,
                consultation_date = ?,
                followup_date = ?,
                status = ?,
                height = ?,
                weight = ?,
                bmi = ?,
                blood_pressure = ?,
                pulse = ?,
                temperature = ?,
                spo2 = ?,
                blood_sugar = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "iiisssssssssssddddididi",
            $this->appointment_id,
            $this->patient_id,
            $this->doctor_id,
            $this->chief_complaint,
            $this->clinical_notes,
            $this->medical_history,
            $this->physical_examination,
            $this->neurological_examination,
            $this->report,
            $this->diagnosis,
            $this->treatment_plan,
            $this->consultation_date,
            $this->followup_date,
            $this->status,
            $this->height,
            $this->weight,
            $this->bmi,
            $this->blood_pressure,
            $this->pulse,
            $this->temperature,
            $this->spo2,
            $this->blood_sugar,
            $this->id
        );

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                c.*,
                p.name AS patient_name,
                u.name AS doctor_name,
                a.serial_number
            FROM consultations c
            INNER JOIN patients p ON c.patient_id = p.id
            INNER JOIN doctors d ON c.doctor_id = d.id
            INNER JOIN users u ON d.user_id = u.id
            INNER JOIN appointments a ON c.appointment_id = a.id
            WHERE c.deleted_at IS NULL
            ORDER BY c.id DESC
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function all_by_patient_id($patient_id)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                c.*,
                p.name AS patient_name,
                u.name AS doctor_name,
                a.serial_number
            FROM consultations c
            INNER JOIN patients p ON c.patient_id = p.id
            INNER JOIN doctors d ON c.doctor_id = d.id
            INNER JOIN users u ON d.user_id = u.id
            INNER JOIN appointments a ON c.appointment_id = a.id
            WHERE c.deleted_at IS NULL AND a.patient_id = ?
            ORDER BY c.id DESC
        ");

        $stmt->bind_param("i", $patient_id);
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
            FROM consultations
            WHERE id = ? AND deleted_at IS NULL
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $consultation = self::find($id);

        if ($consultation && !empty($consultation->report)) {
            File::delete($consultation->report, "uploads/reports");
        }

        $stmt = $db->prepare("
            UPDATE consultations
            SET deleted_at = NOW()
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function patients()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT id, patient_code, name
            FROM patients
            ORDER BY name ASC
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function doctors()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                d.id,
                u.name AS doctor_name
            FROM doctors d
            INNER JOIN users u ON d.user_id = u.id
            ORDER BY u.name
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function appointments()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                a.id,
                a.serial_number,
                p.name AS patient_name
            FROM appointments a
            INNER JOIN patients p ON a.patient_id = p.id
            WHERE a.deleted_at IS NULL AND a.status != 'completed'
            ORDER BY a.appointment_date DESC, a.serial_number ASC
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }
}