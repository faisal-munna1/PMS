<div class="row mb-3 align-items-center">

    <div class="col-sm-6">
        <h3 class="mb-0 fw-semibold">Consultation Management</h3>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= $base_url ?>">
                        <i class="bi bi-house-door-fill me-1"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">Consultation</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>

</div>

<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">

        <h3 class="card-title">
            <i class="bi bi-clipboard2-pulse me-2"></i>
            Consultation List
        </h3>

        <div class="card-tools">

            <a href="<?= $base_url ?>/consultation/create"
                class="btn btn-primary btn-sm">

                <i class="bi bi-plus-circle me-1"></i>
                Add Consultation

            </a>

        </div>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-striped align-middle w-100 datatable">

            <thead>

                <tr>

                    <th width="60">#</th>
                    <th>Date</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Chief Complaint</th>
                    <th>Diagnosis</th>
                    <th width="100">Report</th>
                    <th width="130" class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($data as $key => $consultation): ?>

                    <tr>

                        <td class="text-center">
                            <?= $key + 1 ?>
                        </td>

                        <td>
                            <?= date("d M, Y", strtotime($consultation->consultation_date)) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($consultation->patient_name) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($consultation->doctor_name) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(substr($consultation->chief_complaint, 0, 50)) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(substr($consultation->diagnosis, 0, 50)) ?>
                        </td>

                        <td class="text-center">

                            <?php if (!empty($consultation->report)): ?>

                                <a href="<?= $base_url ?>/uploads/reports/<?= $consultation->report ?>"
                                    target="_blank"
                                    class="btn btn-success btn-sm">

                                    <i class="bi bi-file-earmark-pdf"></i>

                                </a>

                            <?php else: ?>

                                <span class="badge text-bg-secondary">
                                    No File
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="text-center">

                            <div class="btn-group btn-group-sm">

                                <a href="<?= $base_url ?>/consultation/edit/<?= $consultation->id ?>"
                                    class="btn btn-primary"
                                    title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <a href="<?= $base_url ?>/prescription/prescription/<?= $consultation->id ?>"
                                    class="btn btn-success"
                                    title="Prescription">

                                    <i class="bi bi-file-earmark-medical"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>