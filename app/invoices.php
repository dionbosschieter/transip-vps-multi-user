<?php
require_once 'auth/session.php';
require_once 'includes/header.php';
require_once 'includes/menu.php';
require_once 'includes/api.php';

require_once 'vendor/autoload.php';

$api = getApiClient();
$repository = $api->invoice();

try {
    $invoices = $repository->getAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Error: {$e->getMessage()}</div>";
    exit;
}
?>
    <style>
        .invoice-paid {
            color: green;
        }
    </style>
    <div class="col-md-9 col-lg-10">
        <div class="p-4">
            <h1>Invoices</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($invoices as $invoice): ?>
                    <tr>
                        <td><a href="invoice.php?id=<?php echo htmlspecialchars($invoice->getInvoiceNumber()); ?>"><?php echo htmlspecialchars($invoice->getInvoiceNumber()); ?></a></td>
                        <td><span class="invoice-<?php echo htmlspecialchars($invoice->getInvoiceStatus()); ?>"><?php echo htmlspecialchars($invoice->getInvoiceStatus()); ?></span></td>
                        <td><?php echo htmlspecialchars($invoice->getCreationDate()); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>
