<div class="col-md-8 m-auto mt-md-5">
    <div class="card card-primary card-outline shadow">
        <div class="card-header">
            <div class="card-title fw-bold">
                Add User Information
            </div>

            <a href="<?php echo $base_url; ?>/user/index" class="btn btn-sm btn-primary float-end">
                Show Users
            </a>
        </div>

        <form method="post" action="<?php echo $base_url; ?>/user/save">

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select">
                        <option value="">Select Role</option>
                        <?php foreach($roles as $role): ?>
                            <option value="<?php echo $role->id; ?>">
                                <?php echo $role->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Enter Username">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter Password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter Full Name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter Email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        placeholder="Enter Phone Number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" name="btn_submit" class="btn btn-primary">
                    Save User
                </button>

                <a href="<?php echo $base_url; ?>/user/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>