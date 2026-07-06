<?php

class StrengthController
{
    public function index()
    {
        $data = Strength::all();

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

        $strength = $this->strengthData();
        $strength->create();

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Strength::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $strength = $this->strengthData();
        $strength->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($strength->id) {
            $strength->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Strength::delete($id);
        }

        redirect();
    }

    private function strengthData()
    {
        $strength = new Strength();

        $strength->strength_name = filter_input(INPUT_POST, 'strength_name', FILTER_DEFAULT);
        $strength->status        = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $strength;
    }
}