<?php

class Doctor
{
    public $id;
    public $user_id;
    public $name;
    public $email;
    public $phone;
    public $specialization;
    public $qualification;
    public $consultation_fee;
    public $signature_image;
    public $image;
    public $status;

    public function set(
        $id,
        $user_id,
        $name,
        $email,
        $phone,
        $specialization,
        $qualification,
        $consultation_fee,
        $signature_image,
        $image,
        $status
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->specialization = $specialization;
        $this->qualification = $qualification;
        $this->consultation_fee = $consultation_fee;
        $this->signature_image = $signature_image;
        $this->image = $image;
        $this->status = $status;
    }

    public function create()
    {
        global $db;
        
        $stmt = $db->prepare("
            INSERT INTO doctors
            (
                user_id, name, email, phone, specialization, 
                qualification, consultation_fee, signature_image, image, status
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "isssssssss",
            $this->user_id,
            $this->name,
            $this->email,
            $this->phone,
            $this->specialization,
            $this->qualification,
            $this->consultation_fee,
            $this->signature_image,
            $this->image,
            $this->status
        );

        $stmt->execute();
        return $db->insert_id;
    }

    public function update()
    {
        global $db;

        $stmt = $db->prepare("
            UPDATE doctors
            SET
                user_id = ?,
                name = ?,
                email = ?,
                phone = ?,
                specialization = ?,
                qualification = ?,
                consultation_fee = ?,
                signature_image = ?,
                image = ?,
                status = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "isssssssssi",
            $this->user_id,
            $this->name,
            $this->email,
            $this->phone,
            $this->specialization,
            $this->qualification,
            $this->consultation_fee,
            $this->signature_image,
            $this->image,
            $this->status,
            $this->id
        );

        return $stmt->execute();
    }

    public static function all()
    {
        global $db;
        $stmt = $db->query(" SELECT * FROM doctors ");

        return array_map(
            fn($row) => (object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function find($id)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM doctors
            WHERE id = ?
            
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
    }

    public static function findByUserId($id)
    {
        global $db;

        $stmt = $db->prepare("
            SELECT *
            FROM doctors
            WHERE user_id = ?
           
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
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

        $stmt = $db->prepare("
            UPDATE doctors
            SET deleted_at = NOW()
            WHERE id = ?
        ");
        
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}