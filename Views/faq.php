<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/userController.php";
?>

<!-- Breadcrumbs -->
<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $_ENV['BASE_DIR'] ?>" class="text-decoration-none text-dark">Home</a></li>
            <li class="breadcrumb-item text-body-secondary" aria-current="page">FAQ</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="p-3 darkBack rounded-3 text-white">
        <h3 class="mb-0"><i class="fa-solid fa-circle-question accentColor"></i> FAQ</h3>
    </div>
</div>

<div class="container my-3">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed rounded-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    How to apply for St. Francis College?
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><a href="https://www.sfc.ac.in/admissions.php" class="primaryColor text-decoration-none">Click
                            Here</a> for the submission of
                        application. The application fee is Rs.500/- for the candidates who are applying.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    How can I get admitted into St. Francis College?
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>For UG Program all the students must appear for the entrance exam which is conducted every
                        year.</br>For PG program all students must attend an interview which is conducted every year.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    What is the dress code at St. Francis?
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>The dress code at St. Francis is full length kurtis. However , sleeveless tops , shorttops are
                        not encouraged.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Is hostel facility available in campus?
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFOUR" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>No,Hostel facility is not available in campus.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    Is St. Francis Autonomous?
                </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>The college remains affiliated to Osmania University ,it is autonomous at the UG and PG level.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingSix">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    What are the placement opportunities at St. Francis?
                </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>The placement cell in the college ensures that most of the students get placed. About 90% of the
                        students get placed every year. Many internship opportunities were provided in various sectors.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingSeven">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    What is the fee structure of St. Francis?
                </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>St.Francis is a multi-disciplinary institution, and as several programs with distinct fee
                        structures. you can check out the fee structure for your desired program by visiting our fee
                        structure page. Or contact us at +914023403200/23400470
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingEight">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                    What is the eligibilty criteria for admissions?
                </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><a href="https://www.sfc.ac.in/admissions.php" class="primaryColor text-decoration-none">Click
                            Here</a> to view the eligibility criteria for various courses.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingNine">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                    Is parking facility available in the campus?
                </button>
            </h2>
            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>students are allowed to park only two wheeler inside the campus, while staff can park two and
                        four wheeler inside campus
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingTen">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapsedTen">
                    What extracurricular opportunities are available?
                </button>
            </h2>
            <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>The college provides various extracurricular oppurtunities such as NCC, NSS, sports from which it
                        is mandatory for first year UG students to opt one of these.St. Francis also provides a broad
                        assortment of other activities- artistic, musical,political and social.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>