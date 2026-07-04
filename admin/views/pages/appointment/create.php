<div class="col-md-8 m-auto mt-5">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <div class="card-title w-100">
                Add Appointment

                <a href="<?= $base_url ?>/appointment/index"
                    class="btn btn-primary btn-sm float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/appointment/save">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Patient</label>

                        <select name="patient_id" class="form-select" required>

                            <option value="">Select Patient</option>

                            <?php foreach ($patients as $patient) { ?>

                                <option value="<?= $patient->id ?>">
                                    <?= $patient->patient_code ?> - <?= $patient->name ?>
                                </option>

                            <?php } ?>

                        </select>
                    </div>

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

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Appointment Date</label>

                        <input
                            type="date"
                            name="appointment_date"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Appointment Time</label>

                        <input
                            type="time"
                            name="appointment_time"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Reason for Visit</label>

                        <textarea
                            name="reason_for_visit"
                            class="form-control"
                            rows="3"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="scheduled">Scheduled</option>
                            <option value="checked-in">Checked In</option>
                            <option value="in-consultation">In Consultation</option>
                            <option value="completed">Completed</option>
                            <option value="cancel">Cancel</option>

                        </select>
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button
                    type="submit"
                    name="btn_submit"
                    class="btn btn-primary">
                    Save Appointment
                </button>

                <a href="<?= $base_url ?>/appointment/index"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>