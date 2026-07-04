<?php

class PrescriptionMedicine
{
    public $id;
    public $prescription_id;
    public $medicine_id;
    public $dose_id;
    public $frequency_id;
    public $duration_id;
    public $instruction_id;
    public $remarks;
    public $sort_order;

    public function create()
    {
        global $db;

        return $db->query("
            INSERT INTO prescription_medicines(
                prescription_id,
                medicine_id,
                dose_id,
                frequency_id,
                duration_id,
                instruction_id,
                remarks,
                sort_order
            )
            VALUES(
                '$this->prescription_id',
                '$this->medicine_id',
                '$this->dose_id',
                '$this->frequency_id',
                '$this->duration_id',
                '$this->instruction_id',
                '$this->remarks',
                '$this->sort_order'
            )
        ");
    }

    public function update()
    {
        global $db;

        return $db->query("
            UPDATE prescription_medicines SET
                prescription_id='$this->prescription_id',
                medicine_id='$this->medicine_id',
                dose_id='$this->dose_id',
                frequency_id='$this->frequency_id',
                duration_id='$this->duration_id',
                instruction_id='$this->instruction_id',
                remarks='$this->remarks',
                sort_order='$this->sort_order'
            WHERE id='$this->id'
        ");
    }

    public static function all()
    {
        global $db;

        $stmt = $db->query("
            SELECT
                pm.*,
                m.medicine_name,
                md.dose_name,
                mf.frequency_name,
                mdu.duration_name,
                mi.instruction_name

            FROM prescription_medicines pm

            LEFT JOIN medicines m
                ON m.id = pm.medicine_id

            LEFT JOIN medicine_doses md
                ON md.id = pm.dose_id

            LEFT JOIN medicine_frequencies mf
                ON mf.id = pm.frequency_id

            LEFT JOIN medicine_durations mdu
                ON mdu.id = pm.duration_id

            LEFT JOIN medicine_instructions mi
                ON mi.id = pm.instruction_id

            ORDER BY
                pm.prescription_id DESC,
                pm.sort_order ASC
        ");

        return array_map(
            fn($row)=>(object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function find($id)
    {
        global $db;

        $stmt = $db->query("
            SELECT
                pm.*,
                m.medicine_name,
                md.dose_name,
                mf.frequency_name,
                mdu.duration_name,
                mi.instruction_name

            FROM prescription_medicines pm

            LEFT JOIN medicines m
                ON m.id = pm.medicine_id

            LEFT JOIN medicine_doses md
                ON md.id = pm.dose_id

            LEFT JOIN medicine_frequencies mf
                ON mf.id = pm.frequency_id

            LEFT JOIN medicine_durations mdu
                ON mdu.id = pm.duration_id

            LEFT JOIN medicine_instructions mi
                ON mi.id = pm.instruction_id

            WHERE pm.id='$id'
        ");

        return $stmt->fetch_object();
    }

    public static function getByPrescription($prescription_id)
    {
        global $db;

        $stmt = $db->query("
            SELECT
                pm.*,
                m.medicine_name,
                md.dose_name,
                mf.frequency_name,
                mdu.duration_name,
                mi.instruction_name

            FROM prescription_medicines pm

            LEFT JOIN medicines m
                ON m.id = pm.medicine_id

            LEFT JOIN medicine_doses md
                ON md.id = pm.dose_id

            LEFT JOIN medicine_frequencies mf
                ON mf.id = pm.frequency_id

            LEFT JOIN medicine_durations mdu
                ON mdu.id = pm.duration_id

            LEFT JOIN medicine_instructions mi
                ON mi.id = pm.instruction_id

            WHERE pm.prescription_id='$prescription_id'

            ORDER BY pm.sort_order ASC
        ");

        return array_map(
            fn($row)=>(object)$row,
            $stmt->fetch_all(MYSQLI_ASSOC)
        );
    }

    public static function delete($id)
    {
        global $db;

        return $db->query("
            DELETE FROM prescription_medicines
            WHERE id='$id'
        ");
    }

    public static function deleteByPrescription($prescription_id)
    {
        global $db;

        return $db->query("
            DELETE FROM prescription_medicines
            WHERE prescription_id='$prescription_id'
        ");
    }
}