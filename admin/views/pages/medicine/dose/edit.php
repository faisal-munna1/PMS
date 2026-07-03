<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Update Medicine Dose
                <a href="<?= $base_url ?>/dose/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/dose/update">

            <div class="card-body">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="mb-3">
                    <label for="dose_name" class="form-label">Dose Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="dose_name"
                        name="dose_name"
                        value="<?= htmlspecialchars($data->dose_name ?? '') ?>"
                        placeholder="Enter Dose Name"
                        required>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Update Dose
                </button>

                <a href="<?= $base_url ?>/dose/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>