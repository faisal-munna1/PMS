<div class="row mb-4 pb-3 border-bottom">

    <div class="col-sm-6">
        <h3>Appointment List</h3>
    </div>

    <div class="col-sm-6 text-end">

        <a href="<?= $base_url ?>/appointment/create"
            class="btn btn-primary">

            Add Appointment

        </a>

    </div>

</div>

<div class="table-responsive">

    <table
        class="table table-bordered table-striped table-hover"
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="10">

        <thead class="table-dark">

            <tr>

                <th>#</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Serial</th>
                <th>Status</th>
                <th width="140">Action</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($data as $key=>$appointment){ ?>

                <tr>

                    <td><?= $key+1 ?></td>

                    <td>
                        <?= $appointment->patient_code ?>
                        <br>
                        <small><?= $appointment->patient_name ?></small>
                    </td>

                    <td><?= $appointment->doctor_name ?></td>

                    <td>
                        <?= date("d M, Y",strtotime($appointment->appointment_date)) ?>
                    </td>

                    <td>
                        <?= date("h:i A",strtotime($appointment->appointment_time)) ?>
                    </td>

                    <td>
                        <?= $appointment->serial_number ?>
                    </td>

                    <td>

                        <?php

                        $badge = [
                            "scheduled"=>"warning",
                            "checked-in"=>"info",
                            "in-consultation"=>"primary",
                            "completed"=>"success",
                            "cancel"=>"danger"
                        ];

                        ?>

                        <span class="badge bg-<?= $badge[$appointment->status] ?>">
                            <?= ucwords(str_replace("-"," ",$appointment->status)) ?>
                        </span>

                    </td>

                    <td>

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/appointment/edit/<?= $appointment->id ?>"
                                class="btn btn-primary">

                                Edit

                            </a>

                            <a href="<?= $base_url ?>/appointment/delete/<?= $appointment->id ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">

                                Delete

                            </a>

                        </div>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>