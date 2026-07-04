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

        return $db->query("
            INSERT INTO doctor_schedules
            (
                doctor_id,
                day_of_week,
                start_time,
                end_time,
                is_active
            )
            VALUES
            (
                '$this->doctor_id',
                '$this->day_of_week',
                '$this->start_time',
                '$this->end_time',
                '$this->is_active'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE doctor_schedules
            SET
                doctor_id='$this->doctor_id',
                day_of_week='$this->day_of_week',
                start_time='$this->start_time',
                end_time='$this->end_time',
                is_active='$this->is_active'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                ds.*,
                u.name AS doctor_name,
                d.specialization
            FROM doctor_schedules ds
            INNER JOIN doctors d
                ON ds.doctor_id = d.id
            INNER JOIN users u
                ON d.user_id = u.id
            ORDER BY
                FIELD(
                    ds.day_of_week,
                    'Saturday',
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday'
                ),
                ds.start_time
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
            FROM doctor_schedules
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM doctor_schedules
            WHERE id='$id'
        ");
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
                ON d.user_id = u.id
            WHERE d.deleted_at IS NULL
            ORDER BY u.name
        ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    // Optional: Prevent duplicate schedules
    public static function exists($doctor_id, $day_of_week, $start_time, $end_time)
    {
        global $db;

        $stmt = $db->query("
            SELECT id
            FROM doctor_schedules
            WHERE doctor_id='$doctor_id'
            AND day_of_week='$day_of_week'
            AND start_time='$start_time'
            AND end_time='$end_time'
            LIMIT 1
        ");

        return $stmt->num_rows > 0;
    }
}