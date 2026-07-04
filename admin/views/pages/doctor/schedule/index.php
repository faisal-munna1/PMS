<div class="row mb-4 pb-3 border-bottom">

    <div class="col-sm-6">
        <h3 class="mb-0">Doctor Schedule List</h3>
    </div>

    <div class="col-sm-6 text-end">

        <a href="<?= $base_url ?>/schedule/create"
            class="btn btn-primary">

            <i class="fa fa-plus"></i> Add Schedule

        </a>

    </div>

</div>

<div class="table-responsive">

    <table
        class="table table-bordered table-hover table-striped align-middle"
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="10">

        <thead class="table-dark text-center">

            <tr>

                <th width="60">#</th>

                <th>Doctor</th>

                <th>Specialization</th>

                <th>Day</th>

                <th>Start Time</th>

                <th>End Time</th>

                <th width="100">Status</th>

                <th width="140">Action</th>

            </tr>

        </thead>

        <tbody>

            <?php if (!empty($data)) { ?>

                <?php foreach ($data as $key => $schedule) { ?>

                    <tr>

                        <td class="text-center">
                            <?= $key + 1 ?>
                        </td>

                        <td>
                            <?= $schedule->doctor_name ?>
                        </td>

                        <td>
                            <?= $schedule->specialization ?>
                        </td>

                        <td>
                            <?= $schedule->day_of_week ?>
                        </td>

                        <td class="text-center">
                            <?= date("h:i A", strtotime($schedule->start_time)) ?>
                        </td>

                        <td class="text-center">
                            <?= date("h:i A", strtotime($schedule->end_time)) ?>
                        </td>

                        <td class="text-center">

                            <?php if ($schedule->is_active) { ?>

                                <span class="badge bg-success">
                                    Active
                                </span>

                            <?php } else { ?>

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            <?php } ?>

                        </td>

                        <td class="text-center">

                            <div class="btn-group btn-group-sm">

                                <a href="<?= $base_url ?>/schedule/edit/<?= $schedule->id ?>"
                                    class="btn btn-primary">

                                    Edit

                                </a>

                                <a href="<?= $base_url ?>/schedule/delete/<?= $schedule->id ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">

                                    Delete

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>

                    <td colspan="8" class="text-center text-muted py-4">
                        No Schedule Found.
                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>