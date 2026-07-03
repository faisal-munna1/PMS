<?php

class DurationController
{
    public function index()
    {
        $data = Duration::all();

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

        $duration = $this->durationData();

        $duration->create();

        redirect();
    }

    public function edit()
    {
        $data = Duration::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $duration = $this->durationData();
        $duration->id = $_POST["id"];

        $duration->update();

        redirect();
    }

    public function delete()
    {
        Duration::delete($_GET["id"]);

        redirect();
    }

    private function durationData()
    {
        $duration = new Duration();

        $duration->duration_name = $_POST["duration_name"];

        return $duration;
    }
}