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
        $generics      = Generic::all();
        $manufacturers = Manufacturer::all();
        $types         = Type::all();
        $strengths     = Strength::all();

        view("medicine", compact("generics", "manufacturers", "types", "strengths"));
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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data          = Medicine::find($id);
        $generics      = Generic::all();
        $manufacturers = Manufacturer::all();
        $types         = Type::all();
        $strengths     = Strength::all();

        view("medicine", compact("data", "generics", "manufacturers", "types", "strengths"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $medicine     = $this->medicineData();
        $medicine->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($medicine->id) {
            $medicine->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Medicine::delete($id);
        }

        redirect();
    }

    private function medicineData()
    {
        $medicine = new Medicine();

        $medicine->medicine_name   = filter_input(INPUT_POST, 'medicine_name', FILTER_DEFAULT);
        $medicine->generic_id      = filter_input(INPUT_POST, 'generic_id', FILTER_VALIDATE_INT);
        $medicine->manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT);
        $medicine->type_id         = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $medicine->strength_id     = filter_input(INPUT_POST, 'strength_id', FILTER_VALIDATE_INT);
        $medicine->status          = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $medicine;
    }
}