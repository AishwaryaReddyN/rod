<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/userController.php";
?>

<style>
  #loginBgImage {
    background-image: url(<?php echo $_ENV['BASE_DIR'] . 'assets/images/quadrangle-blur.jpg'?>); /* The image used */
    height: 100%; /* You must set a specified height */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
  }
</style>

<div
  id="loginBgImage"
  class="d-flex align-items-center justify-content-center"
  style="min-height: 85vh"
>
  <div>
    <!-- Alerts -->
    <?php include $absoluteDir . "views/components/alert.php"; ?>

    <?php if (isset($_REQUEST['userType']) && $_REQUEST['userType'] == 'newUser') { ?>
    <form
      method="POST"
      class="loginBack shadow rounded-3 p-3 w-30"
    >
      <h2 class="text-center darkColor my-3">Sign Up</h2>
      <input
        type="text"
        required
        name="username"
        placeholder="Username"
        class="form-control mb-2"
      />
      <div class="mb-2">
        <div class="input-group">
          <input
            type="text"
            required
            name="email"
            class="form-control"
            placeholder="Email"
            title="The mail id must contain sfc domain"
          />
          <span class="input-group-text">@sfc.ac.in</span>
        </div>
      </div>
      <input
        type="password"
        required
        name="password"
        placeholder="Password"
        class="form-control mb-2"
      />
      <select
        class="form-select"
        required
        name="dept"
        aria-label="Default select example"
      >
        <option value="BC">BIOCHEMISTRY</option>
        <option value="BT">BIOTECHNOLOGY</option>
        <option value="BMS">BMS</option>
        <option value="BOTANY">BOTANY</option>
        <option value="B.VOC">B.VOC</option>
        <option value="CHEMISTRY">CHEMISTRY</option>
        <option value="COMMERCE">COMMERCE</option>
        <option value="CS">COMPUTER SCIENCE</option>
        <option value="ECONOMICS">ECONOMICS</option>
        <option value="ELECTRONICS">ELECTRONICS</option>
        <option value="EVS">ENVIRONMENTAL SCIENCES</option>
        <option value="ENG">ENGLISH</option>
        <option value="FRENCH">FRENCH</option>
        <option value="HINDI">HINDI</option>
        <option value="HISTORY">HISTORY</option>
        <option value="MASSCOM">MASS COMMUNICATION</option>
        <option value="MATHS">MATHEMATICS</option>
        <option value="MICROBIOLOGY">MICROBIOLOGY</option>
        <option value="NUTRITION">NUTRITION</option>
        <option value="PHYSICS">PHYSICS</option>
        <option value="PS">POLITICAL SCIENCE</option>
        <option value="PUBLICADMIN">PUBLIC ADMINISTRATION</option>
        <option value="SANSKRIT">SANSKRIT</option>
        <option value="SOCIALMANAGEMENT">SOCIAL MANAGEMENT</option>
        <option value="STATISTICS">STATISTICS</option>
        <option value="TELUGU">TELUGU</option>
        <option value="ZOOLOGY">ZOOLOGY</option>
      </select>
      <button type="submit" name="signup" class="btn btn-outline-dark my-3">
        Sign Up
      </button>
      <p class="text-black-50">
        Already have an account?
        <a
          href="<?php echo $_ENV['BASE_DIR'] . 'views/loginSignup.php' ?>"
          class="primaryColor text-decoration-none"
          >Login Now</a
        >
      </p>
    </form>
    <?php } else { ?>
    <form method="POST" class="loginBack shadow rounded-3 p-3 w-30 my-auto">
      <h2 class="text-center darkColor my-3">Log In</h2>
      <input
        type="text"
        class="form-control mb-2"
        name="email"
        placeholder="Email"
        title="The mail id must contain sfc domain"
      />
      <input
        type="password"
        name="password"
        placeholder="Password"
        class="form-control mb-2"
      />
      <button
        type="submit"
        name="login"
        class="btn btn-outline-dark my-3 d-block"
      >
        Login
      </button>
      <p class="text-black-50">
        Don't have an account yet?
        <a
          href="<?php echo $_ENV['BASE_DIR'] . 'views/loginSignup.php?userType=newUser' ?>"
          class="primaryColor text-decoration-none"
          >Signup Now</a
        >
      </p>
    </form>
    <?php } ?>
  </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>
