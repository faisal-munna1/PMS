<div class="row mb-4 pb-3 border-bottom">

    <div class="col-md-6">
        <h3>Consultation List</h3>
    </div>

    <div class="col-md-6 text-end">

        <a href="<?= $base_url ?>/consultation/create"
            class="btn btn-primary">

            Add Consultation

        </a>

    </div>

</div>

<div class="table-responsive">

    <table class="table table-bordered table-striped"
        data-toggle="table"
        data-search="true"
        data-pagination="true">

        <thead class="table-dark text-center">

            <tr>

                <th>#</th>
                <th>Date</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Chief Complaint</th>
                <th>Diagnosis</th>
                <th>Report</th>
                <th width="140">Action</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($data as $key => $consultation) { ?>

                <tr>

                    <td><?= $key + 1 ?></td>

                    <td><?= $consultation->consultation_date ?></td>

                    <td><?= $consultation->patient_name ?></td>

                    <td><?= $consultation->doctor_name ?></td>

                    <td><?= substr($consultation->chief_complaint, 0, 40) ?></td>

                    <td><?= substr($consultation->diagnosis, 0, 40) ?></td>

                    <td class="text-center">

                        <?php if (!empty($consultation->report)) { ?>

                            <a href="<?= $base_url ?>/uploads/reports/<?= $consultation->report ?>"
                                target="_blank"
                                class="btn btn-success btn-sm">

                                View

                            </a>

                        <?php } else { ?>

                            <span class="badge bg-secondary">
                                No File
                            </span>

                        <?php } ?>

                    </td>

                    <td class="text-center">

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/consultation/edit/<?= $consultation->id ?>"
                                class="btn btn-primary">

                                Edit

                            </a>
                            <a href="<?= $base_url ?>/prescription/prescription/<?= $consultation->id ?>"
                                class="btn btn-primary">
                                prescription

                            </a>

                            <!-- <a href="<?= $base_url ?>/consultation/delete/<?= $consultation->id ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">

                                Delete

                            </a> -->

                        </div>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>