<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Role
                </h3>

                <div class="card-tools">
                    <a href="<?= $base_url ?>/role/index" class="btn btn-primary btn-sm">
                        <i class="bi bi-list-ul me-1"></i>
                        Role List
                    </a>
                </div>

            </div>

            <form action="<?= $base_url ?>/role/update" method="post">

                <div class="card-body">

                    <input type="hidden"
                           name="id"
                           value="<?= $data->id ?? '' ?>">

                    <div class="mb-3">

                        <label for="name" class="form-label">
                            Role Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               value="<?= htmlspecialchars($data->name ?? '') ?>"
                               placeholder="Enter role name"
                               required>

                    </div>

                    <div class="mb-0">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea id="description"
                                  name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter role description"><?= htmlspecialchars($data->description ?? '') ?></textarea>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit"
                            name="btn_submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Update

                    </button>

                    <a href="<?= $base_url ?>/role/index"
                       class="btn btn-secondary">

                        <i class="bi bi-x-circle me-1"></i>
                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>