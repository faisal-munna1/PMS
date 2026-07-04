<?php

class Doctor
{
    public $id;
    public $user_id;
    public $specialization;
    public $qualification;
    public $consultation_fee;
    public $signature_image;
    public $image;
    public $status;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO doctors(
                user_id,
                specialization,
                qualification,
                consultation_fee,
                signature_image,
                image,
                status
            )
            VALUES(
                '$this->user_id',
                '$this->specialization',
                '$this->qualification',
                '$this->consultation_fee',
                '$this->signature_image',
                '$this->image',
                '$this->status'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE doctors SET
                user_id='$this->user_id',
                specialization='$this->specialization',
                qualification='$this->qualification',
                consultation_fee='$this->consultation_fee',
                signature_image='$this->signature_image',
                image='$this->image',
                status='$this->status'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                d.*,
                u.name AS doctor_name
            FROM doctors d
            LEFT JOIN users u
                ON d.user_id = u.id
            WHERE d.deleted_at IS NULL
            ORDER BY d.id DESC
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
            FROM doctors
            WHERE id='$id'
            AND deleted_at IS NULL
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $doctor = self::find($id);

        if ($doctor) {

            if (!empty($doctor->image)) {
                File::delete($doctor->image, "uploads/doctors");
            }

            if (!empty($doctor->signature_image)) {
                File::delete($doctor->signature_image, "uploads/signatures");
            }
        }

        return $db->query("
            UPDATE doctors
            SET deleted_at = NOW()
            WHERE id='$id'
        ");
    }
}