<div class="col-md-8 mx-auto mt-5">

    <div class="card card-primary card-outline shadow">

        <div class="card-header">

            <h3 class="card-title fw-bold">Edit User Information</h3>

            <a href="<?= $base_url ?>/user/index" class="btn btn-primary btn-sm float-end">
                Show Users
            </a>

        </div>

        <form action="<?= $base_url ?>/user/update" method="post" enctype="multipart/form-data">

            <div class="card-body">

                <input type="hidden" name="id" value="<?= $data->id ?>">

                <!-- Role -->
                <div class="mb-3">

                    <label class="form-label">
                        Role <span class="text-danger">*</span>
                    </label>

                    <select name="role_id" class="form-select" required>

                        <?php foreach ($roles as $role): ?>

                            <option value="<?= $role->id ?>" <?= $role->id == $data->role_id ? "selected" : "" ?>>
                                <?= $role->name ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Profile Image -->
                <div class="mb-3">

                    <label class="form-label">Profile Image</label>

                    <input type="file" name="image" class="form-control">

                    <?php if (!empty($data->image)): ?>

                        <img src="<?= $base_url ?>/uploads/users/<?= $data->image ?>" class="img-thumbnail mt-3" width="120" alt="User Image">

                    <?php endif; ?>

                </div>

                <!-- Username -->
                <div class="mb-3">

                    <label class="form-label">
                        Username <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="username" class="form-control" value="<?= $data->username ?>" required>

                </div>

                <!-- Password -->
                <div class="mb-3">

                    <label class="form-label">Password</label>

                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">

                </div>

                <!-- Full Name -->
                <div class="mb-3">

                    <label class="form-label">
                        Full Name <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="name" class="form-control" value="<?= $data->name ?>" required>

                </div>

                <!-- Email -->
                <div class="mb-3">

                    <label class="form-label">
                        Email Address <span class="text-danger">*</span>
                    </label>

                    <input type="email" name="email" class="form-control" value="<?= $data->email ?>" required>

                </div>

                <!-- Phone -->
                <div class="mb-3">

                    <label class="form-label">
                        Phone Number <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="phone" class="form-control" value="<?= $data->phone ?>" required>

                </div>

                <!-- Status -->
                <div class="mb-3">

                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="active" <?= $data->status == "active" ? "selected" : "" ?>>
                            Active
                        </option>

                        <option value="inactive" <?= $data->status == "inactive" ? "selected" : "" ?>>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" name="btn_submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update User
                </button>

                <a href="<?= $base_url ?>/user/index" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>

            </div>

        </form>

    </div>

</div>