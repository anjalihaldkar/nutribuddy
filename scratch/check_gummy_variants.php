<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

$p = Product::find(10);
echo "Brain Booster Gummies variants:\n";
foreach ($p->variants as $v) {
    echo "  - Variant ID: {$v->id}, Name: {$v->name}, Active: " . ($v->is_active ? 'Yes' : 'No') . ", Attributes: " . json_encode($v->attributes) . "\n";
}
