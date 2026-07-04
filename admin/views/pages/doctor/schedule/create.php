<div class="col-md-8 m-auto mt-md-5">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <div class="card-title w-100">
                Add Doctor Schedule

                <a href="<?= $base_url ?>/schedule/index"
                    class="btn btn-primary btn-sm float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/schedule/save">

            <div class="card-body">

                <div class="row">

                    <!-- Doctor -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Doctor</label>

                        <select name="doctor_id" class="form-select" required>

                            <option value="">Select Doctor</option>

                            <?php foreach ($doctors as $doctor) { ?>

                                <option value="<?= $doctor->id ?>">
                                    <?= $doctor->doctor_name ?> (<?= $doctor->specialization ?>)
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Status</label>

                        <select name="is_active"
                            class="form-select">

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>

                        </select>

                    </div>

                    <!-- Day -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label d-block">Day of Week</label>

                        <?php
                        $days = [
                            "Saturday",
                            "Sunday",
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday"
                        ];

                        foreach ($days as $day) {
                        ?>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                    type="checkbox"
                                    name="day_of_week[]"
                                    value="<?= $day ?>">

                                <label class="form-check-label">
                                    <?= $day ?>
                                </label>

                            </div>

                        <?php } ?>

                    </div>

                    <!-- Start Time -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Start Time</label>

                        <input type="time"
                            class="form-control"
                            name="start_time"
                            required>

                    </div>

                    <!-- End Time -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">End Time</label>

                        <input type="time"
                            class="form-control"
                            name="end_time"
                            required>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                    class="btn btn-primary"
                    name="btn_submit">
                    Save Schedule
                </button>

                <a href="<?= $base_url ?>/schedule/index"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>