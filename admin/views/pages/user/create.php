<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="bi bi-person-plus me-2"></i>
                    Add User
                </h3>

                <div class="card-tools">
                    <a href="<?= $base_url ?>/user/index" class="btn btn-primary btn-sm">
                        <i class="bi bi-list-ul me-1"></i>
                        User List
                    </a>
                </div>

            </div>

            <form action="<?= $base_url ?>/user/save"
                  method="post"
                  enctype="multipart/form-data">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">
                            Role <span class="text-danger">*</span>
                        </label>

                        <select name="role_id"
                                class="form-select select2"
                                required>

                            <option value="">Select Role</option>

                            <?php foreach ($roles as $role): ?>

                                <option value="<?= $role->id ?>">
                                    <?= htmlspecialchars($role->name) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Profile Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Username <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Enter username"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password <span class="text-danger">*</span>
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter password"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Full Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter full name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Email Address <span class="text-danger">*</span>
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Enter email address"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Phone Number <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               placeholder="Enter phone number"
                               required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>

                        </select>
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit"
                            name="btn_submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-circle me-1"></i>
                        Save

                    </button>

                    <a href="<?= $base_url ?>/user/index"
                       class="btn btn-secondary">

                        <i class="bi bi-x-circle me-1"></i>
                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>