<div
    class="col-md-8 m-auto mt-md-5">

    <div
        class="card card-primary card-outline mb-4">

        <div
            class="card-header">

            <div
                class="card-title w-100">

                Add Doctor Information

                <a
                    href="<?= $base_url ?>/doctor/index"
                    class="btn btn-sm btn-primary float-end">

                    Show Table

                </a>

            </div>

        </div>

        <form
            method="post"
            action="<?= $base_url ?>/doctor/save"
            enctype="multipart/form-data">

            <div
                class="card-body">

                <div
                    class="row">

                    <div
                        class="col-md-6 mb-3">

                        <label
                            class="form-label">
                            User
                        </label>

                        <select
                            class="form-select"
                            name="user_id">

                            <option
                                value="">
                                Select User
                            </option>

                            <?php foreach ($users as $user): ?>

                                <option
                                    value="<?= $user->id ?>">

                                    <?= $user->name ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div
                        class="col-md-6 mb-3">

                        <label
                            class="form-label">
                            Specialization
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="specialization"
                            placeholder="Enter specialization">

                    </div>


                    <div
                        class="col-md-12 mb-3">

                        <label
                            class="form-label">
                            Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Enter full name">

                    </div>


                    <div
                        class="col-md-6 mb-3">

                        <label
                            class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Enter email">

                    </div>


                    <div
                        class="col-md-6 mb-3">

                        <label
                            class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="phone"
                            placeholder="Enter phone">

                    </div>


                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Qualification
                        </label>

                        <!-- Quill Editor -->
                        <div
                            class="quill-editor border rounded"
                            data-target="qualification"
                            data-placeholder="Enter doctor qualification..."
                            style="height:220px;">
                        </div>

                        <!-- Hidden Textarea -->
                        <textarea
                            id="qualification"
                            name="qualification"
                            class="d-none"></textarea>

                    </div>
                </div>


                <div
                    class="col-md-6 mb-3">

                    <label
                        class="form-label">
                        Consultation Fee
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        name="consultation_fee"
                        step="0.01"
                        placeholder="0.00">

                </div>


                <div
                    class="col-md-6 mb-3">

                    <label
                        class="form-label">
                        Status
                    </label>

                    <select
                        class="form-select"
                        name="status">

                        <option
                            value="active">
                            Active
                        </option>

                        <option
                            value="inactive">
                            Inactive
                        </option>

                    </select>

                </div>


                <div
                    class="col-md-6 mb-3">

                    <label
                        class="form-label">
                        Signature Image
                    </label>

                    <input
                        type="file"
                        class="form-control"
                        name="signature_image">

                </div>


                <div
                    class="col-md-6 mb-3">

                    <label
                        class="form-label">
                        Doctor Image
                    </label>

                    <input
                        type="file"
                        class="form-control"
                        name="image">

                </div>


            </div>

    </div>


    <div
        class="card-footer">

        <button
            type="submit"
            class="btn btn-primary"
            name="btn_submit">

            Save Doctor

        </button>


        <a
            href="<?= $base_url ?>/doctor/index"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>


    </form>


</div>

</div>