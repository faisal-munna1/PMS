<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Update Medicine Frequency
                <a href="<?= $base_url ?>/frequency/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/frequency/update">

            <div class="card-body">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="mb-3">
                    <label for="frequency_name" class="form-label">Frequency Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="frequency_name"
                        name="frequency_name"
                        value="<?= htmlspecialchars($data->frequency_name ?? '') ?>"
                        placeholder="Enter Frequency Name"
                        required>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Update Frequency
                </button>

                <a href="<?= $base_url ?>/frequency/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>