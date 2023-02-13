<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/announcementController.php";
?>

<div style="min-height: 75vh;">
    <!-- Breadcrumbs -->
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item text-body-secondary" aria-current="page">Announcements</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <?php
        if (isset($_REQUEST["error"])) {
            if ($_REQUEST["error"] == "notLoggedIn") {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Not Logged In!</strong> Please login and try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        } else if (isset($_REQUEST["message"])) {
            if ($_REQUEST["message"] == "announcementCreated") {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Announcement Created!</strong> Announcement will be made on the scheduled time.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
        ?>
    </div>

    <div class="container">
        <div class="darkBack text-white my-3 p-3 p-lg-5 rounded-3">
            <h4><i class="fa-solid fa-bullhorn primaryColor align-self-center me-2"></i>Make an
                announcement
            </h4>
            <form method="GET" class="mt-3">
                <div>
                    <label class="fw-bold">Message</label>
                    <textarea class="form-control" required name="announcementMessage" cols="30" rows="5"></textarea>
                </div>
                <div class="mt-3">
                    <label class="fw-bold">Time</label>
                    <input type="time" required class="form-control" name="announcementTime">
                </div>
                <button type="submit" class="btn btn-danger mt-3" name="createAnnouncement">Create</button>
            </form>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>