<!-- ================= Dashboard Summary ================= -->

<div class="row g-3 mb-4">


    <div class="col-lg-3 col-md-6">

        <div class="small-box text-bg-primary shadow-sm">

            <div class="inner">

                <h3>
                    <?= $data['total_patients'] ?? 0 ?>
                </h3>

                <p>Total Patients</p>

            </div>

            <i class="small-box-icon fas fa-user-injured"></i>

            <a href="<?= $base_url ?>/patient/index"
               class="small-box-footer">

                View Patients
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>



    <div class="col-lg-3 col-md-6">

        <div class="small-box text-bg-success shadow-sm">

            <div class="inner">

                <h3>
                    <?= $data['today_appointment'] ?? 0 ?>
                </h3>

                <p>Today's Appointment</p>

            </div>

            <i class="small-box-icon fas fa-calendar-check"></i>

            <a href="<?= $base_url ?>/appointment/index"
               class="small-box-footer">

                Appointment List
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>



    <div class="col-lg-3 col-md-6">

        <div class="small-box text-bg-warning shadow-sm">

            <div class="inner">

                <h3>
                    <?= $data['today_prescription'] ?? 0 ?>
                </h3>

                <p>Today's Prescription</p>

            </div>


            <i class="small-box-icon fas fa-file-medical"></i>


            <a href="<?= $base_url ?>/prescription/index"
               class="small-box-footer">

                Prescription
                <i class="bi bi-arrow-right"></i>

            </a>


        </div>

    </div>



    <div class="col-lg-3 col-md-6">


        <div class="small-box text-bg-danger shadow-sm">


            <div class="inner">

                <h3>
                    <?= $data['today_queue'] ?? 0 ?>
                </h3>


                <p>
                    Today's Patient Queue
                </p>


            </div>


            <i class="small-box-icon fas fa-users"></i>


            <a href="<?= $base_url ?>/appointment/index"
               class="small-box-footer">


                View Queue

                <i class="bi bi-arrow-right"></i>


            </a>


        </div>


    </div>


</div>