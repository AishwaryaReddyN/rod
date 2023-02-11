<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/hallController.php";
include $absoluteDir . "classes/calendar.php";

use Rod\Calendar\Calendar as Calendar;

// Calendar Setup
// Create the calendar object
$calendar = new Calendar;
$calendar->addTableClasses('rounded-3');
// Set the start date to Monday
$calendar->useMondayStartingDate();
// Use the initial day names
$calendar->useInitialDayNames();
// Add Events
$events = array();
if (isset($_REQUEST["searchHalls"])) {
    foreach ($hallBookings as $hallBooking) {
        $events[] = array(
            'start' => $hallBooking['date'],
            'end' => $hallBooking['date'],
            'summary' => $hallBooking['time'],
            'mask' => true,
            'classes' => ['bg-danger-subtle', 'rounded-3', 'fw-bold', 'text-dark']
        );
    }
}
$calendar->addEvents($events);
?>

<!-- Hero Banner -->
<div class="bg-danger-subtle text-center py-5">
    <div class="mt-5">
        <i class="fa-solid fa-people-roof fa-3x primaryColor align-self-center"></i>
        <h1 class="mt-3 fw-bolder">Hall Bookings</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, deleniti?</p>
    </div>
</div>

<!-- Filter -->
<div class="container py-5">
    <div class="bg-danger-subtle rounded-3 p-3">
        <h3 class="fw-light mb-3">Search the available halls</h3>
        <form method="POST">
            <label class="fw-bold">Hall Name</label>
            <select class="form-select" name="hallName">
                <option value="auditorium" selected>Auditorium</option>
                <option value="capitanio">Capitanio Hall</option>
                <option value="gerosa">Gerosa Hall</option>
                <option value="quadrangle">Quadrangle</option>
            </select>
            <button class="btn btn-danger mt-3" name="searchHalls">Search</button>
        </form>
    </div>
</div>

<div class="container pb-5">
    <?php echo $calendar->draw(date('Y-m-d'), 'red'); ?>
    <div class="mt-3">
        <form method="POST">
            <input type="hidden" name="hallName" value="<?php echo $hallName; ?>">
            <div class="row">
                <div class="col-6">
                    <label class="fw-bold">Date</label>
                    <input type="date" class="form-control" name="hallBookingDate">
                </div>
                <div class="col-6">
                    <label class="fw-bold">Time Slot</label>
                    <select class="form-select" name="hallBookingTime">
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
                <input type="text" name="hallBookingPurpose" placeholder="Describe the purpose in few words" class="form-control">
            </div>
            <button class="btn btn-danger mt-3" name="hallSearch">Book Hall</button>
        </form>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>