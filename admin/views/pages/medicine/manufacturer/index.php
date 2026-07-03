<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6">
        <h1 class="mb-0 fs-3 fw-bold text-dark">
            Medicine Manufacturer Table
        </h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item active">Medicine Manufacturer</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/manufacturer/create" class="btn btn-primary">
        Add Medicine Manufacturer
    </a>
</div>

<div class="table-responsive rounded border">

    <table
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="10"
        data-search-highlight="true"
        class="table table-striped table-hover table-bordered mb-0 align-middle">

        <thead class="table-dark text-center">
            <tr>
                <th>S/L</th>
                <th>Manufacturer Name</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value): ?>

                <tr>

                    <td class="text-center"><?= $key + 1 ?></td>

                    <td><?= htmlspecialchars($value->manufacturer_name) ?></td>

                    <td class="text-center">
                        <?php if ($value->status == 'active'): ?>
                            <span class="badge bg-success">Active</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Inactive</span>
                        <?php endif; ?>
                    </td>

                    <td class="text-center">
                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/manufacturer/edit/<?= $value->id ?>"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <a href="<?= $base_url ?>/manufacturer/delete/<?= $value->id ?>"
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure to delete this record?')">
                                Delete
                            </a>

                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>