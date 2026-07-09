<div class="card card-outline card-primary shadow-sm">


    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">


            <h3 class="card-title mb-0">

                Doctor Schedule List

            </h3>



            <a href="<?= $base_url ?>/schedule/create"
               class="btn btn-outline-primary btn-sm">

                <i class="bi bi-plus-circle me-1"></i>
                Add Schedule

            </a>


        </div>

    </div>



    <div class="card-body">


        <div class="table-responsive">


            <table class="table table-bordered table-hover align-middle datatable w-100">


                <thead class="table-light">


                    <tr class="text-center">

                        <th width="60">
                            #
                        </th>

                        <th>
                            Doctor
                        </th>

                        <th>
                            Specialization
                        </th>

                        <th>
                            Day
                        </th>

                        <th>
                            Start Time
                        </th>

                        <th>
                            End Time
                        </th>

                        <th width="100">
                            Status
                        </th>

                        <th width="140">
                            Action
                        </th>


                    </tr>


                </thead>



                <tbody>


                <?php if(!empty($data)): ?>


                    <?php foreach($data as $key => $schedule): ?>


                        <tr>


                            <td class="text-center">

                                <?= $key + 1 ?>

                            </td>



                            <td>

                                <?= htmlspecialchars($schedule->doctor_name) ?>

                            </td>



                            <td>

                                <?= htmlspecialchars($schedule->specialization) ?>

                            </td>



                            <td>

                                <?= htmlspecialchars($schedule->day_of_week) ?>

                            </td>



                            <td class="text-center">

                                <?= date("h:i A", strtotime($schedule->start_time)) ?>

                            </td>



                            <td class="text-center">

                                <?= date("h:i A", strtotime($schedule->end_time)) ?>

                            </td>




                            <td class="text-center">


                                <?php if($schedule->is_active): ?>


                                    <span class="badge bg-success">

                                        Active

                                    </span>


                                <?php else: ?>


                                    <span class="badge bg-danger">

                                        Inactive

                                    </span>


                                <?php endif; ?>


                            </td>




                            <td class="text-center">


                                <div class="btn-group btn-group-sm">


                                    <a href="<?= $base_url ?>/schedule/edit/<?= $schedule->id ?>"
                                       class="btn btn-outline-primary"
                                       title="Edit">


                                        <i class="bi bi-pencil-square"></i>


                                    </a>



                                    <!--
                                    <a href="<?= $base_url ?>/schedule/delete/<?= $schedule->id ?>"
                                       class="btn btn-outline-danger"
                                       onclick="return confirm('Are you sure?')"
                                       title="Delete">


                                        <i class="bi bi-trash"></i>


                                    </a>
                                    -->


                                </div>


                            </td>



                        </tr>


                    <?php endforeach; ?>



                <?php else: ?>


                    <tr>

                        <td colspan="8"
                            class="text-center text-muted py-4">

                            No Schedule Found.

                        </td>

                    </tr>


                <?php endif; ?>



                </tbody>



            </table>


        </div>


    </div>


</div>