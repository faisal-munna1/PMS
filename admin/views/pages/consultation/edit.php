<div class="col-lg-10 mx-auto mt-5">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">

            <h3 class="card-title fw-semibold">
                Update Consultation
            </h3>

            <div class="card-tools">

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-primary btn-sm">

                    <i class="bi bi-table me-1"></i>
                    Show Table

                </a>

            </div>

        </div>

        <form method="post"
            action="<?= $base_url ?>/consultation/update"
            enctype="multipart/form-data">

            <input type="hidden"
                name="id"
                value="<?= $data->id ?>">

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">
                            Appointment <span class="text-danger">*</span>
                        </label>

                        <select name="appointment_id"
                            class="form-select select2"
                            required>

                            <?php foreach ($appointments as $appointment): ?>

                                <option value="<?= $appointment->id ?>"
                                    <?= $appointment->id == $data->appointment_id ? "selected" : "" ?>>

                                    <?= $appointment->serial_number ?> -
                                    <?= $appointment->patient_name ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            Patient <span class="text-danger">*</span>
                        </label>

                        <select name="patient_id"
                            class="form-select select2"
                            required>

                            <?php foreach ($patients as $patient): ?>

                                <option value="<?= $patient->id ?>"
                                    <?= $patient->id == $data->patient_id ? "selected" : "" ?>>

                                    <?= $patient->patient_code ?> -
                                    <?= $patient->name ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            Doctor <span class="text-danger">*</span>
                        </label>

                        <select name="doctor_id"
                            class="form-select select2"
                            required>

                            <?php foreach ($doctors as $doctor): ?>

                                <option value="<?= $doctor->id ?>"
                                    <?= $doctor->id == $data->doctor_id ? "selected" : "" ?>>

                                    <?= $doctor->doctor_name ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Chief Complaint
                        </label>

                        <textarea name="chief_complaint"
                            class="form-control"
                            rows="2"><?= htmlspecialchars($data->chief_complaint) ?></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Clinical Notes
                        </label>

                        <textarea name="clinical_notes"
                            class="form-control"
                            rows="3"><?= htmlspecialchars($data->clinical_notes) ?></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Medical History
                        </label>

                        <textarea name="medical_history"
                            class="form-control"
                            rows="3"><?= htmlspecialchars($data->medical_history) ?></textarea>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Report
                        </label>

                        <input type="file"
                            name="report"
                            class="form-control">

                        <?php if (!empty($data->report)): ?>

                            <div class="mt-2">

                                <a href="<?= $base_url ?>/uploads/reports/<?= $data->report ?>"
                                    target="_blank"
                                    class="btn btn-info btn-sm">

                                    <i class="bi bi-file-earmark-text me-1"></i>
                                    View Current Report

                                </a>

                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Consultation Date
                        </label>

                        <input type="date"
                            name="consultation_date"
                            class="form-control"
                            value="<?= $data->consultation_date ?>">

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Diagnosis
                        </label>

                        <textarea name="diagnosis"
                            class="form-control"
                            rows="3"><?= htmlspecialchars($data->diagnosis) ?></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Treatment Plan
                        </label>

                        <textarea name="treatment_plan"
                            class="form-control"
                            rows="3"><?= htmlspecialchars($data->treatment_plan) ?></textarea>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                    name="btn_submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Update Consultation

                </button>

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>
                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>