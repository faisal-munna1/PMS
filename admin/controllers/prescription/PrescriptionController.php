<?php

class PrescriptionController
{

     public function prescription()
    {
       $cosultation_id= $_GET["id"];
       $consultation= Consultation::find($cosultation_id);
       $patients= Patient::find($consultation->patient_id);
       $doctor= Doctor::find($consultation->doctor_id);
        view("", compact("consultation","patients","doctor"));
    }

    public function view(){
        view("");
    }
    public function index(){
        view("");
    }
}