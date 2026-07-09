<div class="col-lg-10 mx-auto">

    <div class="card card-outline card-primary shadow-sm">


        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="card-title mb-0">
                    Update Patient Information
                </h3>


                <a href="<?= $base_url ?>/patient/index"
                   class="btn btn-outline-primary btn-sm">

                    <i class="bi bi-table me-1"></i>
                    Show Table

                </a>

            </div>

        </div>



        <form method="post"
              action="<?= $base_url ?>/patient/update"
              enctype="multipart/form-data">


            <input type="hidden"
                   name="id"
                   value="<?= $data->id ?? '' ?>">



            <div class="card-body">

                <div class="row">


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Patient Name
                        </label>

                        <input type="text"
                               class="form-control"
                               name="name"
                               value="<?= htmlspecialchars($data->name ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gender
                        </label>

                        <select class="form-select"
                                name="gender">

                            <option value="">
                                Select Gender
                            </option>

                            <?php foreach(['male','female','others'] as $gender): ?>

                                <option value="<?= $gender ?>"
                                    <?= ($data->gender ?? '') == $gender ? 'selected' : '' ?>>

                                    <?= ucfirst($gender) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Date of Birth
                        </label>

                        <input type="date"
                               class="form-control"
                               name="date_of_birth"
                               value="<?= $data->date_of_birth ?? '' ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Blood Group
                        </label>

                        <select class="form-select"
                                name="blood_group">


                            <option value="">
                                Select Blood Group
                            </option>


                            <?php foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $group): ?>

                                <option value="<?= $group ?>"
                                    <?= ($data->blood_group ?? '') == $group ? 'selected' : '' ?>>

                                    <?= $group ?>

                                </option>

                            <?php endforeach; ?>


                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input type="text"
                               class="form-control"
                               name="phone"
                               value="<?= htmlspecialchars($data->phone ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               class="form-control"
                               name="email"
                               value="<?= htmlspecialchars($data->email ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NID
                        </label>

                        <input type="text"
                               class="form-control"
                               name="nid"
                               value="<?= htmlspecialchars($data->nid ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Occupation
                        </label>

                        <input type="text"
                               class="form-control"
                               name="occupation"
                               value="<?= htmlspecialchars($data->occupation ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Marital Status
                        </label>

                        <select class="form-select"
                                name="marital_status">

                            <?php foreach(['single','married','divorced'] as $status): ?>

                                <option value="<?= $status ?>"
                                    <?= ($data->marital_status ?? '') == $status ? 'selected' : '' ?>>

                                    <?= ucfirst($status) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select class="form-select"
                                name="status">

                            <option value="active"
                                <?= ($data->status ?? '') == 'active' ? 'selected' : '' ?>>
                                Active
                            </option>


                            <option value="inactive"
                                <?= ($data->status ?? '') == 'inactive' ? 'selected' : '' ?>>
                                Inactive
                            </option>


                        </select>

                    </div>



                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea class="form-control"
                                  name="address"
                                  rows="3"><?= htmlspecialchars($data->address ?? '') ?></textarea>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Emergency Contact Name
                        </label>

                        <input type="text"
                               class="form-control"
                               name="emergency_contact_name"
                               value="<?= htmlspecialchars($data->emergency_contact_name ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Emergency Contact Phone
                        </label>

                        <input type="text"
                               class="form-control"
                               name="emergency_contact_phone"
                               value="<?= htmlspecialchars($data->emergency_contact_phone ?? '') ?>">

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Patient Image
                        </label>


                        <input type="file"
                               class="form-control"
                               name="image">


                        <?php if(!empty($data->image)): ?>

                            <img src="<?= $base_url ?>/uploads/patients/<?= htmlspecialchars($data->image) ?>"
                                 class="img-thumbnail mt-2"
                                 width="120"
                                 height="120">

                        <?php endif; ?>


                    </div>


                </div>

            </div>



            <div class="card-footer">


                <button type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                    <i class="bi bi-check-circle me-1"></i>
                    Update Patient

                </button>



                <a href="<?= $base_url ?>/patient/index"
                   class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>
                    Cancel

                </a>


            </div>


        </form>


    </div>

</div>