<?php

class MedicineController
{
    public function index()
    {
        $data = Medicine::all();

        view("medicine", compact("data"));
    }

    public function create()
    {
        $generics = Generic::all();
        $manufacturers = Manufacturer::all();
        $types = Type::all();
        $strengths = Strength::all();

        view("medicine", compact(
            "generics",
            "manufacturers",
            "types",
            "strengths"
        ));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $medicine = $this->medicineData();

        $medicine->create();

        redirect();
    }

    public function edit()
    {
        $data = Medicine::find($_GET["id"]);

        $generics = Generic::all();
        $manufacturers = Manufacturer::all();
        $types = Type::all();
        $strengths = Strength::all();

        view("medicine", compact(
            "data",
            "generics",
            "manufacturers",
            "types",
            "strengths"
        ));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $medicine = $this->medicineData();
        $medicine->id = $_POST["id"];

        $medicine->update();

        redirect();
    }

    public function delete()
    {
        Medicine::delete($_GET["id"]);

        redirect();
    }

    private function medicineData()
    {
        $medicine = new Medicine();

        $medicine->medicine_name   = $_POST["medicine_name"];
        $medicine->generic_id      = $_POST["generic_id"];
        $medicine->manufacturer_id = $_POST["manufacturer_id"];
        $medicine->type_id         = $_POST["type_id"];
        $medicine->strength_id     = $_POST["strength_id"];
        $medicine->status          = $_POST["status"];

        return $medicine;
    }
}