<div class="card card-outline card-primary shadow-sm">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <h3 class="card-title mb-0">
                Medicine Generic List
            </h3>

            <a href="<?= $base_url ?>/generic/create"
               class="btn btn-outline-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                Add Generic
            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle datatable">

                <thead class="table-light">

                    <tr class="text-center">

                        <th width="60">#</th>
                        <th>Generic Name</th>
                        <th width="100">Status</th>
                        <th width="140">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($data as $key => $value): ?>

                        <tr>

                            <td class="text-center">
                                <?= $key + 1 ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($value->generic_name) ?>
                            </td>

                            <td class="text-center">

                                <?php if ($value->status == "active"): ?>

                                    <span class="badge text-bg-success">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="badge text-bg-danger">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <div class="btn-group btn-group-sm">

                                    <a href="<?= $base_url ?>/generic/edit/<?= $value->id ?>"
                                       class="btn btn-outline-primary"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- <a href="<?= $base_url ?>/generic/delete/<?= $value->id ?>"
                                       class="btn btn-outline-danger"
                                       title="Delete"
                                       onclick="return confirm('Are you sure to delete this record?')">
                                        <i class="bi bi-trash"></i>
                                    </a> -->

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>