<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">Doctor List</h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item">Doctor</li>
                <li class="breadcrumb-item active">Doctor List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/doctor/create" class="btn btn-primary">
        Add Doctor
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
                <th>Doctor Name</th>
                <th>Specialization</th>
                <th>Qualification</th>
                <th>Consultation Fee</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $doctor): ?>

                <tr>

                    <td class="text-center"><?= $key + 1 ?></td>

                    <td class="text-center">
                        <?php if(!empty($doctor->image)){ ?>
                            <img src="<?= $base_url ?>/uploads/doctors/<?= $doctor->image ?>"
                                 width="50"
                                 height="50"
                                 class="rounded-circle border">
                        <?php }else{ ?>
                            <img src="<?= $base_url ?>/uploads/no-image.png"
                                 width="50"
                                 height="50"
                                 class="rounded-circle border">
                        <?php } ?>
                    </td>

                    <td><?= $doctor->full_name ?></td>

                    <td><?= $doctor->specialization ?></td>

                    <td><?= $doctor->qualification ?></td>

                    <td class="text-end">
                        <?= number_format($doctor->consultation_fee,2) ?>
                    </td>

                    <td>
                        <span class="badge <?= $doctor->status=='active'?'bg-success':'bg-danger' ?>">
                            <?= ucfirst($doctor->status) ?>
                        </span>
                    </td>

                    <td class="text-center">

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/doctor/edit/<?= $doctor->id ?>"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <a href="<?= $base_url ?>/doctor/delete/<?= $doctor->id ?>"
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