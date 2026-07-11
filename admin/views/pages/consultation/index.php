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
            <a href="<?= $base_url ?>/consultation/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                Add Consultation
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-striped align-middle w-100 datatable">

            <thead>
                <tr>
                    <th width="50" class="text-center">#</th>
                    <th width="110">Date</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Diagnosis</th>
                    <th width="100" class="text-center">Status</th>
                    <th width="150" class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $key => $consultation): ?>
                    <tr>
                        <td class="text-center text-muted fw-semibold">
                            <?= $key + 1 ?>
                        </td>

                        <td>
                            <span class="text-nowrap fw-medium">
                                <?= date("d M, Y", strtotime($consultation->consultation_date)) ?>
                            </span>
                        </td>

                        <td>
                            <div class="fw-semibold text-dark">
                                <?= htmlspecialchars($consultation->patient_name) ?>
                            </div>
                        </td>

                        <td>
                            <span class="text-muted">
                                <?= htmlspecialchars($consultation->doctor_name) ?>
                            </span>
                        </td>

                        <td>
                            <div class="text-truncate" style="max-width: 250px;" title="<?= htmlspecialchars($consultation->diagnosis) ?>">
                                <?= !empty($consultation->diagnosis) ? htmlspecialchars($consultation->diagnosis) : '<span class="text-muted-light italic">No diagnosis recorded</span>' ?>
                            </div>
                        </td>

                        <td class="text-center">
                            <?php if (($consultation->status ?? 'pending') == 'completed'): ?>
                                <span class="badge rounded-pill bg-success-subtle text-success border border-success">
                                    Completed
                                </span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning">
                                    Pending
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                
                                <?php if (!empty($consultation->report)): ?>
                                    <a href="<?= $base_url ?>/uploads/reports/<?= $consultation->report ?>"
                                       target="_blank"
                                       class="btn btn-outline-info"
                                       title="View Report">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-outline-secondary" disabled title="No Report Uploaded">
                                        <i class="bi bi-file-earmark-pdf-fill opacity-50"></i>
                                    </button>
                                <?php endif; ?>

                                <a href="<?= $base_url ?>/consultation/edit/<?= $consultation->id ?>"
                                   class="btn btn-outline-primary"
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="<?= $base_url ?>/prescription/prescription/<?= $consultation->id ?>"
                                   class="btn btn-outline-success"
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