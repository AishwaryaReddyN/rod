<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="<?php echo ($_ENV['BASE_DIR']) ?>" class="navbar-brand mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://www.sfc.ac.in/images/college-logo.png" style="width: 11rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarContent" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex-lg align-tems-center justify-content-end" id="navBarContent">
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/appointments.php') ?>" class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">Appointments</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/hallBookings.php') ?>" class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">Bookings</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/announcements.php') ?>" class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">Announcements</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/faq.php') ?>" class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary me-3">FAQ</a>
            <?php if (!isset($_SESSION["username"])) { ?>
                <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/loginSignup.php') ?>" class="btn btn-outline-dark fw-bolder">Login/Signup</a>
            <?php } else { ?>
                <form method="POST">
                    <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/dashboard.php') ?>" class="btn btn-outline-danger text-decoration-none"><i class="fa-solid fa-user me-2"></i>
                        <?php echo ucwords($_SESSION['username']); ?>
                    </a>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>