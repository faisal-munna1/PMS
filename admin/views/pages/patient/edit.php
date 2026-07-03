<form method="post" action="<?php echo $base_url; ?>/patient/update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $data->id ?>">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Patient Name</label>
                <input type="text" class="form-control" name="name" value="<?= $data->name ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender">
                    <option value="male" <?= $data->gender=="male"?"selected":"" ?>>Male</option>
                    <option value="female" <?= $data->gender=="female"?"selected":"" ?>>Female</option>
                    <option value="others" <?= $data->gender=="others"?"selected":"" ?>>Others</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" value="<?= $data->date_of_birth ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Blood Group</label>
                <select class="form-select" name="blood_group">
                    <?php
                    $groups = ["A+","A-","B+","B-","AB+","AB-","O+","O-"];
                    foreach($groups as $group){
                    ?>
                        <option value="<?= $group ?>" <?= $data->blood_group==$group?"selected":"" ?>>
                            <?= $group ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?= $data->phone ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data->email ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">NID</label>
                <input type="text" class="form-control" name="nid" value="<?= $data->nid ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Occupation</label>
                <input type="text" class="form-control" name="occupation" value="<?= $data->occupation ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Marital Status</label>
                <select class="form-select" name="marital_status">
                    <option value="single" <?= $data->marital_status=="single"?"selected":"" ?>>Single</option>
                    <option value="married" <?= $data->marital_status=="married"?"selected":"" ?>>Married</option>
                    <option value="divorced" <?= $data->marital_status=="divorced"?"selected":"" ?>>Divorced</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="active" <?= $data->status=="active"?"selected":"" ?>>Active</option>
                    <option value="inactive" <?= $data->status=="inactive"?"selected":"" ?>>Inactive</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="3"><?= $data->address ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Emergency Contact Name</label>
                <input type="text" class="form-control" name="emergency_contact_name" value="<?= $data->emergency_contact_name ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Emergency Contact Phone</label>
                <input type="text" class="form-control" name="emergency_contact_phone" value="<?= $data->emergency_contact_phone ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Patient Image</label>
                <input type="file" class="form-control" name="image">

                <?php if(!empty($data->image)){ ?>
                    <img src="<?= $base_url ?>/uploads/patients/<?= $data->image ?>"
                         class="img-thumbnail mt-2"
                         width="120">
                <?php } ?>
            </div>

        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="btn_submit">
            Update Patient
        </button>

        <a href="<?= $base_url ?>/patient/index" class="btn btn-secondary">
            Cancel
        </a>
    </div>

</form>