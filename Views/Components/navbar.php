<!-- Navigation -->
<div class="container py-3">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo ($_ENV['BASE_DIR']) ?>" class="mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://www.sfc.ac.in/images/college-logo.png" style="width: 11rem;">
        </a>

        <div class="container d-flex align-tems-center justify-content-end">
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/appointments.php') ?>" class="nav-link px-2 align-self-center text-secondary">Appointments</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/hallBookings.php') ?>" class="nav-link px-2 align-self-center text-secondary">HallBooking</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/announcements.php') ?>" class="nav-link px-2 align-self-center text-secondary">Announcements</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/faq.php') ?>" class="nav-link px-2 align-self-center text-secondary me-3">FAQ</a>
            <?php if (!isset($_SESSION["username"])) { ?>
                <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/loginSignup.php') ?>" class="btn btn-dark fw-bolder">Login/Signup</a>
            <?php } else { ?>
                <form method="POST">
                    <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/profile.php') ?>" class="btn btn-outline-danger text-decoration-none"><i class="fa-solid fa-user me-2"></i><?php echo $_SESSION['username']; ?></a>
                </form>
            <?php } ?>
        </div>
    </div>
</div>