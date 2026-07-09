<div class="col-lg-10 mx-auto">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="card-title mb-0">
                    Add Patient Information
                </h3>

                <a href="<?= $base_url ?>/patient/index"
                   class="btn btn-outline-primary btn-sm">

                    <i class="bi bi-table me-1"></i>
                    Show Table

                </a>

            </div>

        </div>


        <form method="post"
              action="<?= $base_url ?>/patient/save"
              enctype="multipart/form-data">


            <div class="card-body">

                <div class="row">


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Patient Name
                        </label>

                        <input type="text"
                               class="form-control"
                               name="name"
                               placeholder="Enter Patient Name">

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

                            <option value="male">
                                Male
                            </option>

                            <option value="female">
                                Female
                            </option>

                            <option value="others">
                                Others
                            </option>

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Date of Birth
                        </label>

                        <input type="date"
                               class="form-control"
                               name="date_of_birth">

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

                                <option value="<?= $group ?>">
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
                               placeholder="Enter Phone Number">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               class="form-control"
                               name="email"
                               placeholder="Enter Email">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NID
                        </label>

                        <input type="text"
                               class="form-control"
                               name="nid">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Occupation
                        </label>

                        <input type="text"
                               class="form-control"
                               name="occupation">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Marital Status
                        </label>

                        <select class="form-select"
                                name="marital_status">

                            <option value="">
                                Select Status
                            </option>

                            <option value="single">
                                Single
                            </option>

                            <option value="married">
                                Married
                            </option>

                            <option value="divorced">
                                Divorced
                            </option>

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select class="form-select"
                                name="status">

                            <option value="active">
                                Active
                            </option>

                            <option value="inactive">
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
                                  rows="3"
                                  placeholder="Enter Address"></textarea>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Emergency Contact Name
                        </label>

                        <input type="text"
                               class="form-control"
                               name="emergency_contact_name">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Emergency Contact Phone
                        </label>

                        <input type="text"
                               class="form-control"
                               name="emergency_contact_phone">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Patient Image
                        </label>

                        <input type="file"
                               class="form-control"
                               name="image">

                    </div>


                </div>

            </div>


            <div class="card-footer">

                <button type="submit"
                        name="btn_submit"
                        class="btn btn-primary">

                    <i class="bi bi-person-plus me-1"></i>
                    Save Patient

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