<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0">
                        Update Medicine
                    </h3>

                    <a href="<?= $base_url ?>/medicine/index"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-table me-1"></i>
                        Medicine List
                    </a>

                </div>

            </div>

            <form action="<?= $base_url ?>/medicine/update" method="post">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data->id ?>">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-12">

                            <label class="form-label">
                                Medicine Name
                            </label>

                            <input
                                type="text"
                                name="medicine_name"
                                class="form-control"
                                value="<?= htmlspecialchars($data->medicine_name) ?>"
                                placeholder="Enter medicine name"
                                required>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Generic
                            </label>

                            <select
                                name="generic_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Generic
                                </option>

                                <?php foreach ($generics as $generic): ?>

                                    <option
                                        value="<?= $generic->id ?>"
                                        <?= $data->generic_id == $generic->id ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($generic->generic_name) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Manufacturer
                            </label>

                            <select
                                name="manufacturer_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Manufacturer
                                </option>

                                <?php foreach ($manufacturers as $manufacturer): ?>

                                    <option
                                        value="<?= $manufacturer->id ?>"
                                        <?= $data->manufacturer_id == $manufacturer->id ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($manufacturer->manufacturer_name) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Medicine Type
                            </label>

                            <select
                                name="type_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Type
                                </option>

                                <?php foreach ($types as $type): ?>

                                    <option
                                        value="<?= $type->id ?>"
                                        <?= $data->type_id == $type->id ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($type->type_name) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Strength
                            </label>

                            <select
                                name="strength_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Strength
                                </option>

                                <?php foreach ($strengths as $strength): ?>

                                    <option
                                        value="<?= $strength->id ?>"
                                        <?= $data->strength_id == $strength->id ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($strength->strength_name) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="active"
                                    <?= $data->status == 'active' ? 'selected' : '' ?>>
                                    Active
                                </option>

                                <option value="inactive"
                                    <?= $data->status == 'inactive' ? 'selected' : '' ?>>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="<?= $base_url ?>/medicine/index"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Back
                    </a>

                    <button
                        type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Update Medicine

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>