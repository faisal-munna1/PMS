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

        return $db->query("
            INSERT INTO appointments(
                patient_id,
                doctor_id,
                appointment_date,
                appointment_time,
                serial_number,
                reason_for_visit,
                status,
                created_by
            )
            VALUES(
                '$this->patient_id',
                '$this->doctor_id',
                '$this->appointment_date',
                '$this->appointment_time',
                '$this->serial_number',
                '$this->reason_for_visit',
                '$this->status',
                '$this->created_by'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE appointments SET
                patient_id='$this->patient_id',
                doctor_id='$this->doctor_id',
                appointment_date='$this->appointment_date',
                appointment_time='$this->appointment_time',
                serial_number='$this->serial_number',
                reason_for_visit='$this->reason_for_visit',
                status='$this->status'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                a.*,
                p.patient_code,
                p.name AS patient_name,
                u.name AS doctor_name
            FROM appointments a
            INNER JOIN patients p
                ON a.patient_id = p.id
            INNER JOIN doctors d
                ON a.doctor_id = d.id
            INNER JOIN users u
                ON d.user_id = u.id
            WHERE a.deleted_at IS NULL
            ORDER BY
                a.appointment_date DESC,
                a.appointment_time ASC,
                a.serial_number ASC
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
            FROM appointments
            WHERE id='$id'
            AND deleted_at IS NULL
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            UPDATE appointments
            SET deleted_at = NOW()
            WHERE id='$id'
        ");
    }

    public static function patients()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                id,
                patient_code,
                name
            FROM patients
            WHERE status='active'
            ORDER BY name
        ");

        return array_map(
            fn($row)=>(object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function doctors()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                d.id,
                u.name AS doctor_name,
                d.specialization
            FROM doctors d
            INNER JOIN users u
                ON d.user_id=u.id
            WHERE
                d.status='active'
                AND d.deleted_at IS NULL
            ORDER BY u.name
        ");

        return array_map(
            fn($row)=>(object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function nextSerial($doctor_id, $appointment_date)
    {
        global $db;

        $stmt = $db->query("
        SELECT COALESCE(MAX(serial_number),00)+1 AS serial_number
        FROM appointments
        WHERE doctor_id='$doctor_id'
        AND appointment_date='$appointment_date'
        AND deleted_at IS NULL
    ");

        return $stmt->fetch_object()->serial_number;
    }
}