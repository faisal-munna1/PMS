<?php

class PrescriptionMedicineController
{

    public function index()
    {
        $data = PrescriptionMedicine::all();

        view("prescription", compact("data"));
    }

    public function create()
    {
        $prescriptions = Prescription::all();

        $medicines = Medicine::all();
        $doses = Dose::all();
        $frequencies = Frequency::all();
        $durations = Duration::all();
        $instructions = Instruction::all();

        view("prescription", compact(
            "prescriptions",
            "medicines",
            "doses",
            "frequencies",
            "durations",
            "instructions"
        ));
    }

    public function save()
    {
        if(!isset($_POST["btn_submit"])) return;

        foreach($_POST["medicine_id"] as $key=>$medicine_id){

            $medicine = new PrescriptionMedicine();

            $medicine->prescription_id = $_POST["prescription_id"];
            $medicine->medicine_id = $medicine_id;
            $medicine->dose_id = $_POST["dose_id"][$key];
            $medicine->frequency_id = $_POST["frequency_id"][$key];
            $medicine->duration_id = $_POST["duration_id"][$key];
            $medicine->instruction_id = $_POST["instruction_id"][$key];
            $medicine->remarks = $_POST["remarks"][$key];
            $medicine->sort_order = $_POST["sort_order"][$key];

            $medicine->create();

        }

        redirect();

    }

    public function edit()
    {
        $data = PrescriptionMedicine::find($_GET["id"]);

        $prescriptions = Prescription::all();

        $medicines = Medicine::all();
        $doses = Dose::all();
        $frequencies = Frequency::all();
        $durations = Duration::all();
        $instructions = Instruction::all();

        view("prescription", compact(
            "data",
            "prescriptions",
            "medicines",
            "doses",
            "frequencies",
            "durations",
            "instructions"
        ));
    }

    public function update()
    {
        if(!isset($_POST["btn_submit"])) return;

        $medicine = new PrescriptionMedicine();

        $medicine->id = $_POST["id"];
        $medicine->prescription_id = $_POST["prescription_id"];
        $medicine->medicine_id = $_POST["medicine_id"];
        $medicine->dose_id = $_POST["dose_id"];
        $medicine->frequency_id = $_POST["frequency_id"];
        $medicine->duration_id = $_POST["duration_id"];
        $medicine->instruction_id = $_POST["instruction_id"];
        $medicine->remarks = $_POST["remarks"];
        $medicine->sort_order = $_POST["sort_order"];

        $medicine->update();

        redirect();

    }

    public function delete()
    {
        PrescriptionMedicine::delete($_GET["id"]);

        redirect();
    }

}