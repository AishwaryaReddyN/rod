<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/profileController.php";
?>

<div class="container" style="min-height: 85vh;">
    <div class="my-5 d-flex align-items-center justify-content-between">
        <h1>Hi <span class="primaryColor">
                <?php echo ($_SESSION["username"]) ?>
            </span></h1>
        <div class="d-flex aling-items-center justify-content-center">
            <form method="POST">
                <button class="btn btn-outline-dark" name="logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="d-flex align-items-start lightAccentBack p-3 rounded-3">
        <div class="nav flex-column nav-pills me-3 p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <form method="POST">
                <button class="nav-link" name="dashboardShowData" value="hallBookings" id="v-pills-profile-tab"
                    data-bs-toggle="pill" data-bs-target="#halls" type="submit" role="tab" aria-selected="false">Hall
                    Bookings</button>
                <button class="nav-link" name="dashboardShowData" value="announcements" id="v-pills-disabled-tab"
                    data-bs-toggle="pill" data-bs-target="#announcements" type="submit" role="tab"
                    aria-selected="false">Announcements</button>
            </form>
        </div>
        <div class="tab-content w-100 p-2">
            <div class="tab-pane fade show active" id="appointments" role="tabpanel">
                <h3>Booked Appointments</h3>
                <hr>
                <table class="table table-dark table-hover rounded-3">
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
            <div class="tab-pane fade" id="halls" role="tabpanel">Halls</div>
            <div class="tab-pane fade" id="announcements" role="tabpanel">Announcements</div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>