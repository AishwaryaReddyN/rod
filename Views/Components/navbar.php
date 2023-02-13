<?php
// // This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
// function breadcrumbs($separator = ' &raquo; ', $home = 'Home')
// {
//     // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
//     $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//     // This will build our "base URL" ... Also accounts for HTTPS :)
//     // $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
//     $base = ($path['schema'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

//     // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
//     $breadcrumbs_array = array("<a href=\"$base\">$home</a>");

//     // Find out the index for the last value in our path array
//     $parts = array_keys(array_filter(explode('/', $path)));
//     $last = end($parts);

//     // Build the rest of the breadcrumbs
//     foreach ($path as $x => $crumb) {
//         // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
//         $title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));

//         if ($title != "Rod" && $title != 'Views') {
//             // If we are not on the last index, then display an <a> tag
//             if ($x != $last)
//                 $breadcrumbs_array[] = "<a href=\"$base$crumb\">$title</a>";
//             // Otherwise, just display the title (minus)
//             else
//                 $breadcrumbs_array[] = $title;
//         }
//     }

//     // Build our temporary array (pieces of bread) into one big string :)
//     return implode($separator, $breadcrumbs_array);
// }
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="<?php echo ($_ENV['BASE_DIR']) ?>" class="navbar-brand mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://www.sfc.ac.in/images/college-logo.png" style="width: 11rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarContent"
            aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex-lg align-tems-center justify-content-end" id="navBarContent">
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/appointments.php') ?>"
                class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">Appointments</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/hallBookings.php') ?>"
                class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">HallBooking</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/announcements.php') ?>"
                class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary">Announcements</a>
            <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/faq.php') ?>"
                class="nav-link py-2 py-lg-0 px-2 align-self-center text-secondary me-3">FAQ</a>
            <?php if (!isset($_SESSION["username"])) { ?>
                <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/loginSignup.php') ?>"
                    class="btn btn-dark fw-bolder">Login/Signup</a>
            <?php } else { ?>
                <form method="POST">
                    <a href="<?php echo ($_ENV['BASE_DIR'] . 'views/profile.php') ?>"
                        class="btn btn-outline-danger text-decoration-none"><i class="fa-solid fa-user me-2"></i>
                        <?php echo $_SESSION['username']; ?>
                    </a>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>