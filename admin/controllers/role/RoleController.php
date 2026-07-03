
<?php

class RoleController{
    
    function index()
    {
        $data = Role::all();
        view("", compact("data"));
    }

    function create()
    {
        view("",);
    }

    function save()
    {

        if (isset($_POST["btn_submit"])) {
            $role = new Role();
            $role->name = $_POST["name"];
            $role->description = $_POST["description"];
            $role->create();
            redirect();
        }
    }

    function delete()
    {
        $id = $_GET["id"];
        Role::delete($id);
        redirect();
    }

    function edit()
    {
        $data = Role::find($_GET["id"]);
        view("", compact("data"));
    }

    function update()
    {
        if (isset($_POST["btn_submit"])) {
            $role = new Role();
            $role->id = $_POST["id"];
            $role->name = $_POST["name"];
            $role->description = $_POST["description"];
            $role->update();
            redirect();
        }
    }
}

?>