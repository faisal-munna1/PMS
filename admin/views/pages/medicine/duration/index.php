<div class="row mb-4 pb-3 border-bottom">
    <div class="col-sm-6 text-sm-start mb-2 mb-sm-0">
        <h1 class="mb-0 fs-3 fw-bold text-dark">
            Medicine Duration Table
        </h1>
    </div>

    <div class="col-sm-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center justify-content-sm-end mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="#">
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    Master
                </li>
                <li class="breadcrumb-item active">
                    Medicine Duration
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="<?= $base_url ?>/duration/create" class="btn btn-primary">
        Add Medicine Duration
    </a>
</div>

<div class="table-responsive rounded border">

    <table
        data-toggle="table"
        data-search="true"
        data-pagination="true"
        data-page-size="5"
        data-search-highlight="true"
        class="table table-striped table-hover table-bordered mb-0">

        <thead class="table-dark text-center">
            <tr>
                <th>S/L</th>
                <th>Duration Name</th>
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
                        <?= $value->duration_name ?>
                    </td>

                    <td class="text-center">

                        <div class="btn-group btn-group-sm">

                            <a href="<?= $base_url ?>/duration/edit/<?= $value->id ?>"
                                class="btn btn-primary">
                                Edit
                            </a>

                            <a href="<?= $base_url ?>/duration/delete/<?= $value->id ?>"
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