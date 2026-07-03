<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">
            Medicine Dose Table
        </h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item active">Medicine Dose</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/dose/create" class="btn btn-primary">
        Add Medicine Dose
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
                <th>Dose Name</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($data as $key => $value): ?>

                <tr>

                    <td class="text-center">
                        <?= $key + 1 ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($value->dose_name) ?>
                    </td>

                    <td class="text-center">
                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/dose/edit/<?= $value->id ?>" class="btn btn-primary">
                                Edit
                            </a>

                            <a href="<?= $base_url ?>/dose/delete/<?= $value->id ?>"
                               onclick="return confirm('Are you sure to delete this record?')"
                               class="btn btn-danger">
                                Delete
                            </a>

                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>