<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/userController.php";
?>

<div class="d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div>
        <?php
        if (isset($_REQUEST["error"])) {
            if ($_REQUEST["error"] == "wrongPassword") {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Wrong Password!</strong> Please try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            } else if ($_REQUEST["error"] == "userDoesNotExist") {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>User Doesn't Exists!</strong> Please Signup.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            } else if ($_REQUEST["error"] == "userAlreadyExists") {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>User Already Exists!</strong> Please login.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
        ?>
        <?php if (isset($_REQUEST['userType']) && $_REQUEST['userType'] == 'newUser') { ?>
            <form method="POST" class="secondaryBack rounded-3 p-3 w-30">
                <h2 class="text-center darkColor my-3">Sign Up</h2>
                <input type="text" name="username" placeholder="Username" class="form-control mb-2">
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" title="The mail id must contain sfc domain">
                        <span class="input-group-text">@sfc.ac.in</span>
                    </div>
                    <small class="ms-1 text-muted"><span class="primaryColor">Note: </span>Input the Email Id before @sfc.ac.in</small>
                </div>
                <input type="password" name="password" placeholder="Password" class="form-control mb-2">
                <input type="text" name="dept" placeholder="Department" class="form-control mb-2">
                <button type="submit" name="signup" class="btn btn-outline-dark my-3">Sign Up</button>
                <p class="text-muted">Already have an account? <a href="<?php echo  $_ENV['BASE_DIR'] . 'views/loginSignup.php' ?>" class="primaryColor text-decoration-none">Login Now</a></p>
            </form>
        <?php } else { ?>
            <form method="POST" class="secondaryBack rounded-3 p-3 w-30 my-auto">
                <h2 class="text-center darkColor my-3">Log In</h2>
                <input type="text" class="form-control mb-2" name="email" placeholder="Email" title="The mail id must contain sfc domain">
                <input type="password" name="password" placeholder="Password" class="form-control mb-2">
                <button type="submit" name="login" class="btn btn-outline-dark my-3 d-block">Login</button>
                <p class="text-muted">Don't have an account yet? <a href="<?php echo  $_ENV['BASE_DIR'] . 'views/loginSignup.php?userType=newUser' ?>" class="primaryColor text-decoration-none">Signup Now</a></p>
            </form>
        <?php } ?>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>