<?php

class Patient
{
    public $id;
    public $name;
    public $gender;
    public $date_of_birth;
    public $blood_group;
    public $phone;
    public $email;
    public $nid;
    public $occupation;
    public $marital_status;
    public $address;
    public $emergency_contact_name;
    public $emergency_contact_phone;
    public $image;
    public $status;

    public function create()
    {
        global $db;

        $created_by = $_SESSION["user_id"];
        $updated_by = $_SESSION["user_id"];

        $db->query("
            INSERT INTO patients(
                name,
                gender,
                date_of_birth,
                blood_group,
                phone,
                email,
                nid,
                occupation,
                marital_status,
                address,
                emergency_contact_name,
                emergency_contact_phone,
                image,
                status,
                created_by,
                updated_by
            )
            VALUES(
                '$this->name',
                '$this->gender',
                '$this->date_of_birth',
                '$this->blood_group',
                '$this->phone',
                '$this->email',
                '$this->nid',
                '$this->occupation',
                '$this->marital_status',
                '$this->address',
                '$this->emergency_contact_name',
                '$this->emergency_contact_phone',
                '$this->image',
                '$this->status',
                '$created_by',
                '$updated_by'
            )
        ");

        $id = $db->insert_id;

        $patient_code = "PT-" . str_pad($id, 6, "0", STR_PAD_LEFT);

        $db->query("
            UPDATE patients
            SET patient_code='$patient_code'
            WHERE id='$id'
        ");

        return $id;
    }

    public function update()
    {
        global $db;

        $updated_by = $_SESSION["user_id"];

        return $db->query("
            UPDATE patients SET
                name='$this->name',
                gender='$this->gender',
                date_of_birth='$this->date_of_birth',
                blood_group='$this->blood_group',
                phone='$this->phone',
                email='$this->email',
                nid='$this->nid',
                occupation='$this->occupation',
                marital_status='$this->marital_status',
                address='$this->address',
                emergency_contact_name='$this->emergency_contact_name',
                emergency_contact_phone='$this->emergency_contact_phone',
                image='$this->image',
                status='$this->status',
                updated_by='$updated_by'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT *
            FROM patients
            ORDER BY id DESC
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
            FROM patients
            WHERE id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function delete($id)
    {
        global $db;

        $patient = self::find($id);

        if ($patient && !empty($patient->image)) {
            File::delete($patient->image, "uploads/patients");
        }
        return $db->query("
            DELETE FROM patients
            WHERE id='$id'
        ");
    }
}