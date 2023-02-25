<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/hallController.php";
include $absoluteDir . "classes/calendar.php";

use Rod\Calendar\Calendar as Calendar;

// Calendar Setup
// Create the calendar object
$calendar = new Calendar;
// $calendar->useMonthView();
$calendar->addTableClasses('rounded-3');
// Set the start date to Monday
$calendar->useMondayStartingDate();
// Use the initial day names
$calendar->useInitialDayNames();
// Add Events
$events = array();
if (isset($_REQUEST["searchHalls"])) {
    foreach ($searchedHalls as $searchedHalls) {
        $events[] = array(
            'start' => $searchedHalls['hall_booking_date'],
            'end' => $searchedHalls['hall_booking_date'],
            'mask' => true,
            'classes' => ['bg-secondary-subtle', 'rounded-3', 'fw-bold', 'text-dark']
        );
    }
}
$calendar->addEvents($events);

$allTimeSlots = ["8:00-8:50", "8:50-9:40", "9:40-10:30", "10:30-11:20", "11:20-12:10", "12:10-13:00", "13:00-13:50", "13:50-14:40", "14:40-15:30", "15:30-16:20", "16:20-17:00"];
?>

<div style="min-height: 81vh;">
    <!-- Breadcrumbs -->
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $_ENV['BASE_DIR'] ?>" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item text-body-secondary" aria-current="page">Bookings</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <?php include $absoluteDir . "views/components/alert.php"; ?>
    </div>

    <div class="container">
        <div class="primaryLightAccentBack p-3 rounded-3">
            <h2 class="fw-bold"><i class="fa-solid fa-bookmark primaryColor align-self-center me-2"></i>Book a Venue</h2>
            <p class="text-body-secondary">Choose a venue, fix the date and make a booking.</p>
        </div>

        <div class="accordion accordion-flush lightAccentBack p-3 rounded mt-3 mb-5">
            <div class="accordion-item">
                <h1 class="accordion-header" id="flush-headingOne">
                    <h3 class="accordion-button <?php echo !empty($_SESSION['hallName']) ? 'collapsed' : null; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="fa-solid fa-people-roof primaryColor align-self-center me-2"></i>
                        Choose the Venue
                    </h3>
                </h1>
                <div id="flush-collapseOne" class="accordion-collapse collapse <?php echo empty($_SESSION['hallName']) ? 'show' : null; ?>" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body lightAccentBack">
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

                            <button class="btn btn-outline-dark mt-3" name="searchHalls">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item" disabled>
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fa-solid fa-cloud-sun primaryColor align-self-center me-2"></i> Fix the date
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse <?php echo !empty($_SESSION['hallName']) ? 'show' : null; ?>" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php if (!empty($searchedHalls)) {
                            echo $calendar->draw(date('Y-m-d', strtotime($_SESSION['currentMonth'] . ' month')), 'blue');
                        } ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <i class="fa-solid fa-square-check primaryColor align-self-center me-2"></i> Make Booking
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse <?php echo !empty($_REQUEST['hallBookingDate']) ? 'show' : null; ?>" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <label class="fw-bold">Date</label>
                                    <input type="text" readonly class="form-control lightAccentBack" name="hallBookingDate" value="<?php echo isset($_REQUEST['hallBookingDate']) ? $_REQUEST['hallBookingDate'] : 'No Date Selected'; ?>">
                                </div>
                                <div class="col-6">
                                    <label class="fw-bold">Time Slot</label>
                                    <select class="form-select" name="hallBookingTime" required>
                                        <?php foreach ($allTimeSlots as $ats) {
                                            if (!empty($bookedTimeSlots)) {
                                                if (!in_array($ats, $bookedTimeSlots)) { ?>
                                                    <option value="<?php echo $ats; ?>"><?php echo $ats; ?></option>
                                                <?php } else { ?>
                                                    <option disabled class="lightAccentBack primaryColor" value="<?php echo $ats; ?>"><?php echo $ats; ?></option>
                                                <?php }
                                            } else { ?>
                                                <option value="<?php echo $ats; ?>"><?php echo $ats; ?></option>}
                                        <?php }
                                        } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="fw-bold">Purpose</label>
                                <input type="text" name="hallBookingPurpose" required placeholder="Describe the purpose in few words" class="form-control">
                            </div>
                            <button class="btn btn-danger mt-3" name="bookHall">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>