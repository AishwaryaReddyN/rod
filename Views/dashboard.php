<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/baseController.php";
include $absoluteDir . "controller/dashboardController.php";
?>

<div class="container" style="min-height: 81vh;">

    <!-- Alerts -->
    <div class="container">
        <?php include $absoluteDir . "views/components/alert.php"; ?>
    </div>

    <div class="my-5 d-flex align-items-center justify-content-between">
        <h1 class="m-0">Hi <span class="primaryColor">
                <?php echo isset($_SESSION["username"]) ? ucwords($_SESSION["username"]) : null ?>
            </span></h1>
        <div class="d-flex aling-items-center justify-content-center">
            <form method="POST">
                <button class="btn btn-outline-dark" name="logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="d-sm-flex align-items-start">
        <div class="nav flex-column nav-pills me-3 p-3 rounded shadow" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button type="submit" class="nav-link <?php echo $dashboardData ? 'active' : null ?>" data-bs-toggle="pill" data-bs-target="#dashboard" role="tab" aria-selected="false">Dashboard</button>
            <form method="POST">
                <button type="submit" class="nav-link w-100 <?php echo $bookingData ? 'active' : null ?>" name="dashboardShowData" value="hallBookings" id="v-pills-profile-tab" data-bs-toggle="pill" ] data-bs-target="#halls" role="tab" aria-selected="false">Bookings
                </button>
                <button type="submit" class="nav-link w-100 <?php echo $announcementData ? 'active' : null ?>" name="dashboardShowData" value="announcements" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#announcements" role="tab" aria-selected="false">Announcements</button>
            </form>
        </div>
        <div class="tab-content w-100 mt-5 mt-lg-0">
            <div class="tab-pane fade <?php echo $dashboardData ? 'active show' : null ?>" id="dashboard" role="tabpanel">
                <div class="shadow p-3 rounded">
                    <h4>Latest Announcements</h4>
                    <div>
                        <?php if (!empty($latestAnnouncements)) { ?>
                            <?php foreach ($latestAnnouncements as $announcement) { ?>
                                <div class="my-3 primaryLightAccentBack p-3 rounded-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5>
                                            <?php echo $announcement['announcement_title']; ?>
                                        </h5>
                                        <p>
                                            <?php echo $announcement['announcement_message']; ?>
                                        </p>
                                    </div>
                                    <p>
                                        <?php echo $announcement['announcement_time']; ?><i class="fa-regular fa-hourglass-half ms-2 text-danger"></i>
                                    </p>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="my-3 lightAccentBack p-3 rounded-3">
                                <h5 class="fw-bold">No Announcements</h5>
                                <p>There are no announcements. Please check again later.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="my-5 shadow p-3 rounded">
                    <h4>Latest Bookings</h4>
                    <?php if (!empty($latestBookings)) { ?>
                        <div class="row">
                            <?php foreach ($latestBookings as $hallName => $hallBookingsData) { ?>
                                <div class="col-12 col-lg-6 my-3">
                                    <div class="shadow p-3">
                                        <h5 class="text-danger">
                                            <?php echo ucwords($hallName) ?>
                                        </h5>
                                        <?php if (mysqli_num_rows($hallBookingsData) > 0) {
                                            foreach ($hallBookingsData as $hbd) { ?>
                                                <div class="lightAccentBack p-2 my-2 rounded">
                                                    <h5 class="mb-0">
                                                        <?php echo $hbd["hall_booking_purpose"] ?>
                                                    </h5>
                                                    <small>
                                                        <?php echo $hbd["hall_booking_time"] ?>
                                                    </small>
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
                            <p>There are no bookings. Please check again later.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade <?php echo $bookingData ? 'active show' : null ?>" id="halls" role="tabpanel">
                <h3>Booked Venues</h3>

                <!-- Search Bookings -->
                <div class="accordion mb-3 dashboardAccordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header rounded-3">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#hallBookingSearch" aria-expanded="true" aria-controls="collapseOne">
                                Search Booking
                            </button>
                        </h2>
                        <div id="hallBookingSearch" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body lightBack">
                                <form method="POST" class="d-flex align-items-center justify-content-between">
                                    <input type="text" placeholder="Booking Id" name="bookingId" class="form-control rounded-0 rounded-start border-end-0">
                                    <button type="submit" name="searchBooking" class="btn border border-start-0 rounded-0 rounded-end">
                                        <i class="fa-solid fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($allHallBookings && mysqli_num_rows($allHallBookings) > 0) { ?>
                    <div class="table-responsive">
                        <table class="table shadow rounded-3">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Booking Id</th>
                                    <th scope="col">Hall Name</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Booking Time</th>
                                    <th scope="col">Booking Purpose</th>
                                    <?php if ($_SESSION['username'] == "admin") { ?>
                                        <th scope="col">Booked By</th>
                                    <?php } ?>
                                    <th scope="col">Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allHallBookings as $key => $hb) {
                                    $bookingCompleted = false;
                                    if (strtotime($hb['hall_booking_date']) < strtotime(date('Y-m-d'))) {
                                        $bookingCompleted = true;
                                    } else if (strtotime($hb['hall_booking_date']) == strtotime(date('Y-m-d'))) {
                                        if (strtotime($hb['hall_booking_time']) < strtotime(date('H:i:s'))) {
                                            $bookingCompleted = true;
                                        }
                                    }
                                ?>
                                    <tr class="<?php echo $bookingCompleted ? 'darkAccentBack' : null ?>">
                                        <th><?php echo $hb['booking_id'] ?></th>
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
                                        <?php if (!empty($hb['email'])) { ?>
                                            <td>
                                                <?php echo $hb['email'] ?>
                                            </td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <?php if (!$bookingCompleted) { ?>
                                                <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/hallBookings.php?hallBookingId=' . $hb['booking_id']) ?>" class="btn btn-sm btn-dark my-1"><i class="fa-solid fa-pencil"></i></a>
                                                <button type="button" class="btn btn-sm btn-danger my-1" data-bs-toggle="modal" data-bs-target="#bookingDeleteModal" onclick="addDeleteId('bookingDeleteKey', <?php echo $hb['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                                            <?php } else { ?>
                                                <p class="m-0 text-danger">Closed</p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <!-- Booking Delete Confirmation Modal -->
                            <div class="modal modal-alert fade" tabindex="-1" role="dialog" id="bookingDeleteModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-3 shadow">
                                        <div class="modal-body p-4 text-center">
                                            <h5 class="mb-0">Confirm Delete?</h5>
                                            <p class="mb-0">This action is irreverisble.</p>
                                        </div>
                                        <div class="modal-footer flex-nowrap p-0">
                                            <form method="POST" class="w-100 d-flex m-0 p-0">
                                                <input type="text" hidden id="bookingDeleteKey" name="hallBookingId">
                                                <button type="submit" class="btn bg-danger text-white btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" name="deleteHallBooking"><strong>Yes,
                                                        Delete</strong></button>
                                                <button type="button" class="btn bg-light text-body-secondary btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No, Go Back</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="lightAccentBack p-3 rounded-3">
                        <h5 class="fw-bold">No Bookings</h5>
                        <p>There are no Venues booked by you. Click <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/hallBookings.php') ?>" class="text-decoration-none primaryColor fw-bold">here</a> to book a venue now</p>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade <?php echo $announcementData ? 'active show' : null ?>" id="announcements" role="tabpanel">
                <h3>Announcements</h3>

                <!-- Search Announcements -->
                <div class="accordion mb-3 dashboardAccordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header rounded-3">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#announcementSearch" aria-expanded="true" aria-controls="collapseOne">
                                Search Announcement
                            </button>
                        </h2>
                        <div id="announcementSearch" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body lightBack">
                                <form method="POST" class="d-flex align-items-center justify-content-between">
                                    <input type="text" placeholder="Announcement Id" name="announcementId" class="form-control rounded-0 rounded-start border-end-0">
                                    <button type="submit" name="searchAnnouncement" class="btn border border-start-0 rounded-0 rounded-end">
                                        <i class="fa-solid fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <?php if ($allAnnouncements && mysqli_num_rows($allAnnouncements) > 0) {
                        foreach ($allAnnouncements as $announcement) {
                            $announcementCompleted = false;
                            if (strtotime($announcement['announcement_date']) < strtotime(date('Y-m-d'))) {
                                $announcementCompleted = true;
                            } else if (strtotime($announcement['announcement_date']) == strtotime(date('Y-m-d'))) {
                                if (strtotime($announcement['announcement_time']) < strtotime(date('H:i:s'))) {
                                    $announcementCompleted = true;
                                }
                            }
                    ?>
                            <div class="my-3 <?php echo $announcementCompleted ? 'darkAccentBack' : null ?> p-3 shadow rounded-3 d-block d-lg-flex align-items-center justify-content-between">
                                <div>
                                    <small class="d-block text-body-tertiary"><?php echo $announcement['announcement_id']; ?></small>
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="m-0">
                                            <?php echo $announcement['announcement_title']; ?>
                                        </h5>
                                        <small class="badge text-bg-danger ms-2"><?php echo $announcementCompleted ? 'completed' : null ?></small>
                                    </div>
                                    <p>
                                        <?php echo $announcement['announcement_message']; ?>
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <p>
                                            <i class="fa-regular fa-calendar text-body-tertiary"></i>
                                            <?php echo $announcement['announcement_date']; ?>
                                        </p>
                                        <p class="ms-2">
                                            <i class="fa-regular fa-hourglass-half text-body-tertiary"></i>
                                            <?php echo $announcement['announcement_time'];
                                            ?>
                                        </p>
                                        <?php if (!empty($announcement['email'])) { ?>
                                            <p class="ms-2">
                                                <i class="fa-solid fa-envelope text-body-tertiary"></i>
                                                <?php echo $announcement['email'] ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div>
                                    <?php if (!$announcementCompleted) { ?>
                                        <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/announcements.php?announcementId=' . $announcement['announcement_id']) ?>" class="btn btn-sm btn-dark"><i class="fa-solid fa-pencil"></i></a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#announcementDeleteModal" onclick="addDeleteId('announcementDeleteKey', <?php echo $announcement['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Announcement Delete Confirmation Modal -->
                            <div class="modal modal-alert fade" tabindex="-1" role="dialog" id="announcementDeleteModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-3 shadow">
                                        <div class="modal-body p-4 text-center">
                                            <h5 class="mb-0">Confirm Delete?</h5>
                                            <p class="mb-0">This action is irreverisble.</p>
                                        </div>
                                        <div class="modal-footer flex-nowrap p-0">
                                            <form method="POST" class="w-100 d-flex m-0 p-0">
                                                <input type="text" hidden id="announcementDeleteKey" name="announcementId">
                                                <button type="submit" class="btn bg-danger text-white btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" name="deleteAnnouncement"><strong>Yes, Delete</strong></button>
                                                <button type="button" class="btn bg-light text-body-secondary btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No, Go Back</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="my-3 lightAccentBack p-3 rounded-3">
                            <h5 class="fw-bold">No Announcements</h5>
                            <p>There are no announcements scheduled by you. Click <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/announcements.php') ?>" class="text-decoration-none primaryColor fw-bold">here</a> to create an announcement now</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>