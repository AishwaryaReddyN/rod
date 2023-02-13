<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "controller/userController.php";
?>

<!-- Breadcrumbs -->
<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
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
                <button class="accordion-button collapsed rounded-3 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    How to apply for ST. FRACNCIS College?
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><a href="#" class="primaryColor text-decoration-none">Click Here</a> for the submission of
                        application. The application fee is Rs.500/- for the candidates who are applying.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    How can I get admitted into ST. Francis College?
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>For UG Program all the students must appear for the entrance exam which is conducted every
                        year.</br>For PG program all the must attend an interview which is conducted every year.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $absoluteDir . "views/components/footer.php"; ?>