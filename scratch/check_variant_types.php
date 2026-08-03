<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$products = \App\Models\Product::get();
foreach ($products as $p) {
    echo "Product ID " . $p->id . ": " . $p->name . "\n";
    echo "  - variant_types: " . json_encode($p->variant_types) . "\n";
    echo "  - is_variant_enabled: " . ($p->is_variant_enabled ? 'yes' : 'no') . "\n";
}
