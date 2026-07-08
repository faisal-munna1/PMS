<?php

class UserController
{
    public function index()
    {
        $data = User::all();
        view("", compact("data"));
    }

    public function create()
    {
        $roles = Role::all();
        view("", compact("roles"));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $user = new User();

        $user->role_id  = $_POST["role_id"];
        $user->username = $_POST["username"];
        $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user->name     = $_POST["name"];
        $user->email    = $_POST["email"];
        $user->phone    = $_POST["phone"];
        $user->status   = $_POST["status"];

        if (!empty($_FILES["image"]["name"])) {
            $user->image = File::upload(
                $_FILES["image"],
                "uploads/users",
                $user->name
            );
        }

        $userId = $user->create();

        // Create Doctor
        if ($user->role_id == 3) {
            $doctor = new Doctor();
            $doctor->user_id = $userId;
            $doctor->name = $user->name;
            $doctor->email = $user->email;
            $doctor->phone = $user->phone;
            $doctor->image = $user->image;
            $doctor->status = $user->status;

            $doctor->create();
        }

        redirect("user/index");
    }

    public function edit()
    {
        $data = User::find($_GET["id"]);
        $roles = Role::all();
        view("", compact("data", "roles"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $user = new User();

        $user->id       = $_POST["id"];
        $user->role_id  = $_POST["role_id"];
        $user->username = $_POST["username"];
        $user->name     = $_POST["name"];
        $user->email    = $_POST["email"];
        $user->phone    = $_POST["phone"];
        $user->status   = $_POST["status"];

        if (!empty($_POST["password"])) {
            $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        $oldUser = User::find($user->id);
        if (!empty($_FILES["image"]["name"])) {
            if (!empty($oldUser->image)) {
                File::delete($oldUser->image, "uploads/users");
            }

            $user->image = File::upload(
                $_FILES["image"],
                "uploads/users",
                $user->name
            );

        } else {

            $user->image = $oldUser->image;
        }

        $user->update();

        // Update Doctor Information
        $doctor = Doctor::findByUserId($user->id);
        if ($doctor) {
            $doctor = new Doctor();
            $doctor->name   = $user->name;
            $doctor->email  = $user->email;
            $doctor->phone  = $user->phone;
            $doctor->image  = $user->image;
            $doctor->status = $user->status;
            $doctor->updateUserInfo();
        }

        redirect("user/index");
    }

    public function delete()
    {
        User::delete($_GET["id"]);
        redirect("user/index");
    }
}