<?php

class DashboardModel
{


    // Total Patients
    public function totalPatients()
    {
        global $db;

        $result = $db->query("
            SELECT COUNT(*) AS total
            FROM patients
            WHERE deleted_at IS NULL
        ");

        return $result->fetch_object()->total ?? 0;
    }




    // Today's Appointment
    public function todayAppointment()
    {
        global $db;

        $today = date("Y-m-d");


        $stmt = $db->prepare("
            SELECT COUNT(*) AS total
            FROM appointments
            WHERE appointment_date = ?
        ");


        $stmt->bind_param("s", $today);

        $stmt->execute();


        return $stmt->get_result()
            ->fetch_object()
            ->total ?? 0;
    }





    // Today's Prescription
    public function todayPrescription()
    {
        global $db;


        $today = date("Y-m-d");


        $stmt = $db->prepare("
            SELECT COUNT(*) AS total
            FROM prescriptions
            WHERE DATE(created_at)=?
        ");


        $stmt->bind_param("s", $today);


        $stmt->execute();


        return $stmt->get_result()
            ->fetch_object()
            ->total ?? 0;
    }





    // Today's Patient Queue Count
    public function todayPatientQueue()
    {
        global $db;


        $today = date("Y-m-d");


        $stmt = $db->prepare("
            SELECT COUNT(*) AS total
            FROM appointments
            WHERE appointment_date=?
            AND status IN ('pending','waiting')
        ");


        $stmt->bind_param("s", $today);


        $stmt->execute();


        return $stmt->get_result()
            ->fetch_object()
            ->total ?? 0;
    }







    // Today's Patient Queue List
    public function todayQueueList()
    {
        global $db;


        $today = date("Y-m-d");


        $stmt = $db->prepare("
            SELECT 

                a.id,
                a.appointment_time,
                a.status,

                p.name AS patient_name

            FROM appointments a

            INNER JOIN patients p
            ON p.id = a.patient_id


            WHERE a.appointment_date = ?


            ORDER BY a.appointment_time ASC

        ");


        $stmt->bind_param("s", $today);


        $stmt->execute();


        return $stmt->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }








    // Recent Registered Patients
    public function recentPatients()
    {
        global $db;


        $result = $db->query("
            
            SELECT

                id,
                patient_code,
                name,
                phone,
                created_at


            FROM patients


            WHERE deleted_at IS NULL


            ORDER BY id DESC


            LIMIT 5

        ");


        return $result->fetch_all(MYSQLI_ASSOC);
    }







    // Pending Followup
    public function pendingFollowup()
    {
        global $db;

        $today = date("Y-m-d");


        $stmt = $db->prepare("
        SELECT
            f.id,
            f.follow_up_date,
            f.status,
            p.name AS patient_name,
            p.phone,
            d.name AS doctor_name

        FROM follow_ups f

        INNER JOIN patients p
            ON p.id = f.patient_id

        LEFT JOIN doctors d
            ON d.id = f.doctor_id

        WHERE f.follow_up_date >= ?
        AND f.status = 'Scheduled'
        AND f.deleted_at IS NULL

        ORDER BY f.follow_up_date ASC

        LIMIT 5
    ");


        $stmt->bind_param("s", $today);

        $stmt->execute();


        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }
}
