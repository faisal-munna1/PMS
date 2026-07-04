<div class="row mb-4 pb-3 border-bottom">

    <div class="col-md-6">

        <h3>Prescription List</h3>

    </div>

    <div class="col-md-6 text-end">

        <a href="<?= $base_url ?>/prescription/create"
           class="btn btn-primary">

            Add Prescription

        </a>

    </div>

</div>

<div class="table-responsive">

    <table class="table table-bordered table-striped"
           data-toggle="table"
           data-search="true"
           data-pagination="true">

        <thead class="table-dark">

            <tr>

                <th>#</th>
                <th>Date</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Consultation</th>
                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($data as $key=>$row){ ?>

                <tr>

                    <td><?= $key+1 ?></td>

                    <td><?= $row->prescription_date ?></td>

                    <td><?= $row->patient_name ?></td>

                    <td><?= $row->doctor_name ?></td>

                    <td>#<?= $row->consultation_id ?></td>

                    <td>

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/prescription/edit/<?= $row->id ?>"
                               class="btn btn-primary">

                                Edit

                            </a>

                            <a href="<?= $base_url ?>/prescription/delete/<?= $row->id ?>"
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure?')">

                                Delete

                            </a>

                            <a href="<?= $base_url ?>/prescription/print/<?= $row->id ?>"
                               target="_blank"
                               class="btn btn-success">

                                Print

                            </a>

                        </div>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>