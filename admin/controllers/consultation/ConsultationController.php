<?php

class ConsultationController
{
    public function index()
    {
        $patient_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($patient_id) {
            $data = Consultation::all_by_patient_id($patient_id);
        } else {
            $data = Consultation::all();
        }

        view("", compact("data"));
    }

    public function create()
    {
        $appointments = Consultation::appointments();
        $patients     = Consultation::patients();
        $doctors      = Consultation::doctors();

        view("", compact("appointments", "patients", "doctors"));
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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Consultation::find($id);
        $appointments = Consultation::appointments();
        $patients     = Consultation::patients();
        $doctors      = Consultation::doctors();

        view("", compact("data", "appointments", "patients", "doctors"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $consultation = $this->consultationData();
        $consultation->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$consultation->id) {
            redirect();
            return;
        }

        $oldConsultation = Consultation::find($consultation->id);

        if ($oldConsultation) {
            if (!empty($_FILES["report"]["name"])) {
                if (!empty($oldConsultation->report)) {
                    File::delete($oldConsultation->report, "uploads/reports");
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
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Consultation::delete($id);
        }

        redirect();
    }

    private function consultationData()
    {
        $consultation = new Consultation();

        $consultation->appointment_id   = filter_input(INPUT_POST, 'appointment_id', FILTER_VALIDATE_INT);
        $consultation->patient_id       = filter_input(INPUT_POST, 'patient_id', FILTER_VALIDATE_INT);
        $consultation->doctor_id        = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
        $consultation->chief_complaint   = filter_input(INPUT_POST, 'chief_complaint', FILTER_DEFAULT);
        $consultation->clinical_notes    = filter_input(INPUT_POST, 'clinical_notes', FILTER_DEFAULT);
        $consultation->medical_history   = filter_input(INPUT_POST, 'medical_history', FILTER_DEFAULT);
        $consultation->diagnosis         = filter_input(INPUT_POST, 'diagnosis', FILTER_DEFAULT);
        $consultation->treatment_plan    = filter_input(INPUT_POST, 'treatment_plan', FILTER_DEFAULT);
        $consultation->consultation_date = filter_input(INPUT_POST, 'consultation_date', FILTER_DEFAULT);

        return $consultation;
    }
}
