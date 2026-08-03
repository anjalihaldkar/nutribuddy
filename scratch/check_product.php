<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

foreach (Product::all() as $p) {
    echo "ID: {$p->id}, Name: {$p->name}, Is Active: " . ($p->is_active ? 'Yes' : 'No') . ", Variants Count: " . $p->variants()->count() . ", Active Variants: " . $p->variants()->where('is_active', true)->count() . "\n";
}
