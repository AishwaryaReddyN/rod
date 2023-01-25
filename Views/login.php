<?php
    include "../DB/db.php";
    include "Controller/userController";
    include "Components/header.php";
?>
<div class="container">
    <main class="form-signin w-100 m-auto">
        <form >
            <h1 class="h3 mb-3 fw-normal"><b>SIGN IN</b></h1>

            <div class="form-floating">
            <input type="email" name="email" required pattern=".+@sfc.ac.in" title="The mail id must contain sfc domain" name="email" id="name" placeholder="email"><br><br>
            </div>
            <div class="form-floating">
                <input type="password" name="password" id="floatingPassword" placeholder="Password">
            </div><br>
            <p>Don't have an account? <a href="register.php">REGISTER HERE</a></p>
            <button class="w-15 btn btn-lg darkBack accentColor" type="submit">Sign in</button>
        </form>
    </main>
</div>

<?php
    include "Components/footer.php"
?>