<div class="col-lg-10 mx-auto mt-5">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">

            <h3 class="card-title fw-semibold">
                Add Consultation
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
            action="<?= $base_url ?>/consultation/save"
            enctype="multipart/form-data">

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">
                            Appointment <span class="text-danger">*</span>
                        </label>

                        <select name="appointment_id"
                            class="form-select select2"
                            required>

                            <option value="">Select Appointment</option>

                            <?php foreach ($appointments as $appointment): ?>

                                <option value="<?= $appointment->id ?>">
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

                            <option value="">Select Patient</option>

                            <?php foreach ($patients as $patient): ?>

                                <option value="<?= $patient->id ?>">
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

                            <option value="">Select Doctor</option>

                            <?php foreach ($doctors as $doctor): ?>

                                <option value="<?= $doctor->id ?>">
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
                            rows="2"></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Clinical Notes
                        </label>

                        <textarea name="clinical_notes"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Medical History
                        </label>

                        <textarea name="medical_history"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Report
                        </label>

                        <input type="file"
                            name="report"
                            class="form-control">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Consultation Date
                        </label>

                        <input type="date"
                            name="consultation_date"
                            class="form-control"
                            value="<?= date('Y-m-d') ?>">

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Diagnosis
                        </label>

                        <textarea name="diagnosis"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                    <div class="col-12">

                        <label class="form-label">
                            Treatment Plan
                        </label>

                        <textarea name="treatment_plan"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                    name="btn_submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Save Consultation

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