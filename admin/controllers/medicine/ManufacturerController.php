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
        $data = Manufacturer::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $manufacturer = $this->manufacturerData();
        $manufacturer->id = $_POST["id"];

        $manufacturer->update();

        redirect();
    }

    public function delete()
    {
        Manufacturer::delete($_GET["id"]);

        redirect();
    }

    private function manufacturerData()
    {
        $manufacturer = new Manufacturer();

        $manufacturer->manufacturer_name = $_POST["manufacturer_name"];
        $manufacturer->status = $_POST["status"];

        return $manufacturer;
    }
}