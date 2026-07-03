<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">Role Tables</h1>
    </div>
    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/role/create" class="btn btn-primary">
        Add Role
    </a>
</div>

<div class="table-responsive rounded border">
    <table data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="5"
        data-search-highlight="true"
        data-locale="bn-BD"
        class="table table-striped table-hover table-bordered mb-0 align-middle w-auto"
        style="table-layout: auto; min-width: 100%;">

        <thead class="table-dark text-center">
            <tr>
                <th data-field="sl" data-sortable="true">S/L</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="address" data-sortable="true">Description</th>
                <th data-field="action" data-sortable="false" data-searchable="false">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <td class="text-center fw-bold text-secondary"><?= $key +1 ?></td>
                    <td><?= htmlspecialchars($value->name) ?></td>
                    <td><?= htmlspecialchars($value->description) ?></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="<?= $base_url ?>/role/edit/<?= $value->id ?>" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="<?= $base_url ?>/role/delete/<?= $value->id ?>"
                                onclick="return confirm('Are you sure to delete this?')"
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