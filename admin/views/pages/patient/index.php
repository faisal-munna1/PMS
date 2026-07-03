<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">Patient List</h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item">Patient</li>
                <li class="breadcrumb-item active">Patient List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/patient/create" class="btn btn-primary">
        Add Patient
    </a>
</div>

<div class="table-responsive rounded border">

    <table
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="10"
        data-search-highlight="true"
        class="table table-bordered table-hover table-striped align-middle mb-0">

        <thead class="table-dark text-center">
            <tr>
                <th>S/L</th>
                <th>Image</th>
                <th>Patient Code</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Phone</th>
                <th>Status</th>
                <th width="130">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $patient): ?>

                <tr>

                    <td class="text-center"><?= $key + 1 ?></td>

                    <td class="text-center">
                        <img src="<?= $base_url ?>/uploads/patients/<?= $patient->image ?>" width="50"  height="50" >
                    </td>

                    <td><?= $patient->patient_code ?></td>

                    <td><?= $patient->name ?></td>

                    <td><?= ucfirst($patient->gender) ?></td>

                    <td><?= $patient->blood_group ?></td>

                    <td><?= $patient->phone ?></td>

                    <td><?= ucfirst($patient->status) ?></td>

                    <td class="text-center">

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/patient/edit/<?= $patient->id ?>" class="btn btn-primary">
                                Edit
                            </a>

                            <a href="<?= $base_url ?>/patient/delete/<?= $patient->id ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </a>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>