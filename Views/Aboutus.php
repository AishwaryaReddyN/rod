<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
?>

<div style="min-height: 81vh;">
    <!-- Breadcrumbs -->
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $_ENV['BASE_DIR'] ?>" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item text-body-secondary" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="primaryLightAccentBack p-3 rounded-3">
            <h2 class="fw-bold"><i class="fa-regular fa-file-lines"></i> About Us</h2>
        </div>
        <h3 class="mt-4 ms-1">The Beginning</h3>
        <p class="fw-normal ms-1 ">St. Francis College for Women is a Catholic Minority Institution founded by the Sisters of Charity of Sts. Bartolomea Capitanio and Vincenza Gerosa in 1959, for the education of women. The college derives its inspiration from the person and teachings of Jesus Christ, who is its norm, protector and guide</p>  
        <h3 class="mt-4 ms-1">Vision</h3>
        <p class="fw-normal ms-1">Inspired by the visionary dynamism of St. Bartholomea, the Foundress of the Sisters of Charity, St. Francis College has its vision “Holistic Education for the Empowerment of Women"</p>
        <h3 class="mt-4 ms-1">Mission</h3>
        <div class="content">
              Motivating students to become
            </div>
            <div class="text-left content" data-aos="fade-up">
              <ul>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Intellectually Competent</li>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Morally Upright</li>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Socially Committed</li>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Emotionally Stable </li>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Spiritually Inspired</li>
                <li class="list-unstyled"><i class="fas fa-check-double"></i> Patriotic Women citizens of India</li>
              </ul>
            </div>
          </div>

</div>

<div class="container mt-4">
        <div class="primaryLightAccentBack p-3 rounded-3">
            <h2 class="fw-bold"><i class="fa-solid fa-desktop"></i> Reception Office Digitization</h2>
            <h3 class="mt-4 ms-1"></h3>
</div>
        <p class="fw-normal ms-1 mt-4 mb-4">Digitization is the process of converting information into a digital format. Digitized information is easier to store, access, and share. Flexibility is one of the chief assets of digital information . It is easy to edit, reformat and to commit print in a variety of iterations without effort required to produce hard copy by manually writing.
        We can create an endless number of identical copies from a digital file, because the file does not decay by the virtue of coping.</p>





</div>


<?php include $absoluteDir . "views/components/footer.php"; ?>
