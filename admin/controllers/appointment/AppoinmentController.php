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

        $appointment->serial_number = Appointment::nextSerial(
            $appointment->doctor_id,
            $appointment->appointment_date
        );

        $appointment->created_by = $_SESSION["user_id"];

        $appointment->create();

        redirect();
    }

    public function edit()
    {
        $data = Appointment::find($_GET["id"]);

        $patients = Appointment::patients();
        $doctors  = Appointment::doctors();

        view("", compact(
            "data",
            "patients",
            "doctors"
        ));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $appointment = $this->appointmentData();

        $appointment->id = $_POST["id"];

        // Generate new serial if doctor or date changed
        $oldAppointment = Appointment::find($appointment->id);

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

        redirect();
    }

    public function delete()
    {
        Appointment::delete($_GET["id"]);

        redirect();
    }

    private function appointmentData()
    {
        $appointment = new Appointment();

        $appointment->patient_id         = $_POST["patient_id"];
        $appointment->doctor_id          = $_POST["doctor_id"];
        $appointment->appointment_date   = $_POST["appointment_date"];
        $appointment->appointment_time   = $_POST["appointment_time"];
        $appointment->reason_for_visit   = $_POST["reason_for_visit"];
        $appointment->status             = $_POST["status"];

        return $appointment;
    }

}
