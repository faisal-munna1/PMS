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
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Generic::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $generic = $this->genericData();
        $generic->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($generic->id) {
            $generic->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Generic::delete($id);
        }

        redirect();
    }

    private function genericData()
    {
        $generic = new Generic();

        $generic->generic_name = filter_input(INPUT_POST, 'generic_name', FILTER_DEFAULT);
        $generic->status       = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $generic;
    }
}