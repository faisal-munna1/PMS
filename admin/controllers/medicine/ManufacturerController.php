<?php

class ManufacturerController
{
    public function index()
    {
        $data = Manufacturer::all();

        view("medicine", compact("data"));
    }

    public function create()
    {
        view("medicine");
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $manufacturer = $this->manufacturerData();
        $manufacturer->create();

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Manufacturer::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $manufacturer = $this->manufacturerData();
        $manufacturer->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($manufacturer->id) {
            $manufacturer->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Manufacturer::delete($id);
        }

        redirect();
    }

    private function manufacturerData()
    {
        $manufacturer = new Manufacturer();

        $manufacturer->manufacturer_name = filter_input(INPUT_POST, 'manufacturer_name', FILTER_DEFAULT);
        $manufacturer->status            = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $manufacturer;
    }
}