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

        $days = $_POST["day_of_week"] ?? [];
        if (empty($days) || !is_array($days)) {
            redirect();
            return;
        }

        foreach ($days as $day) {
            $schedule = $this->scheduleData();
            $schedule->day_of_week = filter_var($day, FILTER_DEFAULT);
            $schedule->create();
        }

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Schedule::find($id);
        $doctors = Schedule::doctors();

        view("doctor", compact("data", "doctors"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $schedule = $this->scheduleData();
        $schedule->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $schedule->day_of_week = filter_input(INPUT_POST, 'day_of_week', FILTER_DEFAULT);

        if ($schedule->id) {
            $schedule->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Schedule::delete($id);
        }

        redirect();
    }

    private function scheduleData()
    {
        $schedule = new Schedule();

        $schedule->doctor_id  = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
        $schedule->start_time = filter_input(INPUT_POST, 'start_time', FILTER_DEFAULT);
        $schedule->end_time   = filter_input(INPUT_POST, 'end_time', FILTER_DEFAULT);
        $schedule->is_active  = filter_input(INPUT_POST, 'is_active', FILTER_VALIDATE_INT);

        return $schedule;
    }
}