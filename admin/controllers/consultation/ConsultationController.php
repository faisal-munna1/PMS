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

        // Foreign keys / core fields
        $consultation->appointment_id           = filter_input(INPUT_POST, 'appointment_id', FILTER_VALIDATE_INT);
        $consultation->patient_id               = filter_input(INPUT_POST, 'patient_id', FILTER_VALIDATE_INT);
        $consultation->doctor_id                = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
        
        // Clinical notes / Text fields
        $consultation->chief_complaint          = filter_input(INPUT_POST, 'chief_complaint', FILTER_DEFAULT);
        $consultation->clinical_notes           = filter_input(INPUT_POST, 'clinical_notes', FILTER_DEFAULT);
        $consultation->medical_history          = filter_input(INPUT_POST, 'medical_history', FILTER_DEFAULT);
        $consultation->physical_examination     = filter_input(INPUT_POST, 'physical_examination', FILTER_DEFAULT);
        $consultation->neurological_examination = filter_input(INPUT_POST, 'neurological_examination', FILTER_DEFAULT);
        $consultation->diagnosis                = filter_input(INPUT_POST, 'diagnosis', FILTER_DEFAULT);
        $consultation->treatment_plan           = filter_input(INPUT_POST, 'treatment_plan', FILTER_DEFAULT);
        
        // Dates & Status
        $consultation->consultation_date        = filter_input(INPUT_POST, 'consultation_date', FILTER_DEFAULT);
        $consultation->followup_date            = filter_input(INPUT_POST, 'followup_date', FILTER_DEFAULT) ?: null;
        $consultation->status                   = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        
        // Patient Vitals (Decimals & Integers mapped to match DB schema definitions)
        $consultation->height                   = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT) ?: null;
        $consultation->weight                   = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT) ?: null;
        $consultation->bmi                      = filter_input(INPUT_POST, 'bmi', FILTER_VALIDATE_FLOAT) ?: null;
        $consultation->blood_pressure           = filter_input(INPUT_POST, 'blood_pressure', FILTER_DEFAULT) ?: null;
        $consultation->pulse                    = filter_input(INPUT_POST, 'pulse', FILTER_VALIDATE_INT) ?: null;
        $consultation->temperature              = filter_input(INPUT_POST, 'temperature', FILTER_VALIDATE_FLOAT) ?: null;
        $consultation->spo2                     = filter_input(INPUT_POST, 'spo2', FILTER_VALIDATE_INT) ?: null;
        $consultation->blood_sugar              = filter_input(INPUT_POST, 'blood_sugar', FILTER_VALIDATE_FLOAT) ?: null;

        return $consultation;
    }
}