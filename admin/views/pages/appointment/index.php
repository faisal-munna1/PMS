<div class="row mb-3 align-items-center">

    <div class="col-sm-6">
        <h3 class="mb-0 fw-semibold">Appointment Management</h3>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= $base_url ?>">
                        <i class="bi bi-house-door-fill me-1"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">Appointment</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>

</div>

<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">

        <div class="row align-items-center g-2">

            <div class="col-md-4">
                <h3 class="card-title mb-0">
                    <i class="bi bi-calendar-check me-2"></i>
                    Appointment List
                </h3>
            </div>

            <div class="col-md-8">

                <form action="<?= $base_url ?>/appointment/index"
                      method="get"
                      class="row g-2 justify-content-md-end">

                    <div class="col-auto">

                        <input type="date"
                               name="appointment_date"
                               class="form-control form-control-sm"
                               value="<?= $_GET['appointment_date'] ?? '' ?>">

                    </div>

                    <div class="col-auto">

                        <button type="submit"
                                class="btn btn-info btn-sm">

                            <i class="bi bi-search"></i>

                        </button>

                    </div>

                    <?php if (!empty($_GET['appointment_date'])): ?>

                        <div class="col-auto">

                            <a href="<?= $base_url ?>/appointment/index"
                               class="btn btn-secondary btn-sm">

                                <i class="bi bi-arrow-clockwise"></i>

                            </a>

                        </div>

                    <?php endif; ?>

                    <div class="col-auto">

                        <a href="<?= $base_url ?>/appointment/create"
                           class="btn btn-primary btn-sm">

                            <i class="bi bi-plus-circle me-1"></i>
                            Add Appointment

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-striped align-middle w-100 datatable">

            <thead>
                <tr>
                    <th width="60">#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Serial</th>
                    <th width="120">Status</th>
                    <th width="90" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($data as $key => $appointment): ?>

                    <?php
                    $badge = [
                        "scheduled"       => "warning",
                        "checked-in"      => "info",
                        "in-consultation" => "primary",
                        "completed"       => "success",
                        "cancel"          => "danger"
                    ];
                    ?>

                    <tr>

                        <td class="text-center"><?= $key + 1 ?></td>

                        <td>
                            <strong><?= htmlspecialchars($appointment->patient_code) ?></strong><br>
                            <small class="text-muted">
                                <?= htmlspecialchars($appointment->patient_name) ?>
                            </small>
                        </td>

                        <td><?= htmlspecialchars($appointment->doctor_name) ?></td>

                        <td><?= date("d M, Y", strtotime($appointment->appointment_date)) ?></td>

                        <td><?= date("h:i A", strtotime($appointment->appointment_time)) ?></td>

                        <td><?= $appointment->serial_number ?></td>

                        <td class="text-center">
                            <span class="badge text-bg-<?= $badge[$appointment->status] ?>">
                                <?= ucwords(str_replace("-", " ", $appointment->status)) ?>
                            </span>
                        </td>

                        <td class="text-center">

                            <a href="<?= $base_url ?>/appointment/edit/<?= $appointment->id ?>"
                               class="btn btn-primary btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>