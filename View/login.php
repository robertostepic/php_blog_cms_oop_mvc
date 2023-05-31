<?php require 'inc/header.php' ?>

<section class="py-5">
    <div class="container px-5">
        <?php require 'inc/notify.php' ?>
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Log in</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form id="contactForm" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" placeholder="xxxxxxxx" required />
                            <label for="password">Password</label>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name="login" type="submit">Log in</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'inc/footer.php' ?>
