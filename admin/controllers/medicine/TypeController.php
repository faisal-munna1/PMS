<?php

class TypeController
{
    public function index()
    {
        $data = Type::all();

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

        $type = $this->typeData();
        $type->create();

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Type::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $type = $this->typeData();
        $type->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($type->id) {
            $type->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Type::delete($id);
        }

        redirect();
    }

    private function typeData()
    {
        $type = new Type();

        $type->type_name = filter_input(INPUT_POST, 'type_name', FILTER_DEFAULT);
        $type->status    = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);

        return $type;
    }
}