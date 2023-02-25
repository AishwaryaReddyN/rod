<!-- Filter -->
<div class="container my-3">
    <div class="darkBack rounded-3 p-3">
        <h4 class="mb-3 text-white"><i class="fa-solid fa-people-roof primaryColor align-self-center me-2"></i>
            Choose a Venue</h4>
        <form method="POST">
            <select class="form-select" name="hallName">
                <option value="auditorium" <?php if (isset($_SESSION['hallName']) && $_SESSION['hallName'] == 'auditorium') {
                                                echo 'selected';
                                            } ?>>Auditorium</option>
                <option value="capitanio" <?php if (isset($_SESSION['hallName']) && $_SESSION['hallName'] == 'capitanio') {
                                                echo 'selected';
                                            } ?>>Capitanio Hall</option>
                <option value="gerosa" <?php if (isset($_SESSION['hallName']) && $_SESSION['hallName'] == 'gerosa') {
                                            echo 'selected';
                                        } ?>>Gerosa Hall</option>
                <option value="quadrangle" <?php if (isset($_SESSION['hallName']) && $_SESSION['hallName'] == 'quadrangle') {
                                                echo 'selected';
                                            } ?>>Quadrangle</option>
            </select>

            <button class="btn btn-outline-light mt-3" name="searchHalls">Search</button>
        </form>
    </div>
</div>

<div class="container my-3">
    <?php if (!empty($searchedHalls)) {
        echo $calendar->draw(date('Y-m-d', strtotime($_SESSION['currentMonth'] . ' month')), 'blue');
    } ?>
    <?php if (isset($_REQUEST['hallBookingDate'])) { ?>
        <div class="mt-3 lightAccentBack p-3 rounded-3">
            <form method="POST">
                <div class="row">
                    <div class="col-6">
                        <label class="fw-bold">Date</label>
                        <input type="text" readonly class="form-control" name="hallBookingDate" value="<?php if (isset($_REQUEST['hallBookingDate'])) {
                                                                                                            echo $_REQUEST['hallBookingDate'];
                                                                                                        } ?>">
                    </div>
                    <div class="col-6">
                        <label class="fw-bold">Time Slot</label>
                        <select class="form-select" name="hallBookingTime" required>
                            <option value="8:00-8:50" selected>8:00-8:50</option>
                            <option value="8:50-9:40">8:50-9:40</option>
                            <option value="9:40-10:30">9:40-10:30</option>
                            <option value="10:30-11:20">10:30-11:20</option>
                            <option value="11:20-12:10">11:20-12:10</option>
                            <option value="12:10-13:00">12:10-13:00</option>
                            <option value="13:00-13:50">13:00-13:50</option>
                            <option value="13:50-14:40">13:50-14:40</option>
                            <option value="14:40-15:30">14:40-15:30</option>
                            <option value="15:30-16:20">15:30-16:20</option>
                            <option value="16:20-17:00">16:20-17:00</option>
                        </select>

                    </div>
                </div>
                <div class="mt-3">
                    <label class="fw-bold">Purpose</label>
                    <input type="text" name="hallBookingPurpose" required placeholder="Describe the purpose in few words" class="form-control">
                </div>
                <button class="btn btn-danger mt-3" name="bookHall">Book Hall</button>
            </form>
        </div>
    <?php } ?>
</div>