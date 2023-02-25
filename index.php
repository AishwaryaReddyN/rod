<?php
include "baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
?>

<div class="container">
    <?php include $absoluteDir . "views/components/alert.php"; ?>
</div>
<!-- Hero Section -->
<div class="container d-flex align-items-center mt-5 mt-lg-0 text-cter" style="min-height: 85vh;">
    <div class="row">
        <div class="col-12 col-lg-3 d-flex align-items-center">
            <div class="text-center text-lg-start">
                <h1 class="primaryColor">Reception Office <b class="darkColor">Digitization</b></h1>
                <p>To keep up with generational trends and make offices future ready, an organization should have a
                    balance of Human Resources and digitization. It will not only lessen the burden for the
                    receptionist but also allows them to multitask.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 py-3">
            <img src="assets/images/heroimage.svg" class="img-fluid">
        </div>
        <div class="col-12 col-lg-3 d-flex align-items-center">
            <div>
                <div class="d-flex d-align-items-center justify-content-start my-5">
                    <i class="fa-solid fa-calendar-check fa-3x primaryColor align-self-center"></i>
                    <div>
                        <h4 class="ps-2 m-0 align-self-center darkColor fw-bold">Appointments</h4>
                        <h6 class="ps-2 m-0 align-self-center text-body-secondary">To book an appointment to meet the
                            principal </h6>
                    </div>
                </div>
                <div class="d-flex d-align-items-center justify-content-start my-5">
                    <i class="fa-solid fa-people-roof fa-3x primaryColor align-self-center"></i>
                    <div>
                        <h4 class="ps-2 m-0 align-self-center">Hall Bookings</h4>
                        <h6 class="ps-2 m-0 align-self-center text-body-secondary">To book the desired hall for events
                        </h6>
                    </div>
                </div>
                <div class="d-flex d-align-items-center justify-content-start my-5">
                    <i class="fa-solid fa-bullhorn fa-3x primaryColor align-self-center"></i>
                    <div>
                        <h4 class="ps-2 m-0 align-self-center">Announcements</h4>
                        <h6 class="ps-2 m-0 align-self-center text-body-secondary">Announcements made simpler </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>