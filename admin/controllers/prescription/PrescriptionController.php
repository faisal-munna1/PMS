<?php

class PrescriptionController
{
    public function index()
    {
        $data = Prescription::all();

        view("prescription", compact("data"));
    }

    public function create()
    {
        $consultations = Consultation::all();
        $patients      = Patient::all();
        $doctors       = Doctor::all();

        view( "prescription",compact("consultations", "patients", "doctors") );
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $prescription = $this->prescriptionData();

        $prescription->create();

        redirect();
    }

    public function edit()
    {
        $data = Prescription::find($_GET["id"]);

        $consultations = Consultation::all();
        $patients      = Patient::all();
        $doctors       = Doctor::all();

        view(
            "",
            compact(
                "data",
                "consultations",
                "patients",
                "doctors"
            )
        );
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $prescription = $this->prescriptionData();
        $prescription->id = $_POST["id"];

        $prescription->update();

        redirect();
    }

    public function delete()
    {
        Prescription::delete($_GET["id"]);

        redirect();
    }

    private function prescriptionData()
    {
        $prescription = new Prescription();

        $prescription->consultation_id = $_POST["consultation_id"];
        $prescription->patient_id = $_POST["patient_id"];
        $prescription->doctor_id = $_POST["doctor_id"];
        $prescription->prescription_date = $_POST["prescription_date"];

        return $prescription;
    }


     public function prescription()
    {
       $cosultation_id= $_GET["id"];
       $consultation= Consultation::find($cosultation_id);
       $patients= Patient::find($consultation->patient_id);
       $doctor= Doctor::find($consultation->doctor_id);
       $medicine= Medicine::all();
       $dose= Dose::all();
       $instruction= Instruction::all();
       $duration= Duration::all();
    

       print_r($doctor);
        view("prescription", compact("consultation","patients","doctor","medicine", "dose","instruction",'duration'));
    }
}