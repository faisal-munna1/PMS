<div class="col-lg-10 mx-auto mt-5">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">
            <h3 class="card-title fw-semibold">
                Update Consultation
            </h3>
            <div class="card-tools">
                <a href="<?= $base_url ?>/consultation/index" class="btn btn-primary btn-sm">
                    <i class="bi bi-table me-1"></i>
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/consultation/update" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $data->id ?>">

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">
                            Appointment <span class="text-danger">*</span>
                        </label>
                        <select name="appointment_id" class="form-select select2" required>
                            <?php foreach ($appointments as $appointment): ?>
                                <option value="<?= $appointment->id ?>"
                                    <?= $appointment->id == $data->appointment_id ? "selected" : "" ?>>
                                    <?= $appointment->serial_number ?> - <?= $appointment->patient_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Patient <span class="text-danger">*</span>
                        </label>
                        <select name="patient_id" class="form-select select2" required>
                            <?php foreach ($patients as $patient): ?>
                                <option value="<?= $patient->id ?>"
                                    <?= $patient->id == $data->patient_id ? "selected" : "" ?>>
                                    <?= $patient->patient_code ?> - <?= $patient->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Doctor <span class="text-danger">*</span>
                        </label>
                        <select name="doctor_id" class="form-select select2" required>
                            <?php foreach ($doctors as $doctor): ?>
                                <option value="<?= $doctor->id ?>"
                                    <?= $doctor->id == $data->doctor_id ? "selected" : "" ?>>
                                    <?= $doctor->doctor_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Consultation Date</label>
                        <input type="date" name="consultation_date" class="form-control" value="<?= $data->consultation_date ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Follow-up Date</label>
                        <input type="date" name="followup_date" class="form-control" value="<?= $data->followup_date ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="pending" <?= $data->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="completed" <?= $data->status == 'completed' ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <hr class="my-2 text-muted">
                    <h5 class="mb-0 text-primary">Patient Vitals</h5>

                    <div class="col-md-3">
                        <label class="form-label">Height (cm)</label>
                        <input type="number" step="0.01" name="height" class="form-control" placeholder="0.00" value="<?= htmlspecialchars($data->height) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" step="0.01" name="weight" class="form-control" placeholder="0.00" value="<?= htmlspecialchars($data->weight) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">BMI</label>
                        <input type="number" step="0.01" name="bmi" class="form-control" placeholder="0.00" value="<?= htmlspecialchars($data->bmi) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Blood Pressure</label>
                        <input type="text" name="blood_pressure" class="form-control" placeholder="120/80" value="<?= htmlspecialchars($data->blood_pressure) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Pulse (bpm)</label>
                        <input type="number" name="pulse" class="form-control" placeholder="72" value="<?= htmlspecialchars($data->pulse) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Temperature (°C)</label>
                        <input type="number" step="0.1" name="temperature" class="form-control" placeholder="36.5" value="<?= htmlspecialchars($data->temperature) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">SpO2 (%)</label>
                        <input type="number" name="spo2" class="form-control" placeholder="98" value="<?= htmlspecialchars($data->spo2) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Blood Sugar (mg/dL)</label>
                        <input type="number" step="0.01" name="blood_sugar" class="form-control" placeholder="0.00" value="<?= htmlspecialchars($data->blood_sugar) ?>">
                    </div>

                    <hr class="my-2 text-muted">
                    <h5 class="mb-0 text-primary">Clinical Documentation</h5>

                    <div class="col-12">
                        <label class="form-label">Chief Complaint</label>
                        <textarea name="chief_complaint" class="form-control" rows="2"><?= htmlspecialchars($data->chief_complaint) ?></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Medical History</label>
                        <textarea name="medical_history" class="form-control" rows="3"><?= htmlspecialchars($data->medical_history) ?></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Clinical Notes</label>
                        <textarea name="clinical_notes" class="form-control" rows="3"><?= htmlspecialchars($data->clinical_notes) ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Physical Examination</label>
                        <textarea name="physical_examination" class="form-control" rows="3"><?= htmlspecialchars($data->physical_examination) ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Neurological Examination</label>
                        <textarea name="neurological_examination" class="form-control" rows="3"><?= htmlspecialchars($data->neurological_examination) ?></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Diagnosis</label>
                        <textarea name="diagnosis" class="form-control" rows="3"><?= htmlspecialchars($data->diagnosis) ?></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Treatment Plan</label>
                        <textarea name="treatment_plan" class="form-control" rows="3"><?= htmlspecialchars($data->treatment_plan) ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Report</label>
                        <input type="file" name="report" class="form-control">
                        <?php if (!empty($data->report)): ?>
                            <div class="mt-2">
                                <a href="<?= $base_url ?>/uploads/reports/<?= $data->report ?>" target="_blank" class="btn btn-info btn-sm">
                                    <i class="bi bi-file-earmark-text me-1"></i> View Current Report
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update Consultation
                </button>
                <a href="<?= $base_url ?>/consultation/index" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-1"></i> Cancel
                </a>
            </div>

        </form>

    </div>

</div>