<div class="col-lg-10 mx-auto">

    <div class="card card-outline card-primary shadow-sm">


        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">


                <h3 class="card-title mb-0">

                    Add Doctor Schedule

                </h3>



                <a href="<?= $base_url ?>/schedule/index"
                   class="btn btn-outline-primary btn-sm">


                    <i class="bi bi-table me-1"></i>
                    Show Table


                </a>


            </div>

        </div>




        <form method="post"
              action="<?= $base_url ?>/schedule/save">


            <div class="card-body">


                <div class="row">



                    <!-- Doctor -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Doctor

                        </label>



                        <select name="doctor_id"
                                class="form-select"
                                required>


                            <option value="">

                                Select Doctor

                            </option>



                            <?php foreach($doctors as $doctor): ?>


                                <option value="<?= $doctor->id ?>">


                                    <?= htmlspecialchars($doctor->doctor_name) ?>

                                    (<?= htmlspecialchars($doctor->specialization) ?>)


                                </option>


                            <?php endforeach; ?>


                        </select>


                    </div>





                    <!-- Status -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Status

                        </label>



                        <select name="is_active"
                                class="form-select">


                            <option value="1">

                                Active

                            </option>


                            <option value="0">

                                Inactive

                            </option>


                        </select>


                    </div>





                    <!-- Day -->

                    <div class="col-md-12 mb-3">


                        <label class="form-label d-block">

                            Day of Week

                        </label>



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


                            <div class="form-check form-check-inline">


                                <input class="form-check-input"
                                       type="checkbox"
                                       name="day_of_week[]"
                                       value="<?= $day ?>">



                                <label class="form-check-label">


                                    <?= $day ?>


                                </label>


                            </div>


                        <?php endforeach; ?>


                    </div>





                    <!-- Start Time -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Start Time

                        </label>



                        <input type="time"
                               class="form-control"
                               name="start_time"
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
                               required>


                    </div>



                </div>


            </div>





            <div class="card-footer">


                <button type="submit"
                        name="btn_submit"
                        class="btn btn-primary">


                    <i class="bi bi-save me-1"></i>

                    Save Schedule


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