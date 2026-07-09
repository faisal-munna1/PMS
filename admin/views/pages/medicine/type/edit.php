<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0">
                        Update Medicine Type
                    </h3>

                    <a href="<?= $base_url ?>/type/index"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-table me-1"></i>
                        Type List
                    </a>

                </div>

            </div>

            <form action="<?= $base_url ?>/type/update" method="post">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?>">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-12">

                            <label class="form-label">
                                Type Name
                            </label>

                            <input
                                type="text"
                                name="type_name"
                                class="form-control"
                                value="<?= htmlspecialchars($data->type_name) ?>"
                                placeholder="Enter type name"
                                required>

                        </div>

                        <div class="col-12">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="active"
                                    <?= $data->status == 'active' ? 'selected' : '' ?>>
                                    Active
                                </option>

                                <option value="inactive"
                                    <?= $data->status == 'inactive' ? 'selected' : '' ?>>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="<?= $base_url ?>/type/index"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back
                    </a>

                    <button
                        type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Update Type

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>