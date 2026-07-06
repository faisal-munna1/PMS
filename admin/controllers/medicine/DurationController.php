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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Duration::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $duration = $this->durationData();
        $duration->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($duration->id) {
            $duration->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Duration::delete($id);
        }

        redirect();
    }

    private function durationData()
    {
        $duration = new Duration();

        $duration->duration_name = filter_input(INPUT_POST, 'duration_name', FILTER_DEFAULT);

        return $duration;
    }
}