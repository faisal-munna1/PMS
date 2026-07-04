<div class="col-md-10 m-auto mt-md-5">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <div class="card-title w-100">
                Add Consultation

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-primary btn-sm float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post"
            action="<?= $base_url ?>/consultation/save"
            enctype="multipart/form-data">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Appointment</label>

                        <select name="appointment_id" class="form-select" required>

                            <option value="">Select Appointment</option>

                            <?php foreach($appointments as $appointment){ ?>

                                <option value="<?= $appointment->id ?>">
                                    <?= $appointment->serial_number ?> -
                                    <?= $appointment->patient_name ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Patient</label>

                        <select name="patient_id" class="form-select" required>

                            <?php foreach($patients as $patient){ ?>

                                <option value="<?= $patient->id ?>">
                                    <?= $patient->patient_code ?> -
                                    <?= $patient->name ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Doctor</label>

                        <select name="doctor_id" class="form-select" required>

                            <?php foreach($doctors as $doctor){ ?>

                                <option value="<?= $doctor->id ?>">
                                    <?= $doctor->doctor_name ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Chief Complaint</label>
                        <textarea name="chief_complaint" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Clinical Notes</label>
                        <textarea name="clinical_notes" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Medical History</label>
                        <textarea name="medical_history" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Report</label>
                        <input type="file"
                            name="report"
                            class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Diagnosis</label>
                        <textarea name="diagnosis" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Treatment Plan</label>
                        <textarea name="treatment_plan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Consultation Date</label>

                        <input type="date"
                            name="consultation_date"
                            class="form-control"
                            value="<?= date('Y-m-d') ?>">
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary"
                    name="btn_submit">
                    Save Consultation
                </button>

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>