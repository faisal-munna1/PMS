<div class="col-md-6 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Update Medicine Instruction
                <a href="<?= $base_url ?>/instruction/index" class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>
            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/instruction/update">

            <div class="card-body">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="mb-3">
                    <label for="instruction_name" class="form-label">Instruction Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="instruction_name"
                        name="instruction_name"
                        value="<?= htmlspecialchars($data->instruction_name ?? '') ?>"
                        placeholder="Enter Instruction Name"
                        required>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Update Instruction
                </button>

                <a href="<?= $base_url ?>/instruction/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>