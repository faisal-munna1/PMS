<?php

class ScheduleController
{
    public function index()
    {
        $data = Schedule::all();

        view("doctor", compact("data"));
    }

    public function create()
    {
        $doctors = Schedule::doctors();

        view("doctor", compact("doctors"));
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        if (empty($_POST["day_of_week"])) {
            redirect();
            return;
        }

        foreach ($_POST["day_of_week"] as $day) {

            $schedule = $this->scheduleData();

            $schedule->day_of_week = $day;

            $schedule->create();
        }

        redirect();
    }

    public function edit()
    {
        $data = Schedule::find($_GET["id"]);
        $doctors = Schedule::doctors();

        view("doctor", compact("data", "doctors"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $schedule = $this->scheduleData();

        $schedule->id = $_POST["id"];
        $schedule->day_of_week = $_POST["day_of_week"];

        $schedule->update();

        redirect();
    }

    public function delete()
    {
        Schedule::delete($_GET["id"]);

        redirect();
    }

    private function scheduleData()
    {
        $schedule = new Schedule();

        $schedule->doctor_id  = $_POST["doctor_id"];
        $schedule->start_time = $_POST["start_time"];
        $schedule->end_time   = $_POST["end_time"];
        $schedule->is_active  = $_POST["is_active"];

        return $schedule;
    }
}