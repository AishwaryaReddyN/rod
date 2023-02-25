<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/baseController.php";
include $absoluteDir . "controller/dashboardController.php";
?>

<div class="container" style="min-height: 81vh;">
    <div class="my-5 d-flex align-items-center justify-content-between">
        <h1 class="m-0">Hi <span class="primaryColor">
                <?php echo isset($_SESSION["username"]) ? ucwords($_SESSION["username"]) : null  ?>
            </span></h1>
        <div class="d-flex aling-items-center justify-content-center">
            <form method="POST">
                <button class="btn btn-outline-dark" name="logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="d-sm-flex align-items-start">
        <div class="nav flex-column nav-pills me-3 p-3 rounded shadow" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#dashboard" role="tab" aria-selected="false">Dashboard</button>
            <button class="nav-link" name="dashboardShowData" value="hallBookings" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#halls" role="tab" aria-selected="false">Hall
                Bookings</button>
            <button class="nav-link" name="dashboardShowData" value="announcements" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#announcements" role="tab" aria-selected="false">Announcements</button>
        </div>
        <div class="tab-content w-100 mt-5 mt-lg-0">
            <div class="tab-pane fade active show" id="dashboard" role="tabpanel">
                <div class="shadow p-3 rounded">
                    <h4>Today's Announcements</h4>
                    <div>
                        <?php if (!empty($todaysAnnouncements)) { ?>
                            <?php foreach ($todaysAnnouncements as $announcement) { ?>
                                <div class="my-3 primaryLightAccentBack p-3 rounded-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5><?php echo $announcement['announcement_title']; ?></h5>
                                        <p><?php echo $announcement['announcement_message']; ?></p>
                                    </div>
                                    <p><?php echo $announcement['announcement_time']; ?><i class="fa-regular fa-hourglass-half ms-2 text-danger"></i></p>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="my-3 lightAccentBack p-3 rounded-3">
                                <h5 class="fw-bold">No Announcements</h5>
                                <p>There are no announcements for today. Please check again later.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-3 shadow p-3 rounded">
                    <h4 class="mb-3">Today's Bookings</h4>
                    <?php if (!empty($todaysHallBookings)) { ?>
                        <div class="row">
                            <?php foreach ($todaysHallBookings as $hallName => $hallBookingsData) { ?>
                                <div class="col-12 col-lg-3">
                                    <div class="shadow p-3">
                                        <h5 class="text-danger"><?php echo ucwords($hallName) ?></h5>
                                        <?php if (mysqli_num_rows($hallBookingsData) > 0) {
                                            foreach ($hallBookingsData as $hbd) { ?>
                                                <div class="lightAccentBack p-2 my-2 rounded">
                                                    <h5 class="mb-0"><?php echo $hbd["hall_booking_purpose"] ?></h5>
                                                    <small><?php echo $hbd["hall_booking_time"] ?></small>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="lightAccentBack p-2 my-2 rounded">
                                                <h5 class="mb-0">No Bookings</h5>
                                                <small>There are no bookings for this hall today.</small>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="shadow p-3 lightAccentBack rounded">
                            <h5 class="fw-bold">No Bookings</h5>
                            <p>There are no bookings for today. Please check again later.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="halls" role="tabpanel">
                <h3>Booked Venues</h3>
                <hr>
                <table class="table table-hover rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hall Name</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Booking Time</th>
                            <th scope="col">Booking Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($allHallBookings && !empty($allHallBookings)) {
                            foreach ($allHallBookings as $hb) { ?>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <?php echo ucwords($hb['hall_name']); ?>
                                    </td>
                                    <td>
                                        <?php echo $hb['hall_booking_date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $hb['hall_booking_time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $hb['hall_booking_purpose']; ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="announcements" role="tabpanel">

            </div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>