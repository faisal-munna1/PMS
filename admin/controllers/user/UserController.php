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

            // user Image
            if (!empty($_FILES["image"]["name"])) {
                $user->image = File::upload($_FILES["image"], "uploads/users", $user->name);
            }

            $userId =  $user->create();


            if ($_POST["role_id"] == 3) {
                $doctor = new Doctor();
                $doctor->user_id = $userId;
                $doctor->name = $_POST["name"];
                $doctor->email = $_POST["email"];
                $doctor->phone = $_POST["phone"];
                $doctor->status = $_POST["status"];
                $doctor->create();
            }
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
            $oldUser = User::find($user->id);
            // user Image
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

            //Doctor update

            $found_doctor = Doctor::findByUserId($_POST["id"]);
            $user_id = $_POST["id"];
            if ($found_doctor->user_id == $user_id) {
                $doctor = new Doctor();
                $doctor->user_id =  $_POST["id"];
                $doctor->id = $found_doctor->id;
                $doctor->name = $_POST["name"];
                $doctor->email = $_POST["email"];
                $doctor->phone = $_POST["phone"];
                $doctor->status = $_POST["status"];
                // if (!empty($_FILES["image"]["name"])) {

                //     if (!empty($found_doctor->image)) {
                //         File::delete($found_doctor->image, "uploads/doctors");
                //     }

                //     $doctor->image = File::upload(
                //         $_FILES["image"],
                //         "uploads/doctors",
                //         $user->name
                //     );
                // } else {
                //     $doctor->image = $found_doctor->image;
                // }
                   
                $doctor->update();
            }
            redirect("user/index");
        }
    }

    function delete()
    {
        User::delete($_GET["id"]);
        redirect("user/index");
    }
}
