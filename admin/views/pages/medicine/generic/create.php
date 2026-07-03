<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">

        <div class="card-header">
            <div class="card-title w-100">
                Add Medicine Generic
                <a href="<?= $base_url ?>/generic/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/generic/save">

            <div class="card-body">

                <div class="mb-3">
                    <label for="generic_name" class="form-label">Generic Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="generic_name"
                        name="generic_name"
                        placeholder="Enter Generic Name"
                        required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Save Generic
                </button>

                <a href="<?= $base_url ?>/generic/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>