<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0">
                        Add Medicine Dose
                    </h3>

                    <a href="<?= $base_url ?>/dose/index"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-table me-1"></i>
                        Dose List
                    </a>

                </div>

            </div>

            <form action="<?= $base_url ?>/dose/save" method="post">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-12">

                            <label class="form-label">
                                Dose Name
                            </label>

                            <input
                                type="text"
                                name="dose_name"
                                class="form-control"
                                placeholder="Enter dose name"
                                required>

                        </div>

                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="<?= $base_url ?>/dose/index"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back
                    </a>

                    <button
                        type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Save Dose

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>