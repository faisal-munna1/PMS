<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Update Medicine Duration
                <a href="<?= $base_url ?>/duration/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/duration/update">

            <div class="card-body">

                <input
                    type="hidden"
                    id="id"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="mb-3">
                    <label for="duration_name" class="form-label">Duration Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="duration_name"
                        name="duration_name"
                        value="<?= htmlspecialchars($data->duration_name ?? '') ?>"
                        placeholder="Enter Duration Name"
                        required>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Update Duration
                </button>

                <a href="<?= $base_url ?>/duration/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>