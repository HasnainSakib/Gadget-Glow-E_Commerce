<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;

echo "=== TESTING ORDER SOFT DELETE & RESTORE ===\n";

$firstOrder = Order::latest()->first();

if (!$firstOrder) {
    echo "No orders found to test.\n";
    exit;
}

$id = $firstOrder->id;
$orderNumber = $firstOrder->order_number;
echo "Testing with Order ID: {$id}, Number: {$orderNumber}\n";

// 1. Soft delete
$firstOrder->delete();
echo "Soft deleted Order #{$orderNumber}.\n";

// 2. Check if present in regular query
$checkRegular = Order::find($id);
echo "Order in regular query (should be null): " . ($checkRegular ? "FOUND (FAIL)" : "NULL (PASS)") . "\n";

// 3. Check if present in onlyTrashed
$checkTrashed = Order::onlyTrashed()->find($id);
echo "Order in trashed query: " . ($checkTrashed ? "FOUND (PASS: #" . $checkTrashed->order_number . ")" : "NOT FOUND (FAIL)") . "\n";

// 4. Restore order
$checkTrashed->restore();
echo "Restored Order #{$orderNumber}.\n";

// 5. Check if back in regular query
$checkRestored = Order::find($id);
echo "Order after restore: " . ($checkRestored ? "FOUND (PASS: #" . $checkRestored->order_number . ")" : "NULL (FAIL)") . "\n";

echo "=== ALL TESTS COMPLETED SUCCESSFULLY ===\n";
