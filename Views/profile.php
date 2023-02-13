<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/userController.php";
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
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#appointments" type="button"
                role="tab" aria-selected="true">Appointments</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#halls"
                type="button" role="tab" aria-selected="false">Hall Bookings</button>
            <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#announcements"
                type="button" role="tab" aria-selected="false">Announcements</button>
        </div>
        <div class="tab-content w-100 p-2">
            <div class="tab-pane fade show active" id="appointments" role="tabpanel">
                <h3>Booked Appointments</h3>
                <hr>
                <table class="table table-dark table-hover rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hall</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="halls" role="tabpanel">Halls</div>
            <div class="tab-pane fade" id="announcements" role="tabpanel">Announcements</div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>