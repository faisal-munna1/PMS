<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        Update Medicine Duration
                    </h3>

                    <a href="<?= $base_url ?>/duration/index"
                       class="btn btn-primary btn-sm">

                        <i class="bi bi-table me-1"></i>
                        Show Table

                    </a>

                </div>

            </div>

            <form action="<?= $base_url ?>/duration/update"
                  method="post">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="card-body">

                    <div class="mb-3">

                        <label for="duration_name" class="form-label">
                            Duration Name
                        </label>

                        <input
                            type="text"
                            id="duration_name"
                            name="duration_name"
                            class="form-control"
                            value="<?= htmlspecialchars($data->duration_name ?? '') ?>"
                            placeholder="Enter Duration Name"
                            autocomplete="off"
                            required>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit"
                            name="btn_submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Update Duration

                    </button>

                    <a href="<?= $base_url ?>/duration/index"
                       class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left me-1"></i>
                        Back

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>