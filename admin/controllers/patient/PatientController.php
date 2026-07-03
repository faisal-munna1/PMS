<?php

class PatientController
{
    public function index()
    {
        $data = Patient::all();
        view("", compact("data"));
    }

    public function create()
    {
        view("");
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $patient = $this->patientData();

        if (!empty($_FILES["image"]["name"])) {
            $patient->image = File::upload(
                $_FILES["image"],
                "uploads/patients",
                $patient->name
            );
        }

        $patient->create();

        redirect();
    }

    public function edit()
    {
        $data = Patient::find($_GET["id"]);

        view("", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $patient = $this->patientData();
        $patient->id = $_POST["id"];

        $oldPatient = Patient::find($patient->id);

        if (!empty($_FILES["image"]["name"])) {

            if (!empty($oldPatient->image)) {
                File::delete($oldPatient->image, "uploads/patients");
            }

            $patient->image = File::upload(
                $_FILES["image"],
                "uploads/patients",
                $patient->name
            );

        } else {

            $patient->image = $oldPatient->image;
        }

        $patient->update();

        redirect();
    }

    public function delete()
    {
        Patient::delete($_GET["id"]);

        redirect();
    }

    private function patientData()
    {
        $patient = new Patient();

        $patient->name = $_POST["name"];
        $patient->gender = $_POST["gender"];
        $patient->date_of_birth = $_POST["date_of_birth"];
        $patient->blood_group = $_POST["blood_group"];
        $patient->phone = $_POST["phone"];
        $patient->email = $_POST["email"];
        $patient->nid = $_POST["nid"];
        $patient->occupation = $_POST["occupation"];
        $patient->marital_status = $_POST["marital_status"];
        $patient->address = $_POST["address"];
        $patient->emergency_contact_name = $_POST["emergency_contact_name"];
        $patient->emergency_contact_phone = $_POST["emergency_contact_phone"];
        $patient->status = $_POST["status"];

        return $patient;
    }
}