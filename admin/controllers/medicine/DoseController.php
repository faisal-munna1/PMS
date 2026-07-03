<?php

class DoseController
{
    public function index()
    {
        $data = Dose::all();

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

        $dose = $this->doseData();

        $dose->create();

        redirect();
    }

    public function edit()
    {
        $data = Dose::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $dose = $this->doseData();
        $dose->id = $_POST["id"];

        $dose->update();

        redirect();
    }

    public function delete()
    {
        Dose::delete($_GET["id"]);

        redirect();
    }

    private function doseData()
    {
        $dose = new Dose();

        $dose->dose_name = $_POST["dose_name"];

        return $dose;
    }
}