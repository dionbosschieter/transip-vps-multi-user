<?php
require_once 'auth/session.php';
require_once 'auth/roles.php';
require_once 'includes/header.php';
require_once 'includes/menu.php';

?>
    <div class="col-md-9 col-lg-10">
        <div class="p-4">
            <h1>Welcome to the Dashboard</h1>
            <p class="lead">Use the menu to navigate the application.</p>
            <p>You have <strong><?php echo getRole(); ?></strong> access.</p>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>
