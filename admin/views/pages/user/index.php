<div class="row mb-3 align-items-center">
    <div class="col-sm-6">
        <h3 class="mb-0 fw-semibold">User Management</h3>
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
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">
        <h3 class="card-title">
            <i class="bi bi-people me-2"></i>
            User List
        </h3>

        <div class="card-tools">
            <a href="<?= $base_url ?>/user/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                Add User
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-striped align-middle w-100 datatable">

            <thead>
                <tr>
                    <th width="60">S/L</th>
                    <th>Role</th>
                    <th width="70">Image</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th width="90">Status</th>
                    <th width="100" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($data as $key => $value): ?>

                    <tr>

                        <td class="text-center">
                            <?= $key + 1 ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($value->role) ?>
                        </td>

                        <td class="text-center">
                            <img src="<?= $base_url ?>/uploads/users/<?= $value->image ?>"
                                 alt="<?= htmlspecialchars($value->name) ?>"
                                 class="img-circle border"
                                 width="40"
                                 height="40"
                                 style="object-fit:cover;">
                        </td>

                        <td>
                            <?= htmlspecialchars($value->username) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($value->name) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($value->email) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($value->phone) ?>
                        </td>

                        <td class="text-center">
                            <?php if ($value->status == "active"): ?>
                                <span class="badge text-bg-success">Active</span>
                            <?php else: ?>
                                <span class="badge text-bg-danger">Inactive</span>
                            <?php endif; ?>
                        </td>

                        <td class="text-center">

                            <a href="<?= $base_url ?>/user/edit/<?= $value->id ?>"
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