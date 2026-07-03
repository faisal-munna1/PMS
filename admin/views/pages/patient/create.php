<div class="col-md-10 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Add Patient Information
                <a href="<?php echo $base_url; ?>/patient/index" class="btn btn-sm btn-primary float-end">Show Table</a>
            </div>
        </div>

        <form method="post" action="<?php echo $base_url; ?>/patient/save" enctype="multipart/form-data">

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Patient Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select" name="blood_group">
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NID</label>
                        <input type="text" class="form-control" name="nid">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Occupation</label>
                        <input type="text" class="form-control" name="occupation">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option value="">Select Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Emergency Contact Name</label>
                        <input type="text" class="form-control" name="emergency_contact_name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Emergency Contact Phone</label>
                        <input type="text" class="form-control" name="emergency_contact_phone">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Patient Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="btn_submit">
                    Save Patient
                </button>

                <a href="<?php echo $base_url; ?>/patient/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>