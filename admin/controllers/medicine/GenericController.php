<?php

class GenericController
{
    public function index()
    {
        $data = Generic::all();

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

        $generic = $this->genericData();

        $generic->create();

        redirect();
    }

    public function edit()
    {
        $data = Generic::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $generic = $this->genericData();
        $generic->id = $_POST["id"];

        $generic->update();

        redirect();
    }

    public function delete()
    {
        Generic::delete($_GET["id"]);

        redirect();
    }

    private function genericData()
    {
        $generic = new Generic();

        $generic->generic_name = $_POST["generic_name"];
        $generic->status = $_POST["status"];

        return $generic;
    }
}