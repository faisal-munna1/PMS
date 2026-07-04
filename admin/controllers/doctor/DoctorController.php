<?php

class DoctorController
{
    public function index()
    {
        $data = Doctor::all();

        view("doctor", compact("data"));
    }

    public function create()
    {
        $users = User::all();

        view("doctor", compact("users"));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $doctor = $this->doctorData();

        // Doctor Image
        if (!empty($_FILES["image"]["name"])) {
            $doctor->image = File::upload(
                $_FILES["image"],
                "uploads/doctors",
                $doctor->specialization
            );
        }

        // Signature Image
        if (!empty($_FILES["signature_image"]["name"])) {
            $doctor->signature_image = File::upload(
                $_FILES["signature_image"],
                "uploads/signatures",
                $doctor->specialization
            );
        }

        $doctor->create();

        redirect();
    }

    public function edit()
    {
        $data = Doctor::find($_GET["id"]);
        $users = User::all();

        view("doctor", compact("data", "users"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $doctor = $this->doctorData();
        $doctor->id = $_POST["id"];

        $oldDoctor = Doctor::find($doctor->id);

        // Doctor Image
        if (!empty($_FILES["image"]["name"])) {

            if (!empty($oldDoctor->image)) {
                File::delete($oldDoctor->image, "uploads/doctors");
            }

            $doctor->image = File::upload(
                $_FILES["image"],
                "uploads/doctors",
                $doctor->specialization
            );

        } else {
            $doctor->image = $oldDoctor->image;
        }

        // Signature Image
        if (!empty($_FILES["signature_image"]["name"])) {

            if (!empty($oldDoctor->signature_image)) {
                File::delete($oldDoctor->signature_image, "uploads/signatures");
            }

            $doctor->signature_image = File::upload(
                $_FILES["signature_image"],
                "uploads/signatures",
                $doctor->specialization
            );

        } else {
            $doctor->signature_image = $oldDoctor->signature_image;
        }

        $doctor->update();

        redirect();
    }

    public function delete()
    {
        $doctor = Doctor::find($_GET["id"]);

        if (!empty($doctor->image)) {
            File::delete($doctor->image, "uploads/doctors");
        }

        if (!empty($doctor->signature_image)) {
            File::delete($doctor->signature_image, "uploads/signatures");
        }

        Doctor::delete($_GET["id"]);

        redirect();
    }

    private function doctorData()
    {
        $doctor = new Doctor();

        $doctor->user_id = $_POST["user_id"];
        $doctor->specialization = $_POST["specialization"];
        $doctor->qualification = $_POST["qualification"];
        $doctor->consultation_fee = $_POST["consultation_fee"];
        $doctor->status = $_POST["status"];

        return $doctor;
    }
}