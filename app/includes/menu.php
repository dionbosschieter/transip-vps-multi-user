<div class="col-md-3 col-lg-2 bg-dark text-white vh-100">
    <div class="d-flex flex-column p-3">
        <h3>Menu</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="invoices.php" class="nav-link text-white">Invoices</a>
            </li>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <li class="nav-item">
                    <a href="vps.php" class="nav-link text-white">VPSes</a>
                </li>
            <?php endif; ?>
        </ul>
        <hr>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
