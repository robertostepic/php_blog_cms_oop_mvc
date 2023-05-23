<?php require 'inc/header.php' ?>

<header class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-5">
                <div class="text-center text-xxl-start">
                    <div class="fs-3 fw-light text-muted">Welcomte to</div>
                    <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">the most basic CMS, ever.</span></h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <?php if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] == 0): ?>
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="?p=user&a=login">Log in</a>
                        <?php else: ?>
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="?a=dashboard">Go to dashboard</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <!-- Header profile picture-->
                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                    <div class="profile bg-gradient-primary-to-secondary">
                        <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                        <!-- Watch a tutorial on how to do this on YouTube (link)-->
                        <img src="static/assets/hero-image.jpg" alt="CMS stock image" width="800"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="bg-light py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
                <div class="text-center my-5">
                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About CMS</span></h2>
                    <p class="lead fw-light mb-4">This is the most basic CMS, ever.</p>
                    <p class="text-muted">Totally not lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                    <div class="d-flex justify-content-center fs-2 gap-4">
                        <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                        <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                        <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'inc/footer.php' ?>