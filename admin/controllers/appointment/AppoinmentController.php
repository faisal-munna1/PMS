<?php

class AppointmentController
{
    public function index()
    {
   
        $data = Appointment::all();
        view("", compact("data"));
    }

    public function create()
    {
        $patients = Appointment::patients();
        $doctors  = Appointment::doctors();

        view("", compact("patients", "doctors"));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $appointment = $this->appointmentData();

        // Automatic serial number calculation based on selected doctor and date
        $appointment->serial_number = Appointment::nextSerial(
            $appointment->doctor_id,
            $appointment->appointment_date
        );

        $appointment->created_by = $_SESSION["user_id"] ?? null;

        $appointment->create();

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect(); // Id na thakle ba invalid hole back korbe
            return;
        }

        $data = Appointment::find($id);
        $patients = Appointment::patients();
        $doctors  = Appointment::doctors();

        view("", compact("data", "patients", "doctors"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $appointment = $this->appointmentData();
        $appointment->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$appointment->id) {
            redirect();
            return;
        }

        // Doctor athoba Date change holei sudhu notun serial asbe
        $oldAppointment = Appointment::find($appointment->id);

        if ($oldAppointment) {
            if (
                $oldAppointment->doctor_id != $appointment->doctor_id ||
                $oldAppointment->appointment_date != $appointment->appointment_date
            ) {
                $appointment->serial_number = Appointment::nextSerial(
                    $appointment->doctor_id,
                    $appointment->appointment_date
                );
            } else {
                $appointment->serial_number = $oldAppointment->serial_number;
            }

            $appointment->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        if ($id) {
            Appointment::delete($id);
        }

        redirect();
    }

    /**
     * Reusable mapping helper to extract post data securely
     */
    private function appointmentData()
    {
        $appointment = new Appointment();

        // XSS safety dynamically handle korar jonno sanitization use kora bhalo
        $appointment->patient_id       = filter_input(INPUT_POST, 'patient_id', FILTER_VALIDATE_INT);
        $appointment->doctor_id        = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
        $appointment->appointment_date = filter_input(INPUT_POST, 'appointment_date', FILTER_DEFAULT);
        $appointment->appointment_time = filter_input(INPUT_POST, 'appointment_time', FILTER_DEFAULT);
        $appointment->reason_for_visit = filter_input(INPUT_POST, 'reason_for_visit', FILTER_DEFAULT);
        $appointment->status           = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $appointment;
    }
}