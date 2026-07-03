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
        $data = Strength::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $strength = $this->strengthData();
        $strength->id = $_POST["id"];

        $strength->update();

        redirect();
    }

    public function delete()
    {
        Strength::delete($_GET["id"]);

        redirect();
    }

    private function strengthData()
    {
        $strength = new Strength();

        $strength->strength_name = $_POST["strength_name"];
        $strength->status = $_POST["status"];

        return $strength;
    }
}
?>