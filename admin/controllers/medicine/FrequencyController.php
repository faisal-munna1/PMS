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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Frequency::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $frequency = $this->frequencyData();
        $frequency->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($frequency->id) {
            $frequency->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Frequency::delete($id);
        }

        redirect();
    }

    private function frequencyData()
    {
        $frequency = new Frequency();

        $frequency->frequency_name = filter_input(INPUT_POST, 'frequency_name', FILTER_DEFAULT);

        return $frequency;
    }
}