<div class="col-md-8 m-auto mt-md-5">
    <div class="card card-primary card-outline shadow">

        <div class="card-header">
            <div class="card-title fw-bold">
                Edit User Information
            </div>

            <a href="<?= $base_url ?>/user/index" class="btn btn-sm btn-primary float-end">
                Show Users
            </a>
        </div>

        <form method="post" action="<?= $base_url ?>/user/update">

            <div class="card-body">

                <input type="hidden" name="id" value="<?= $data->id ?>">

                <div class="mb-3">
                    <label class="form-label">Role</label>

                    <select name="role_id" class="form-select">
                        <?php foreach($roles as $role): ?>

                            <option
                                value="<?= $role->id ?>" <?= $role->id == $data->role_id ? "selected" : "" ?>>  <?= $role->name ?>
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
                        value="<?= $data->username ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= $data->name ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= $data->email ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="<?= $data->phone ?>">
                </div>

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
                    Update User
                </button>

                <a href="<?= $base_url ?>/user/index" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>