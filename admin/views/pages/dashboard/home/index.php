<!-- ===========================================
     Dashboard Header
============================================ -->

<section class="content-header">
  <div class="container-fluid">

    <div class="row mb-3">

      <div class="col-md-6">
        <h1>
          <i class="fa fa-hospital-o"></i>
          Sirajees Hospital Dashboard
        </h1>
      </div>

      <div class="col-md-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i> Home
            </a>
          </li>

          <li class="breadcrumb-item active">
            Dashboard
          </li>

        </ol>

      </div>

    </div>

  </div>
</section>



<section class="content">

  <div class="container-fluid">

    <div class="row">


      <!-- Total Patients -->

      <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="small-box bg-info">

          <div class="inner">

            <h3>1250</h3>

            <p>Total Patients</p>

          </div>

          <div class="icon">

            <i class="fa fa-wheelchair"></i>

          </div>

          <a href="patient/index" class="small-box-footer">

            View Details

            <i class="fa fa-arrow-circle-right"></i>

          </a>

        </div>

      </div>




      <!-- Today's Appointment -->

      <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="small-box bg-success">

          <div class="inner">

            <h3>35</h3>

            <p>Today's Appointments</p>

          </div>

          <div class="icon">

            <i class="fa fa-calendar"></i>

          </div>

          <a href="appointment/index" class="small-box-footer">

            View Details

            <i class="fa fa-arrow-circle-right"></i>

          </a>

        </div>

      </div>




      <!-- Consultation -->

      <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="small-box bg-warning">

          <div class="inner">

            <h3>18</h3>

            <p>Today's Consultation</p>

          </div>

          <div class="icon">

            <i class="fa fa-stethoscope"></i>

          </div>

          <a href="consultation/index" class="small-box-footer">

            View Details

            <i class="fa fa-arrow-circle-right"></i>

          </a>

        </div>

      </div>




      <!-- Doctors -->

      <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="small-box bg-danger">

          <div class="inner">

            <h3>12</h3>

            <p>Total Doctors</p>

          </div>

          <div class="icon">

            <i class="fa fa-user-md"></i>

          </div>

          <a href="doctor/index" class="small-box-footer">

            View Details

            <i class="fa fa-arrow-circle-right"></i>

          </a>

        </div>

      </div>


    </div>

    <!-- ===========================================
        Today's Appointment & Doctor Schedule
=========================================== -->

<div class="row">

    <!-- Today's Appointments -->

    <section class="col-lg-7">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-calendar"></i>

                    Today's Appointments

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-bordered table-hover">

                    <thead class="bg-light">

                        <tr>

                            <th>#</th>

                            <th>Patient</th>

                            <th>Doctor</th>

                            <th>Time</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td>Rahim</td>

                            <td>Dr. Hasan</td>

                            <td>09:30 AM</td>

                            <td>
                                <span class="badge badge-success">
                                    Confirmed
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td>Karim</td>

                            <td>Dr. Ahmed</td>

                            <td>10:00 AM</td>

                            <td>
                                <span class="badge badge-warning">
                                    Waiting
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td>Sabbir</td>

                            <td>Dr. Hasan</td>

                            <td>11:30 AM</td>

                            <td>
                                <span class="badge badge-info">
                                    Checked In
                                </span>
                            </td>

                        </tr>

                        <tr>

                            <td>4</td>

                            <td>Nazmul</td>

                            <td>Dr. Karim</td>

                            <td>01:00 PM</td>

                            <td>
                                <span class="badge badge-danger">
                                    Pending
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>



    <!-- Doctor Schedule -->

    <section class="col-lg-5">

        <div class="card card-success">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-user-md"></i>

                    Doctor Schedule

                </h3>

            </div>

            <div class="card-body p-0">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th>Doctor</th>

                            <th>Time</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>Dr. Hasan</td>

                            <td>09 AM - 01 PM</td>

                        </tr>

                        <tr>

                            <td>Dr. Ahmed</td>

                            <td>10 AM - 04 PM</td>

                        </tr>

                        <tr>

                            <td>Dr. Karim</td>

                            <td>02 PM - 08 PM</td>

                        </tr>

                        <tr>

                            <td>Dr. Islam</td>

                            <td>04 PM - 09 PM</td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!-- ===========================================
        Recent Patients & Recent Prescriptions
