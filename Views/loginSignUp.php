<?php
    include "../DB/db.php";
    include "../Controller/userController.php";
    include "Components/header.php";
?>

<div class="container my-3 d-flex justify-content-center" style="height: 100%;">
    <form method="POST" class="accentBack rounded-3 p-3 w-30 my-auto">
        <h2 class="text-center darkColor my-3">Sign Up</h2>
        <input type="text" name="username" placeholder="Username" class="form-control mb-2">
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Email" title="The mail id must contain sfc domain"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@sfc.ac.in</span>
        </div>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2">
        <button type="submit" name="signup" class="btn btn-outline-dark mt-3 ">Sign In</button>
    </form>
</div>

<div class="container my-3 d-flex justify-content-center" style="height: 100%;">
    <form method="POST" class="accentBack rounded-3 p-3 w-30 my-auto">
        <h2 class="text-center darkColor my-3">Log In</h2>
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Email" title="The mail id must contain sfc domain"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@sfc.ac.in</span>
        </div>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2">
        <button type="submit" name="login" class="btn btn-outline-dark mt-3 ">Login</button>
    </form>
</div>

<?php
    include "Components/footer.php"
?>