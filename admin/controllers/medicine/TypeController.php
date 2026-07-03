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
        $data = Type::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $type = $this->typeData();
        $type->id = $_POST["id"];

        $type->update();

        redirect();
    }

    public function delete()
    {
        Type::delete($_GET["id"]);

        redirect();
    }

    private function typeData()
    {
        $type = new Type();

        $type->type_name = $_POST["type_name"];
        $type->status = $_POST["status"];

        return $type;
    }
}
?>