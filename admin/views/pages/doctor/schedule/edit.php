<div class="col-lg-10 mx-auto">


    <div class="card card-outline card-primary shadow-sm">



        <div class="card-header">


            <div class="d-flex justify-content-between align-items-center">


                <h3 class="card-title mb-0">

                    Update Doctor Schedule

                </h3>



                <a href="<?= $base_url ?>/schedule/index"
                   class="btn btn-outline-primary btn-sm">


                    <i class="bi bi-table me-1"></i>

                    Show Table


                </a>


            </div>


        </div>





        <form method="post"
              action="<?= $base_url ?>/schedule/update">



            <input type="hidden"
                   name="id"
                   value="<?= $data->id ?? '' ?>">





            <div class="card-body">


                <div class="row">



                    <!-- Doctor -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Doctor <span class="text-danger">*</span>

                        </label>



                        <select name="doctor_id"
                                class="form-select"
                                required>



                            <option value="">

                                Select Doctor

                            </option>



                            <?php foreach($doctors as $doctor): ?>


                                <option value="<?= $doctor->id ?>"
                                    <?= ($doctor->id == ($data->doctor_id ?? '')) ? 'selected' : '' ?>>


                                    <?= htmlspecialchars($doctor->doctor_name) ?>

                                    (<?= htmlspecialchars($doctor->specialization) ?>)


                                </option>



                            <?php endforeach; ?>



                        </select>


                    </div>





                    <!-- Day -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Day of Week

                        </label>



                        <select name="day_of_week"
                                class="form-select"
                                required>


                            <option value="">

                                Select Day

                            </option>



                            <?php

                            $days = [
                                "Saturday",
                                "Sunday",
                                "Monday",
                                "Tuesday",
                                "Wednesday",
                                "Thursday",
                                "Friday"
                            ];

                            foreach($days as $day):

                            ?>


                                <option value="<?= $day ?>"
                                    <?= ($data->day_of_week ?? '') == $day ? 'selected' : '' ?>>


                                    <?= $day ?>


                                </option>


                            <?php endforeach; ?>



                        </select>


                    </div>





                    <!-- Start Time -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Start Time

                        </label>



                        <input type="time"
                               class="form-control"
                               name="start_time"
                               value="<?= $data->start_time ?? '' ?>"
                               required>


                    </div>





                    <!-- End Time -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            End Time

                        </label>



                        <input type="time"
                               class="form-control"
                               name="end_time"
                               value="<?= $data->end_time ?? '' ?>"
                               required>


                    </div>





                    <!-- Status -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Status

                        </label>



                        <select name="is_active"
                                class="form-select">


                            <option value="1"
                                <?= ($data->is_active ?? '') == 1 ? 'selected' : '' ?>>


                                Active


                            </option>



                            <option value="0"
                                <?= ($data->is_active ?? '') == 0 ? 'selected' : '' ?>>


                                Inactive


                            </option>



                        </select>


                    </div>




                </div>


            </div>






            <div class="card-footer">



                <button type="submit"
                        name="btn_submit"
                        class="btn btn-primary">


                    <i class="bi bi-check-circle me-1"></i>

                    Update Schedule


                </button>





                <a href="<?= $base_url ?>/schedule/index"
                   class="btn btn-secondary">


                    <i class="bi bi-x-circle me-1"></i>

                    Cancel


                </a>



            </div>




        </form>



    </div>


</div>