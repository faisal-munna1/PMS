<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">User Tables</h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Tables</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    User
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/user/create" class="btn btn-primary">
        Add User
    </a>
</div>

<div class="table-responsive rounded border">
    <table
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="5"
        data-search-highlight="true"
        class="table table-striped table-hover table-bordered mb-0 align-middle">

        <thead class="table-dark text-center">
            <tr>
                <th>S/L</th>
                <th>Role</th>
                <th>Image</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($data as $key => $value): ?>

            <tr>

                <td class="text-center"><?= $key + 1 ?></td>

                <td><?= htmlspecialchars($value->role) ?></td>
                <td><img src="<?= $base_url ?>/uploads/users/<?= $value->image ?>" class="img-fluid" width="40"></td>

                <td><?= htmlspecialchars($value->username) ?></td>

                <td><?= htmlspecialchars($value->name) ?></td>

                <td><?= htmlspecialchars($value->email) ?></td>

                <td><?= htmlspecialchars($value->phone) ?></td>

                <td class="text-center">
                    <?php if($value->status == "active"): ?>
                        <span class="badge bg-success">Active</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Inactive</span>
                    <?php endif; ?>
                </td>

                <td class="text-center">
                    <div class="btn-group btn-group-sm">

                        <a href="<?= $base_url ?>/user/edit/<?= $value->id ?>"
                           class="btn btn-primary">
                            Edit
                        </a>

                        <!-- <a href="<?= $base_url ?>/user/delete/<?= $value->id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Are you sure to delete this?')">
                            Delete
                        </a> -->

                    </div>
                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</div>