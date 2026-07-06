<div class="col-md-8 mx-auto mt-5">

    <div class="card card-primary card-outline shadow">

        <div class="card-header">

            <h3 class="card-title fw-bold">
                Add User Information
            </h3>

            <a href="<?php echo $base_url; ?>/user/index"
                class="btn btn-primary btn-sm float-end">
                Show Users
            </a>

        </div>

        <form
            action="<?php echo $base_url; ?>/user/save"
            method="post"
            enctype="multipart/form-data">

            <div class="card-body">

                <!-- Role -->
                <div class="mb-3">
                    <label class="form-label">Role <span class="text-danger">*</span></label>

                    <select
                        name="role_id"
                        class="form-select"
                        required>

                        <option value="">Select Role</option>

                        <?php foreach ($roles as $role): ?>

                            <option value="<?php echo $role->id; ?>">
                                <?php echo $role->name; ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control">
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label">Username <span class="text-danger">*</span></label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Enter Username"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password <span class="text-danger">*</span></label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter Password"
                        required>
                </div>

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter Full Name"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter Email Address"
                        required>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        placeholder="Enter Phone Number"
                        required>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
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

                    <i class="fas fa-save"></i>
                    Save User

                </button>

                <a
                    href="<?php echo $base_url; ?>/user/index"
                    class="btn btn-secondary">

                    <i class="fas fa-times"></i>
                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>