<div class="col-md-10 m-auto mt-md-5">

    <div class="card card-primary card-outline">

        <div class="card-header">

            <div class="card-title w-100">

                Update Consultation

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-primary btn-sm float-end">

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

                <div class="row">

                    <!-- Appointment -->
                    <div class="col-md-4 mb-3">

                        <label>Appointment</label>

                        <select name="appointment_id" class="form-select">

                            <?php foreach($appointments as $appointment){ ?>

                                <option value="<?= $appointment->id ?>"
                                    <?= $appointment->id==$data->appointment_id?'selected':'' ?>>

                                    <?= $appointment->serial_number ?> -
                                    <?= $appointment->patient_name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Patient -->

                    <div class="col-md-4 mb-3">

                        <label>Patient</label>

                        <select name="patient_id" class="form-select">

                            <?php foreach($patients as $patient){ ?>

                                <option value="<?= $patient->id ?>"
                                    <?= $patient->id==$data->patient_id?'selected':'' ?>>

                                    <?= $patient->patient_code ?> -
                                    <?= $patient->name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Doctor -->

                    <div class="col-md-4 mb-3">

                        <label>Doctor</label>

                        <select name="doctor_id" class="form-select">

                            <?php foreach($doctors as $doctor){ ?>

                                <option value="<?= $doctor->id ?>"
                                    <?= $doctor->id==$data->doctor_id?'selected':'' ?>>

                                    <?= $doctor->doctor_name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Chief Complaint</label>
                        <textarea name="chief_complaint" class="form-control"><?= $data->chief_complaint ?></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Clinical Notes</label>
                        <textarea name="clinical_notes" class="form-control"><?= $data->clinical_notes ?></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Medical History</label>
                        <textarea name="medical_history" class="form-control"><?= $data->medical_history ?></textarea>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Report</label>

                        <input type="file"
                            name="report"
                            class="form-control">

                        <?php if(!empty($data->report)){ ?>

                            <a href="<?= $base_url ?>/uploads/reports/<?= $data->report ?>"
                                target="_blank"
                                class="btn btn-sm btn-info mt-2">

                                View Current Report

                            </a>

                        <?php } ?>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Diagnosis</label>
                        <textarea name="diagnosis" class="form-control"><?= $data->diagnosis ?></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Treatment Plan</label>
                        <textarea name="treatment_plan" class="form-control"><?= $data->treatment_plan ?></textarea>
                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Consultation Date</label>

                        <input type="date"
                            name="consultation_date"
                            class="form-control"
                            value="<?= $data->consultation_date ?>">

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary"
                    name="btn_submit">

                    Update Consultation

                </button>

                <a href="<?= $base_url ?>/consultation/index"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>