=========================================== -->

<div class="row">

    <!-- Recent Patients -->

    <section class="col-lg-6">

        <div class="card card-info">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-wheelchair"></i>

                    Recently Registered Patients

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-bordered table-hover">

                    <thead class="bg-light">

                        <tr>

                            <th>ID</th>

                            <th>Patient Name</th>

                            <th>Gender</th>

                            <th>Age</th>

                            <th>Phone</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>P001</td>

                            <td>Rahim Uddin</td>

                            <td>Male</td>

                            <td>35</td>

                            <td>017XXXXXXXX</td>

                        </tr>

                        <tr>

                            <td>P002</td>

                            <td>Karim Ahmed</td>

                            <td>Male</td>

                            <td>42</td>

                            <td>018XXXXXXXX</td>

                        </tr>

                        <tr>

                            <td>P003</td>

                            <td>Nusrat Jahan</td>

                            <td>Female</td>

                            <td>29</td>

                            <td>019XXXXXXXX</td>

                        </tr>

                        <tr>

                            <td>P004</td>

                            <td>Farzana Akter</td>

                            <td>Female</td>

                            <td>31</td>

                            <td>016XXXXXXXX</td>

                        </tr>

                        <tr>

                            <td>P005</td>

                            <td>Shakil Hasan</td>

                            <td>Male</td>

                            <td>25</td>

                            <td>015XXXXXXXX</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="card-footer text-right">

                <a href="patient/index" class="btn btn-info btn-sm">

                    <i class="fa fa-eye"></i>

                    View All Patients

                </a>

            </div>

        </div>

    </section>



    <!-- Recent Prescriptions -->

    <section class="col-lg-6">

        <div class="card card-warning">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-file-text-o"></i>

                    Recent Prescriptions

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-bordered table-hover">

                    <thead class="bg-light">

                        <tr>

                            <th>Rx No</th>

                            <th>Patient</th>

                            <th>Doctor</th>

                            <th>Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>RX-1001</td>

                            <td>Rahim</td>

                            <td>Dr. Hasan</td>

                            <td>05-Jul-2026</td>

                        </tr>

                        <tr>

                            <td>RX-1002</td>

                            <td>Karim</td>

                            <td>Dr. Ahmed</td>

                            <td>05-Jul-2026</td>

                        </tr>

                        <tr>

                            <td>RX-1003</td>

                            <td>Nusrat</td>

                            <td>Dr. Karim</td>

                            <td>05-Jul-2026</td>

                        </tr>

                        <tr>

                            <td>RX-1004</td>

                            <td>Farzana</td>

                            <td>Dr. Hasan</td>

                            <td>05-Jul-2026</td>

                        </tr>

                        <tr>

                            <td>RX-1005</td>

                            <td>Shakil</td>

                            <td>Dr. Islam</td>

                            <td>05-Jul-2026</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="card-footer text-right">

                <a href="prescription/index" class="btn btn-warning btn-sm">

                    <i class="fa fa-eye"></i>

                    View All Prescriptions

                </a>

            </div>

        </div>

    </section>

</div>

<!-- ===========================================
        Medicine Statistics & Quick Actions
=========================================== -->

