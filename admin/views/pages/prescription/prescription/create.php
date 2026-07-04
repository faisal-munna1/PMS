<div class="col-md-8 m-auto mt-md-5">

    <div class="card card-primary card-outline">

        <div class="card-header">

            <div class="card-title w-100">

                Add Prescription

                <a href="<?= $base_url ?>/prescription/index"
                    class="btn btn-primary btn-sm float-end">

                    Show Table

                </a>

            </div>

        </div>

        <form method="post"
              action="<?= $base_url ?>/prescription/save">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label>Consultation</label>

                        <select name="consultation_id"
                                class="form-select"
                                required>

                            <option value="">Select Consultation</option>

                            <?php foreach($consultations as $consultation){ ?>

                                <option value="<?= $consultation->id ?>">

                                    <?= $consultation->consultation_date ?>
                                    -
                                    <?= $consultation->patient_name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Patient</label>

                        <select name="patient_id"
                                class="form-select"
                                required>

                            <?php foreach($patients as $patient){ ?>

                                <option value="<?= $patient->id ?>">

                                    <?= $patient->patient_code ?>
                                    -
                                    <?= $patient->name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Doctor</label>

                        <select name="doctor_id"
                                class="form-select"
                                required>

                            <?php foreach($doctors as $doctor){ ?>

                                <option value="<?= $doctor->id ?>">

                                    <?= $doctor->doctor_name ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Prescription Date</label>

                        <input type="date"
                               name="prescription_date"
                               class="form-control"
                               value="<?= date('Y-m-d') ?>">

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary"
                        name="btn_submit">

                    Save Prescription

                </button>

                <a href="<?= $base_url ?>/prescription/index"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>