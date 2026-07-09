<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <h3 class="card-title mb-0">
                Patient List
            </h3>

            <a href="<?= $base_url ?>/patient/create"
               class="btn btn-outline-primary btn-sm">

                <i class="bi bi-plus-circle me-1"></i>
                Add Patient

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle datatable">

                <thead class="table-light">

                    <tr class="text-center">

                        <th width="60">#</th>
                        <th width="70">Image</th>
                        <th>Patient Code</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>Phone</th>
                        <th width="90">Status</th>
                        <th width="140">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($data as $key => $patient): ?>

                        <tr>

                            <td class="text-center">
                                <?= $key + 1 ?>
                            </td>

                            <td class="text-center">

                                <img
                                    src="<?= $base_url ?>/uploads/patients/<?= htmlspecialchars($patient->image) ?>"
                                    alt="<?= htmlspecialchars($patient->name) ?>"
                                    class="img-circle border"
                                    width="45"
                                    height="45"
                                    style="object-fit: cover;">

                            </td>

                            <td>
                                <?= htmlspecialchars($patient->patient_code) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($patient->name) ?>
                            </td>

                            <td class="text-center">
                                <?= ucfirst(htmlspecialchars($patient->gender)) ?>
                            </td>

                            <td class="text-center">
                                <?= htmlspecialchars($patient->blood_group) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($patient->phone) ?>
                            </td>

                            <td class="text-center">

                                <?php if ($patient->status == 'active'): ?>

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <div class="btn-group btn-group-sm">

                                    <a href="<?= $base_url ?>/patient/edit/<?= $patient->id ?>"
                                       class="btn btn-outline-primary"
                                       title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <!--
                                    <a href="<?= $base_url ?>/patient/delete/<?= $patient->id ?>"
                                       class="btn btn-outline-danger"
                                       title="Delete"
                                       onclick="return confirm('Are you sure to delete this record?')">

                                        <i class="bi bi-trash"></i>

                                    </a>
                                    -->

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>