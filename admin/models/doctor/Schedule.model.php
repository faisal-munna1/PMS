<?php

class Schedule
{
    public $id;
    public $doctor_id;
    public $day_of_week;
    public $start_time;
    public $end_time;
    public $is_active;

    public function create()
    {
        global $db;

        $stmt = $db->prepare("
            INSERT INTO doctor_schedules (doctor_id, day_of_week, start_time, end_time, is_active)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "isssi",
            $this->doctor_id,
            $this->day_of_week,
            $this->start_time,
            $this->end_time,
            $this->is_active
        );

        return $stmt->execute();
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE doctor_schedules
            SET doctor_id = ?, day_of_week = ?, start_time = ?, end_time = ?, is_active = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "isssii",
            $this->doctor_id,
            $this->day_of_week,
            $this->start_time,
            $this->end_time,
            $this->is_active,
            $this->id
        );

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;

        $stmt = $db->prepare("
            SELECT
                ds.*,
                u.name AS doctor_name,
                d.specialization
            FROM doctor_schedules ds
            INNER JOIN doctors d ON ds.doctor_id = d.id
            INNER JOIN users u ON d.user_id = u.id
            ORDER BY
                FIELD(ds.day_of_week, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
                ds.start_time
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
            FROM doctor_schedules
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
            DELETE FROM doctor_schedules
            WHERE id = ?
        ");

        $stmt->bind_param("i", $id);
        return $stmt->execute();
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
            ORDER BY u.name
        ");

        $stmt->execute();
        $result = $stmt->get_result();

        return array_map(
            fn($row) => (object)$row,
            $result->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function exists($doctor_id, $day_of_week, $start_time, $end_time)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT id
            FROM doctor_schedules
            WHERE doctor_id = ? AND day_of_week = ? AND start_time = ? AND end_time = ?
            LIMIT 1
        ");

        $stmt->bind_param("isss", $doctor_id, $day_of_week, $start_time, $end_time);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }
}