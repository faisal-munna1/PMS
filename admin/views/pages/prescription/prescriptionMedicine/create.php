<div class="col-md-12 mt-4">

    <div class="card card-primary card-outline">

        <div class="card-header">

            <div class="card-title w-100">

                Add Prescription Medicines

                <a href="<?= $base_url ?>/prescriptionmedicine/index"
                    class="btn btn-primary btn-sm float-end">

                    Show Table

                </a>

            </div>

        </div>

        <form method="post"
            action="<?= $base_url ?>/prescriptionmedicine/save">

            <div class="card-body">

                <div class="row mb-4">

                    <div class="col-md-6">

                        <label class="form-label">
                            Prescription
                        </label>

                        <select name="prescription_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Prescription
                            </option>

                            <?php foreach ($prescriptions as $prescription) { ?>

                                <option value="<?= $prescription->id ?>">

                                    Prescription #<?= $prescription->id ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle"
                        id="medicineTable">

                        <thead class="table-dark">

                            <tr>

                                <th width="22%">Medicine</th>
                                <th width="12%">Dose</th>
                                <th width="14%">Frequency</th>
                                <th width="14%">Duration</th>
                                <th width="14%">Instruction</th>
                                <th width="14%">Remarks</th>
                                <th width="8%">Sort</th>
                                <th width="70">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>

                                    <select name="medicine_id[]" class="form-select medicineSelect" required>

                                        <option value="">Search Medicine</option>

                                        <?php foreach ($medicines as $medicine) { ?>

                                            <option value="<?= $medicine->id ?>">
                                                <?= $medicine->medicine_name ?>
                                            </option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <td>

                                    <select name="dose_id[]"
                                        class="form-select"
                                        required>

                                        <option value="">Select</option>

                                        <?php foreach ($doses as $dose) { ?>

                                            <option value="<?= $dose->id ?>">

                                                <?= $dose->dose_name ?>

                                            </option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <td>

                                    <select name="frequency_id[]"
                                        class="form-select"
                                        required>

                                        <option value="">Select</option>

                                        <?php foreach ($frequencies as $frequency) { ?>

                                            <option value="<?= $frequency->id ?>">

                                                <?= $frequency->frequency_name ?>

                                            </option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <td>

                                    <select name="duration_id[]"
                                        class="form-select"
                                        required>

                                        <option value="">Select</option>

                                        <?php foreach ($durations as $duration) { ?>

                                            <option value="<?= $duration->id ?>">

                                                <?= $duration->duration_name ?>

                                            </option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <td>

                                    <select name="instruction_id[]"
                                        class="form-select">

                                        <option value="">
                                            Select
                                        </option>

                                        <?php foreach ($instructions as $instruction) { ?>

                                            <option value="<?= $instruction->id ?>">

                                                <?= $instruction->instruction_name ?>

                                            </option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <td>

                                    <input type="text"
                                        name="remarks[]"
                                        class="form-control">

                                </td>

                                <td>

                                    <input type="number"
                                        name="sort_order[]"
                                        value="1"
                                        class="form-control">

                                </td>

                                <td class="text-center action-cell">

                                    <button type="button"
                                        class="btn btn-success btn-sm addRow">

                                        <i class="fa fa-plus"></i>

                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary"
                    name="btn_submit">

                    Save Medicines

                </button>

                <a href="<?= $base_url ?>/prescriptionmedicine/index"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

<script>

$(function () {

    initMedicineSearch();
    updateSortOrder();

    function initMedicineSearch() {

        $(".medicineSelect").select2({
            placeholder: "Search Medicine",
            allowClear: true,
            width: "100%"
        });

    }

    function updateSortOrder() {

        $("#medicineTable tbody tr").each(function (index) {

            $(this).find("input[name='sort_order[]']").val(index + 1);

        });

    }

    // Add Row
    $(document).on("click", ".addRow", function () {

        let currentRow = $(this).closest("tr");

        let newRow = currentRow.clone();

        // Reset Values
        newRow.find("select").val("");
        newRow.find("input[type='text']").val("");
        newRow.find("input[type='number']").val("");

        // Destroy old Select2
        newRow.find(".medicineSelect").next(".select2").remove();

        newRow.find(".medicineSelect")
            .removeClass("select2-hidden-accessible")
            .removeAttr("data-select2-id");

        newRow.find("option").removeAttr("data-select2-id");

        // Current row => Minus
        currentRow.find(".action-cell").html(`
            <button type="button" class="btn btn-danger btn-sm removeRow">
                <i class="fa fa-minus"></i>
            </button>
        `);

        // New row => Plus
        newRow.find(".action-cell").html(`
            <button type="button" class="btn btn-success btn-sm addRow">
                <i class="fa fa-plus"></i>
            </button>
        `);

        $("#medicineTable tbody").append(newRow);

        // Initialize Select2 for all medicine dropdowns
        $(".medicineSelect").select2("destroy");

        initMedicineSearch();

        updateSortOrder();

    });

    // Remove Row
    $(document).on("click", ".removeRow", function () {

        $(this).closest("tr").remove();

        $("#medicineTable tbody tr").each(function () {

            $(this).find(".action-cell").html(`
                <button type="button" class="btn btn-danger btn-sm removeRow">
                    <i class="fa fa-minus"></i>
                </button>
            `);

        });

        $("#medicineTable tbody tr:last").find(".action-cell").html(`
            <button type="button" class="btn btn-success btn-sm addRow">
                <i class="fa fa-plus"></i>
            </button>
        `);

        updateSortOrder();

    });

});

</script>