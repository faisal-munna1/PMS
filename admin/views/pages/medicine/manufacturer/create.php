<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0">
                        Add Medicine Manufacturer
                    </h3>

                    <a href="<?= $base_url ?>/manufacturer/index"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-table me-1"></i>
                        Manufacturer List
                    </a>

                </div>

            </div>

            <form action="<?= $base_url ?>/manufacturer/save" method="post">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-12">

                            <label class="form-label">
                                Manufacturer Name
                            </label>

                            <input
                                type="text"
                                name="manufacturer_name"
                                class="form-control"
                                placeholder="Enter manufacturer name"
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

                                <option value="">
                                    Select Status
                                </option>

                                <option value="active">
                                    Active
                                </option>

                                <option value="inactive">
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="<?= $base_url ?>/manufacturer/index"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back
                    </a>

                    <button
                        type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Save Manufacturer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>