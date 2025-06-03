<?php
require_once 'auth/session.php';
require_once 'auth/roles.php';
checkRoles(['admin', 'dev']);

require_once 'includes/header.php';
require_once 'includes/menu.php';
require_once 'includes/api.php';

require_once 'vendor/autoload.php';

use Transip\Api\Library\Entity\Vps;

$api = getApiClient();
$repository = $api->vps();

try {
    $vpsList = $repository->getAll();
    if (getRole() == 'dev') {
        $vpsList = array_filter($vpsList, fn (Vps $vps) => str_contains($vps->getDescription(), 'dev'));
        // $vpsList = array_filter($vpsList, fn (Vps $vps) => in_array('dev', $vps->getTags()));
    }
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Error: {$e->getMessage()}</div>";
    exit;
}
?>
<style>
    .status-running {
        color: green;
    }
    .status-stopped {
        color: red;
    }
    .description {
        color: dodgerblue;
    }
</style>
<div class="col-md-9 col-lg-10">
    <div class="p-4">
        <h1>VPSes</h1>
        <div class="row">
            <?php foreach ($vpsList as $vps): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($vps->getName()); ?></h5>
                            <p class="card-text">
                                Description: &quot;<span class="description"><?php echo htmlspecialchars($vps->getDescription()) ?></span>&quot;<br />
                                Status: <span class="status-<?php echo htmlspecialchars($vps->getStatus()); ?>"><?php echo htmlspecialchars($vps->getStatus()); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>
