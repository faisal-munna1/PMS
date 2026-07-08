<div class="col-lg-8 mx-auto mt-4">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">

            <h3 class="card-title">
                <i class="bi bi-pencil-square me-2"></i>
                Update Appointment
            </h3>

            <div class="card-tools">

                <a href="<?= $base_url ?>/appointment/index"
                   class="btn btn-primary btn-sm">

                    <i class="bi bi-table me-1"></i>
                    Show List

                </a>

            </div>

        </div>

        <form action="<?= $base_url ?>/appointment/update" method="post">

            <input type="hidden"
                   name="id"
                   value="<?= $data->id ?>">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Patient <span class="text-danger">*</span>
                        </label>

                        <select name="patient_id"
                                class="form-select select2"
                                required>

                            <?php foreach ($patients as $patient): ?>

                                <option value="<?= $patient->id ?>"
                                    <?= $patient->id == $data->patient_id ? "selected" : "" ?>>

                                    <?= $patient->patient_code ?>
                                    -
                                    <?= htmlspecialchars($patient->name) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Doctor <span class="text-danger">*</span>
                        </label>

                        <select name="doctor_id"
                                class="form-select select2"
                                required>

                            <?php foreach ($doctors as $doctor): ?>

                                <option value="<?= $doctor->id ?>"
                                    <?= $doctor->id == $data->doctor_id ? "selected" : "" ?>>

                                    <?= htmlspecialchars($doctor->doctor_name) ?>
                                    (<?= htmlspecialchars($doctor->specialization) ?>)

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Date <span class="text-danger">*</span>
                        </label>

                        <input type="date"
                               name="appointment_date"
                               class="form-control datepicker"
                               value="<?= $data->appointment_date ?>"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Time <span class="text-danger">*</span>
                        </label>

                        <input type="time"
                               name="appointment_time"
                               class="form-control"
                               value="<?= $data->appointment_time ?>"
                               required>

                    </div>

                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Reason for Visit
                        </label>

                        <textarea name="reason_for_visit"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter reason for visit"><?= htmlspecialchars($data->reason_for_visit) ?></textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="scheduled" <?= $data->status == "scheduled" ? "selected" : "" ?>>
                                Scheduled
                            </option>

                            <option value="checked-in" <?= $data->status == "checked-in" ? "selected" : "" ?>>
                                Checked In
                            </option>

                            <option value="in-consultation" <?= $data->status == "in-consultation" ? "selected" : "" ?>>
                                In Consultation
                            </option>

                            <option value="completed" <?= $data->status == "completed" ? "selected" : "" ?>>
                                Completed
                            </option>

                            <option value="cancel" <?= $data->status == "cancel" ? "selected" : "" ?>>
                                Cancelled
                            </option>

                        </select>

                    </div>

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
                        name="btn_submit"
                        class="btn btn-primary">

                    <i class="bi bi-check-circle me-1"></i>
                    Update Appointment

                </button>

                <a href="<?= $base_url ?>/appointment/index"
                   class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>
                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>