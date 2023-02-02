<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/userController.php";
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
$events[] = array(
    'start' => '2023-02-14',
    'end' => '2023-02-14',
    'summary' => 'CSE',
    'mask' => true,
    'classes' => ['bg-danger-subtle', 'rounded-3', 'fw-bold', 'text-dark']
);
$calendar->addEvents($events);
?>

<div class="container my-5">
    <?php echo $calendar->draw(date('Y-m-d'), 'red'); ?>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>