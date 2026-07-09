<div class="col-lg-6 mx-auto">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="card-title mb-0">
                    Add Medicine Instruction
                </h3>

                <a href="<?= $base_url ?>/instruction/index"
                   class="btn btn-outline-primary btn-sm">

                    <i class="bi bi-table me-1"></i>
                    Show Table

                </a>

            </div>

        </div>

        <form method="post"
              action="<?= $base_url ?>/instruction/save">

            <div class="card-body">

                <div class="mb-3">

                    <label for="instruction_name" class="form-label">
                        Instruction Name
                    </label>

                    <input
                        type="text"
                        id="instruction_name"
                        name="instruction_name"
                        class="form-control"
                        placeholder="Enter Instruction Name"
                        required>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                    <i class="bi bi-check-circle me-1"></i>
                    Save Instruction

                </button>

                <a href="<?= $base_url ?>/instruction/index"
                   class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>
                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>