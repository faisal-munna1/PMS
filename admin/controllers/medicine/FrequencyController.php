<?php

class FrequencyController
{
    public function index()
    {
        $data = Frequency::all();

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

        $frequency = $this->frequencyData();

        $frequency->create();

        redirect();
    }

    public function edit()
    {
        $data = Frequency::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $frequency = $this->frequencyData();
        $frequency->id = $_POST["id"];

        $frequency->update();

        redirect();
    }

    public function delete()
    {
        Frequency::delete($_GET["id"]);

        redirect();
    }

    private function frequencyData()
    {
        $frequency = new Frequency();

        $frequency->frequency_name = $_POST["frequency_name"];

        return $frequency;
    }
}