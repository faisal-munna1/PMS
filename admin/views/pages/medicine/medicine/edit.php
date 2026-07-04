<div class="col-md-8 m-auto mt-md-5">

    <div class="card card-primary card-outline mb-4">

        <div class="card-header">
            <div class="card-title w-100">
                Update Medicine

                <a href="<?= $base_url ?>/medicine/index"
                   class="btn btn-sm btn-primary float-end">
                    Show Table
                </a>

            </div>
        </div>

        <form method="post" action="<?= $base_url ?>/medicine/update">

            <div class="card-body">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?? '' ?>">

                <div class="mb-3">
                    <label class="form-label">Medicine Name</label>

                    <input
                        type="text"
                        class="form-control"
                        name="medicine_name"
                        value="<?= htmlspecialchars($data->medicine_name ?? '') ?>"
                        required>
                </div>

                <div class="mb-3">

                    <label class="form-label">Generic</label>

                    <select
                        name="generic_id"
                        class="form-select"
                        required>

                        <option value="">Select Generic</option>

                        <?php foreach ($generics as $generic): ?>

                            <option
                                value="<?= $generic->id ?>"
                                <?= ($data->generic_id == $generic->id) ? "selected" : "" ?>>

                                <?= htmlspecialchars($generic->generic_name) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Manufacturer</label>

                    <select
                        name="manufacturer_id"
                        class="form-select"
                        required>

                        <option value="">Select Manufacturer</option>

                        <?php foreach ($manufacturers as $manufacturer): ?>

                            <option
                                value="<?= $manufacturer->id ?>"
                                <?= ($data->manufacturer_id == $manufacturer->id) ? "selected" : "" ?>>

                                <?= htmlspecialchars($manufacturer->manufacturer_name) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Medicine Type</label>

                    <select
                        name="type_id"
                        class="form-select"
                        required>

                        <option value="">Select Type</option>

                        <?php foreach ($types as $type): ?>

                            <option
                                value="<?= $type->id ?>"
                                <?= ($data->type_id == $type->id) ? "selected" : "" ?>>

                                <?= htmlspecialchars($type->type_name) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Strength</label>

                    <select
                        name="strength_id"
                        class="form-select"
                        required>

                        <option value="">Select Strength</option>

                        <?php foreach ($strengths as $strength): ?>

                            <option
                                value="<?= $strength->id ?>"
                                <?= ($data->strength_id == $strength->id) ? "selected" : "" ?>>

                                <?= htmlspecialchars($strength->strength_name) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select"
                        required>

                        <option value="active"
                            <?= ($data->status == "active") ? "selected" : "" ?>>
                            Active
                        </option>

                        <option value="inactive"
                            <?= ($data->status == "inactive") ? "selected" : "" ?>>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="card-footer">

                <button
                    type="submit"
                    name="btn_submit"
                    class="btn btn-primary">

                    Update Medicine

                </button>

                <a
                    href="<?= $base_url ?>/medicine/index"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>