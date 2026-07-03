<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">

        <div class="card-header">
            <div class="card-title w-100">
                Add Medicine Type
                <a href="<?= $base_url ?>/type/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/type/save">

            <div class="card-body">

                <div class="mb-3">
                    <label for="type_name" class="form-label">Type Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="type_name"
                        name="type_name"
                        placeholder="Enter Type Name"
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
                    Save Type
                </button>

                <a href="<?= $base_url ?>/type/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>