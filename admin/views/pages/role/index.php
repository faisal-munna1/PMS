<div class="row mb-3 align-items-center">
    <div class="col-sm-6">
        <h3 class="mb-0 fw-semibold">Role Management</h3>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= $base_url ?>">
                        <i class="bi bi-house-door-fill me-1"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">User Management</li>
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">
        <h3 class="card-title">
            <i class="bi bi-person-badge me-2"></i>
            Role List
        </h3>

        <div class="card-tools">
            <a href="<?= $base_url ?>/role/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                Add Role
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-striped align-middle w-100 datatable">

            <thead>
                <tr>
                    <th width="70">S/L</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="120" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($data as $key => $value): ?>

                    <tr>
                        <td class="text-center"><?= $key + 1 ?></td>

                        <td><?= htmlspecialchars($value->name) ?></td>

                        <td><?= htmlspecialchars($value->description) ?></td>

                        <td class="text-center">

                            <a href="<?= $base_url ?>/role/edit/<?= $value->id ?>"
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