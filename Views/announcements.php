<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/announcementController.php";
?>

<div style="min-height: 81vh;">
    <!-- Breadcrumbs -->
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $_ENV['BASE_DIR'] ?>" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item text-body-secondary" aria-current="page">Announcements</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <?php include $absoluteDir . "views/components/alert.php"; ?>
    </div>

    <div class="container">
        <div class="primaryLightAccentBack p-3 rounded-3">
            <h2 class="fw-bold"><i class="fa-solid fa-bullhorn primaryColor align-self-center me-2"></i>Schedule an Announcement</h2>
            <p>Make an announcement to everyone in college. You can schedule the announcement to be made on a certain date and time.</p>
        </div>
        <form method="POST" class="mt-3 lightAccentBack p-3">
            <div>
                <label class="fw-bold">Title</label>
                <input class="form-control" required name="announcementTitle" value="<?php echo !empty($existingAnnouncement) ? $existingAnnouncement['announcement_title'] : null; ?>">
            </div>
            <div class="my-3">
                <label class="fw-bold">Message</label>
                <textarea class="form-control" required name="announcementMessage" cols="30" rows="5"><?php echo !empty($existingAnnouncement) ? $existingAnnouncement['announcement_message'] : null; ?></textarea>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label class="fw-bold">Date</label>
                    <input type="date" required class="form-control" name="announcementDate" value="<?php echo !empty($existingAnnouncement) ? $existingAnnouncement['announcement_date'] : null; ?>">
                </div>
                <div class="col-6">
                    <label class="fw-bold">Time</label>
                    <input type="time" required class="form-control" name="announcementTime" value="<?php echo !empty($existingAnnouncement) ? $existingAnnouncement['announcement_time'] : null; ?>">
                </div>
            </div>
            <input type="text" hidden class="form-control" name="announcementId" value="<?php echo !empty($existingAnnouncement) ? $existingAnnouncement['announcement_id'] : null; ?>">
            <button type="submit" class="btn btn-danger mt-3" name="upsertAnnouncement" value="<?php echo !empty($existingAnnouncement) ? 'update' : 'create'; ?>" <?php echo !isset($_SESSION['username']) ? 'disabled' : null ?>><?php echo !empty($existingAnnouncement) ? 'Update' : 'Schedule'; ?></button>
        </form>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>