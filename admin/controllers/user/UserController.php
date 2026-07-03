<?php

class UserController
{

    function index()
    {
        $data = User::all();
        view("", compact("data"));
    }

    function create()
    {
        $roles = Role::all();
        view("", compact("roles"));
    }

    function save()
    {
        if (isset($_POST["btn_submit"])) {

            $user = new User();

            $user->role_id = $_POST["role_id"];
            $user->username = $_POST["username"];
            $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $user->name = $_POST["name"];
            $user->email = $_POST["email"];
            $user->phone = $_POST["phone"];
            $user->status = $_POST["status"];

            $user->create();

            redirect("user/index");
        }
    }

    function edit()
    {
        $data = User::find($_GET["id"]);
        $roles = Role::all();

        view("", compact("data", "roles"));
    }

    function update()
    {
        if (isset($_POST["btn_submit"])) {

            $user = new User();

            $user->id = $_POST["id"];
            $user->role_id = $_POST["role_id"];
            $user->username = $_POST["username"];

            if (!empty($_POST["password"])) {
                $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }

            $user->name = $_POST["name"];
            $user->email = $_POST["email"];
            $user->phone = $_POST["phone"];
            $user->status = $_POST["status"];

            $user->update();

            redirect("user/index");
        }
    }

    function delete()
    {
        User::delete($_GET["id"]);
        redirect("user/index");
    }

}

?>