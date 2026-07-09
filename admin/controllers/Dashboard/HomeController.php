<?php

class HomeController
{

    public function __construct()
    {

    }


    public function index()
    {

        $dashboard = new DashboardModel();


        $data = [

            "total_patients" =>
                $dashboard->totalPatients(),


            "today_appointment" =>
                $dashboard->todayAppointment(),


            "today_prescription" =>
                $dashboard->todayPrescription(),


            "today_queue" =>
                $dashboard->todayPatientQueue(),


            "recent_patients" =>
                $dashboard->recentPatients(),


            "followups" =>
                $dashboard->pendingFollowup()

        ];



        view(
            "dashboard",
            compact("data")
        );

    }



    public function manager()
    {
        $this->index();
    }



    public function test()
    {
        $this->index();
    }


}

?>