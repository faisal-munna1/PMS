<div class="col-md-8 m-auto mt-5">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <div class="card-title w-100">
                Update Appointment

                <a href="<?= $base_url ?>/appointment/index"
                    class="btn btn-primary btn-sm float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/appointment/update">

            <input type="hidden"
                name="id"
                value="<?= $data->id ?>">

            <div class="card-body">

                <div class="row">

                    <!-- Patient -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Patient</label>

                        <select name="patient_id"
                            class="form-select"
                            required>

                            <?php foreach ($patients as $patient) { ?>

                                <option value="<?= $patient->id ?>"
                                    <?= $patient->id == $data->patient_id ? "selected" : "" ?>>

                                    <?= $patient->patient_code ?> - <?= $patient->name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Doctor -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Doctor</label>

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

                    <!-- Appointment Date -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Date
                        </label>

                        <input type="date"
                            name="appointment_date"
                            class="form-control"
                            value="<?= $data->appointment_date ?>"
                            required>

                    </div>

                    <!-- Appointment Time -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Time
                        </label>

                        <input type="time"
                            name="appointment_time"
                            class="form-control"
                            value="<?= $data->appointment_time ?>"
                            required>

                    </div>

                    <!-- Reason -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Reason for Visit
                        </label>

                        <textarea
                            name="reason_for_visit"
                            rows="3"
                            class="form-control"><?= $data->reason_for_visit ?></textarea>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                            class="form-select">

                            <option value="scheduled"
                                <?= $data->status == "scheduled" ? "selected" : "" ?>>
                                Scheduled
                            </option>

                            <option value="checked-in"
                                <?= $data->status == "checked-in" ? "selected" : "" ?>>
                                Checked In
                            </option>

                            <option value="in-consultation"
                                <?= $data->status == "in-consultation" ? "selected" : "" ?>>
                                In Consultation
                            </option>

                            <option value="completed"
                                <?= $data->status == "completed" ? "selected" : "" ?>>
                                Completed
                            </option>

                            <option value="cancel"
                                <?= $data->status == "cancel" ? "selected" : "" ?>>
                                Cancel
                            </option>

                        </select>

                    </div>

                    <!-- Serial Number -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Serial Number
                        </label>

                        <input type="text"
                            class="form-control"
                            value="<?= $data->serial_number ?>"
                            readonly>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                    class="btn btn-primary"
                    name="btn_submit">
                    Update Appointment
                </button>

                <a href="<?= $base_url ?>/appointment/index"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>