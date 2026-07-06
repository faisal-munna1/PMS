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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Dose::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $dose = $this->doseData();
        $dose->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($dose->id) {
            $dose->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Dose::delete($id);
        }

        redirect();
    }

    private function doseData()
    {
        $dose = new Dose();

        $dose->dose_name = filter_input(INPUT_POST, 'dose_name', FILTER_DEFAULT);

        return $dose;
    }
}