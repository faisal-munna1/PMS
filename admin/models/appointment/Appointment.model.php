<?php

class Appointment
{
    public $id;
    public $patient_id;
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $serial_number;
    public $reason_for_visit;
    public $status;
    public $created_by;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO appointments (
                patient_id, doctor_id, appointment_date, appointment_time, 
                serial_number, reason_for_visit, status, created_by
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "iississi",
            $this->patient_id,
            $this->doctor_id,
            $this->appointment_date,
            $this->appointment_time,
            $this->serial_number,
            $this->reason_for_visit,
            $this->status,
            $this->created_by
        );

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE appointments SET
                patient_id = ?,
                doctor_id = ?,
                appointment_date = ?,
                appointment_time = ?,
                serial_number = ?,
                reason_for_visit = ?,
                status = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "iississi",
            $this->patient_id,
            $this->doctor_id,
            $this->appointment_date,
            $this->appointment_time,
            $this->serial_number,
            $this->reason_for_visit,
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
                a.*,
                p.patient_code,
                p.name AS patient_name,
                u.name AS doctor_name
            FROM appointments a
            INNER JOIN patients p ON a.patient_id = p.id
            INNER JOIN doctors d ON a.doctor_id = d.id
            INNER JOIN users u ON d.user_id = u.id
            WHERE a.deleted_at IS NULL
            ORDER BY
                a.appointment_date DESC,
                a.appointment_time ASC,
                a.serial_number ASC
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function all_by_user_id($user_id)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                a.*,
                p.patient_code,
                p.name AS patient_name,
                u.name AS doctor_name
            FROM appointments a
            INNER JOIN patients p ON a.patient_id = p.id
            INNER JOIN doctors d ON a.doctor_id = d.id
            INNER JOIN users u ON d.user_id = u.id
            WHERE a.deleted_at IS NULL 
              AND d.user_id = ?
            ORDER BY
                a.appointment_date DESC,
                a.appointment_time ASC,
                a.serial_number ASC
        ");

        $stmt->bind_param("i", $user_id);
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
            FROM appointments
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

        $stmt = $db->prepare("
            UPDATE appointments
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
            WHERE status = 'active'
            ORDER BY name
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
            u.name AS doctor_name,
            d.specialization
        FROM doctors d
        INNER JOIN users u ON d.user_id = u.id
        WHERE d.status = 'active'
        ORDER BY u.name
    ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function nextSerial($doctor_id, $appointment_date)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT COALESCE(MAX(serial_number), 0) + 1 AS serial_number
            FROM appointments
            WHERE doctor_id = ? AND appointment_date = ? AND deleted_at IS NULL
        ");

        $stmt->bind_param("is", $doctor_id, $appointment_date);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object()->serial_number;
    }
}
