<?php
    include "DB/db.php";
    include "Controller/userController";
    include "Components/header.php";
?>

<main class="form-signin w-100 m-auto">
    <form method="POST">
        <img class="mb-4" src="https://www.sfc.ac.in/images/college-logo.png" alt="" width="120" height="60">
        <h1 class="h3 mb-3 fw-normal"><b>REGISTER</b></h1>
        <div class="form-floating">
            <input type="text" name="username" id="floatingUsername" placeholder="Username">
        </div>
        <div class="form-floating">
            <input type="email" required pattern=".+@sfc.ac.in" title="The mail id must contain sfc domain"
                name="email" id="name" placeholder="email"><br><br>
        </div>
        <div class="form-floating">
            <input type="password" name="password" id="floatingPassword" placeholder="Password">
        </div>
        <div class="form-floating">
            <input type="password" id="floatingPassword" placeholder="confirmPassword">
        </div>
        <button type="submit" name="register"
            class="btn btn-outline darkBack accentColor mt-3 ">Register</button>
    </form>
</main>

<?php
    include "Components/footer.php"
?>