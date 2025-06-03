<div class="col-md-3 col-lg-2 bg-dark text-white vh-100">
    <div class="d-flex flex-column p-3">
        <h3>Menu</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
            </li>
            <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'finance'): ?>
            <li class="nav-item">
                <a href="invoices.php" class="nav-link text-white">Invoices</a>
            </li>
            <?php endif; ?>
            <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'dev'): ?>
                <li class="nav-item">
                    <a href="vps.php" class="nav-link text-white">VPSes</a>
                </li>
            <?php endif; ?>
        </ul>
        <hr>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
