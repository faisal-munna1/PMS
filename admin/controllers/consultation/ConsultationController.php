<?php

class ConsultationController
{
    public function index()
    {
        $data = Consultation::all();

        view("", compact("data"));
    }

    public function create()
    {
        $appointments = Consultation::appointments();
        $patients     = Consultation::patients();
        $doctors      = Consultation::doctors();

        view("", compact(
            "appointments",
            "patients",
            "doctors"
        ));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $consultation = $this->consultationData();

        if (!empty($_FILES["report"]["name"])) {

            $consultation->report = File::upload(
                $_FILES["report"],
                "uploads/reports",
                "report"
            );
        }

        $consultation->create();

        redirect();
    }

    public function edit()
    {
        $data = Consultation::find($_GET["id"]);

        $appointments = Consultation::appointments();
        $patients     = Consultation::patients();
        $doctors      = Consultation::doctors();

        view("", compact(
            "data",
            "appointments",
            "patients",
            "doctors"
        ));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $consultation = $this->consultationData();
        $consultation->id = $_POST["id"];

        $oldConsultation = Consultation::find($consultation->id);

        if (!empty($_FILES["report"]["name"])) {

            if (!empty($oldConsultation->report)) {

                File::delete(
                    $oldConsultation->report,
                    "uploads/reports"
                );
            }

            $consultation->report = File::upload(
                $_FILES["report"],
                "uploads/reports",
                "report"
            );

        } else {

            $consultation->report = $oldConsultation->report;
        }

        $consultation->update();

        redirect();
    }

    public function delete()
    {
        Consultation::delete($_GET["id"]);

        redirect();
    }

    private function consultationData()
    {
        $consultation = new Consultation();

        $consultation->appointment_id    = $_POST["appointment_id"];
        $consultation->patient_id        = $_POST["patient_id"];
        $consultation->doctor_id         = $_POST["doctor_id"];
        $consultation->chief_complaint   = $_POST["chief_complaint"];
        $consultation->clinical_notes    = $_POST["clinical_notes"];
        $consultation->medical_history   = $_POST["medical_history"];
        $consultation->diagnosis         = $_POST["diagnosis"];
        $consultation->treatment_plan    = $_POST["treatment_plan"];
        $consultation->consultation_date = $_POST["consultation_date"];

        return $consultation;
    }
}