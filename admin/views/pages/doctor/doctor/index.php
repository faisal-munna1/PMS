<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            Doctor List
        </h3>

        <a href="<?= $base_url ?>/doctor/create"class="btn btn-primary btn-sm float-end">
            Add Doctor
        </a>

    </div>


    <div class="card-body">

        <table class="table table-bordered table-striped align-middle datatable">


            <thead class="table-dark">

                <tr>

                    <th>S/L</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Specialization</th>
                    <th>Fee</th>
                    <th>Status</th>
                    <th width="120">Action</th>

                </tr>

            </thead>


            <tbody>

                <?php foreach($data as $key=>$doctor): ?>

                    <tr>

                        <td>
                            <?= $key+1 ?>
                        </td>


                        <td>

                            <?php if(!empty($doctor->image)): ?>

                                <img src="<?= $base_url ?>/uploads/doctors/<?= $doctor->image ?>"
                                     width="45"
                                     height="45"
                                     class="rounded-circle">

                            <?php else: ?>

                                <img src="<?= $base_url ?>/uploads/no-image.png"
                                     width="45"
                                     height="45"
                                     class="rounded-circle">

                            <?php endif; ?>

                        </td>


                        <td>
                            <?= $doctor->name ?>
                        </td>


                        <td>
                            <?= $doctor->email ?>
                        </td>


                        <td>
                            <?= $doctor->phone ?>
                        </td>


                        <td>
                            <?= $doctor->specialization ?>
                        </td>


                        <td>
                            <?= number_format($doctor->consultation_fee,2) ?>
                        </td>


                        <td>

                            <span class="badge <?= $doctor->status=='active'?'text-bg-success':'text-bg-danger' ?>">

                                <?= ucfirst($doctor->status) ?>

                            </span>

                        </td>


                        <td>

                            <div class="btn-group btn-group-sm">

                                <a href="<?= $base_url ?>/doctor/edit/<?= $doctor->id ?>"class="btn btn-primary">
                                    Edit
                                </a>


                                <a href="<?= $base_url ?>/doctor/delete/<?= $doctor->id ?>"class="btn btn-danger"
                                   onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>

                            </div>

                        </td>


                    </tr>


                <?php endforeach; ?>


            </tbody>


        </table>


    </div>

</div>