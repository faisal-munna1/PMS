<div class="col-md-8 m-auto mt-md-5">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <div class="card-title w-100">
                Update Doctor Schedule

                <a href="<?= $base_url ?>/schedule/index"
                    class="btn btn-primary btn-sm float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/schedule/update">

            <!-- Required -->
            <input type="hidden"
                name="id"
                value="<?= $data->id ?>">

            <div class="card-body">

                <div class="row">

                    <!-- Doctor -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Doctor <span class="text-danger">*</span>
                        </label>

                        <select name="doctor_id"
                            class="form-select"
                            required>

                            <?php foreach ($doctors as $doctor) { ?>

                                <option value="<?= $doctor->id ?>"
                                    <?= $doctor->id == $data->doctor_id ? "selected" : "" ?>>

                                    <?= $doctor->doctor_name ?>
                                    (<?= $doctor->specialization ?>)

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Day -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Day of Week
                        </label>

                        <select name="day_of_week"
                            class="form-select"
                            required>

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

                                <option value="<?= $day ?>"
                                    <?= $day == $data->day_of_week ? "selected" : "" ?>>

                                    <?= $day ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Start Time -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Start Time
                        </label>

                        <input type="time"
                            name="start_time"
                            class="form-control"
                            value="<?= $data->start_time ?>"
                            required>

                    </div>

                    <!-- End Time -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            End Time
                        </label>

                        <input type="time"
                            name="end_time"
                            class="form-control"
                            value="<?= $data->end_time ?>"
                            required>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="is_active"
                            class="form-select">

                            <option value="1"
                                <?= $data->is_active == 1 ? "selected" : "" ?>>

                                Active

                            </option>

                            <option value="0"
                                <?= $data->is_active == 0 ? "selected" : "" ?>>

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                    class="btn btn-primary"
                    name="btn_submit">

                    Update Schedule

                </button>

                <a href="<?= $base_url ?>/schedule/index"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>