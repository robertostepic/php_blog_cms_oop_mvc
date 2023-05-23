        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; CMS 2023</div></div>
                    <div class="col-auto">
                        <?php if (empty($_SESSION['is_logged']) || $_SESSION['is_logged'] == 0): ?>
                        <a class="small" href="?p=user&a=login">Log in</a>
                        <?php else: ?>
                        <a class="small" href="?p=user&a=logout">Log out</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="static/js/scripts.js"></script>
    </body>
</html>