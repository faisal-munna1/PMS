<form method="post" action="<?php echo $base_url; ?>/doctor/update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $data->id ?>">

    <div class="card-body">

        <div class="row">

            <!-- User -->
            <div class="col-md-6 mb-3">
                <label class="form-label">User</label>
                <select class="form-select" name="user_id">
                    <?php foreach($users as $user){ ?>
                        <option value="<?= $user->id ?>"
                            <?= $data->user_id == $user->id ? "selected" : "" ?>>
                            <?= $user->name ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Specialization -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Specialization</label>
                <input type="text"
                       class="form-control"
                       name="specialization"
                       value="<?= $data->specialization ?>">
            </div>

            <!-- Qualification -->
            <div class="col-md-12 mb-3">
                <label class="form-label">Qualification</label>
                <textarea class="form-control"
                          name="qualification"
                          rows="4"><?= $data->qualification ?></textarea>
            </div>

            <!-- Consultation Fee -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Consultation Fee</label>
                <input type="number"
                       class="form-control"
                       name="consultation_fee"
                       step="0.01"
                       value="<?= $data->consultation_fee ?>">
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="active" <?= $data->status=="active"?"selected":"" ?>>
                        Active
                    </option>
                    <option value="inactive" <?= $data->status=="inactive"?"selected":"" ?>>
                        Inactive
                    </option>
                </select>
            </div>

            <!-- Signature Image -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Signature Image</label>
                <input type="file" class="form-control" name="signature_image">

                <?php if(!empty($data->signature_image)){ ?>
                    <img src="<?= $base_url ?>/uploads/signatures/<?= $data->signature_image ?>"
                         class="img-thumbnail mt-2"
                         width="120">
                <?php } ?>
            </div>

            <!-- Doctor Image -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Doctor Image</label>
                <input type="file" class="form-control" name="image">

                <?php if(!empty($data->image)){ ?>
                    <img src="<?= $base_url ?>/uploads/doctors/<?= $data->image ?>"
                         class="img-thumbnail mt-2"
                         width="120">
                <?php } ?>
            </div>

        </div>

    </div>

    <div class="card-footer">

        <button type="submit"
                class="btn btn-primary"
                name="btn_submit">
            Update Doctor
        </button>

        <a href="<?= $base_url ?>/doctor/index"
           class="btn btn-secondary">
            Cancel
        </a>

    </div>

</form>