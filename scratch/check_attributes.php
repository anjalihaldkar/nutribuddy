<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$products = \App\Models\Product::with(['category', 'taxRate', 'variants'])->get();
foreach ($products as $product) {
    echo "Product: " . $product->name . " (ID: " . $product->id . ")\n";
    echo "  - Base Price: " . $product->base_price . "\n";
    echo "  - Display Price: " . $product->display_price . "\n";
    echo "  - Is active: " . ($product->is_active ? 'yes' : 'no') . "\n";
    echo "  - Is variant enabled: " . ($product->is_variant_enabled ? 'yes' : 'no') . "\n";
    echo "  - Variants count: " . $product->variants->count() . "\n";
    foreach ($product->variants as $var) {
        echo "    * Variant ID: " . $var->id . ", Name: " . $var->name . ", Price: " . $var->price . ", Is Default: " . ($var->is_default ? 'yes' : 'no') . ", Is Active: " . ($var->is_active ? 'yes' : 'no') . "\n";
    }
}
