<!-- Navigation -->
<div class="container py-3">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/ROD" class="mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://www.sfc.ac.in/images/college-logo.png" style="width: 11rem;">
        </a>

        <div class="container d-flex align-tems-center justify-content-end">
            <a href="#" class="nav-link px-2 align-self-center text-secondary">Appointments</a>
            <a href="#" class="nav-link px-2 align-self-center text-secondary">HallBooking</a>
            <a href="#" class="nav-link px-2 align-self-center text-secondary">Announcements</a>
            <a href="#" class="nav-link px-2 align-self-center text-secondary me-3">FAQ</a>
            <?php if (!isset($_SESSION["username"])) { ?>
                <a href="Views/loginSignUp.php" class="btn btn-danger fw-bolder">Login/Signup</a>
            <?php }else{ ?>
                <form method="POST">
                    <a href="./Views/user.php" class="rounded-circle py-3 px-3 m-0 text-danger"><i class="fa-solid fa-user"></i></a>
                </form>
            <?php } ?>
        </div>
    </div>
</div>