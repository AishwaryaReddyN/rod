<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/baseController.php";
include $absoluteDir . "controller/profileController.php";
?>

<div class="container-fluid py-5" style="min-height: 94vh;">
    <div class="row">
        <div class="col-3">
            <div class="lightAccentBack p-3 rounded">
                <div class="text-center">
                    <img src="https://www.sfc.ac.in/images/college-logo.png" style="width: 11rem;">
                </div>
                <div class="nav flex-column nav-pills me-3 p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <form method="POST">
                        <button class="nav-link" name="dashboardShowData" value="hallBookings" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#halls" type="submit" role="tab" aria-selected="false">Hall
                            Bookings</button>
                        <button class="nav-link" name="dashboardShowData" value="announcements" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#announcements" type="submit" role="tab" aria-selected="false">Announcements</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-9"></div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>