<div class="row">

    <!-- Medicine Statistics -->

    <section class="col-lg-6">

        <div class="card card-success">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-medkit"></i>

                    Medicine Statistics

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-6">

                        <div class="info-box">

                            <span class="info-box-icon bg-primary">
                                <i class="fa fa-medkit"></i>
                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">
                                    Total Medicines
                                </span>

                                <span class="info-box-number">
                                    520
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="col-6">

                        <div class="info-box">

                            <span class="info-box-icon bg-info">
                                <i class="fa fa-flask"></i>
                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">
                                    Generics
                                </span>

                                <span class="info-box-number">
                                    145
                                </span>

                            </div>

                        </div>

                    </div>



                    <div class="col-6">

                        <div class="info-box">

                            <span class="info-box-icon bg-warning">
                                <i class="fa fa-industry"></i>
                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">
                                    Manufacturers
                                </span>

                                <span class="info-box-number">
                                    38
                                </span>

                            </div>

                        </div>

                    </div>



                    <div class="col-6">

                        <div class="info-box">

                            <span class="info-box-icon bg-danger">
                                <i class="fa fa-tags"></i>
                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">
                                    Medicine Types
                                </span>

                                <span class="info-box-number">
                                    24
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- Quick Actions -->

    <section class="col-lg-6">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-bolt"></i>

                    Quick Actions

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <a href="patient/create"
                           class="btn btn-info btn-block btn-lg">

                            <i class="fa fa-wheelchair"></i>

                            <br>

                            New Patient

                        </a>

                    </div>



                    <div class="col-md-6 mb-3">

                        <a href="appointment/create"
                           class="btn btn-success btn-block btn-lg">

                            <i class="fa fa-calendar"></i>

                            <br>

                            New Appointment

                        </a>

                    </div>



                    <div class="col-md-6 mb-3">

                        <a href="consultation/create"
                           class="btn btn-warning btn-block btn-lg">

                            <i class="fa fa-stethoscope"></i>

                            <br>

                            Consultation

                        </a>

                    </div>



                    <div class="col-md-6 mb-3">

                        <a href="prescription/create"
                           class="btn btn-danger btn-block btn-lg">

                            <i class="fa fa-file-text-o"></i>

                            <br>

                            Prescription

                        </a>

                    </div>



                    <div class="col-md-6">

                        <a href="medicine/index"
                           class="btn btn-secondary btn-block">

                            <i class="fa fa-medkit"></i>

                            Medicine List

                        </a>

                    </div>



                    <div class="col-md-6">

                        <a href="doctor/index"
                           class="btn btn-dark btn-block">

                            <i class="fa fa-user-md"></i>

                            Doctors

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<!-- ===========================================
        Patient Statistics & Recent Activities
=========================================== -->

<div class="row">

    <!-- Patient Statistics -->

    <section class="col-lg-8">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-line-chart"></i>

                    Monthly Patient Statistics

                </h3>

            </div>

            <div class="card-body">

                <canvas id="patientChart" height="120"></canvas>

            </div>

        </div>

    </section>



    <!-- Recent Activities -->

    <section class="col-lg-4">

        <div class="card card-secondary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fa fa-history"></i>

                    Recent Activities

                </h3>

            </div>

            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item">

                        <i class="fa fa-user-plus text-success"></i>

                        New Patient Registered

                        <span class="float-right text-muted">

                            10 mins ago

                        </span>

                    </li>

                    <li class="list-group-item">

                        <i class="fa fa-calendar text-primary"></i>

                        Appointment Confirmed

                        <span class="float-right text-muted">

                            20 mins ago

                        </span>

                    </li>

                    <li class="list-group-item">

                        <i class="fa fa-stethoscope text-warning"></i>

                        Consultation Completed

                        <span class="float-right text-muted">

                            45 mins ago

                        </span>

                    </li>

                    <li class="list-group-item">

                        <i class="fa fa-file-text-o text-danger"></i>

                        Prescription Created

                        <span class="float-right text-muted">

                            1 hour ago

                        </span>

                    </li>

                    <li class="list-group-item">

                        <i class="fa fa-medkit text-info"></i>

                        Medicine Added

                        <span class="float-right text-muted">

                            Today

                        </span>

                    </li>

                </ul>

            </div>

        </div>

    </section>

</div>