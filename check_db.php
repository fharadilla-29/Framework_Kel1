<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$galeris = \Illuminate\Support\Facades\DB::table('galeris')->select('judul', 'gambar')->get();
foreach ($galeris as $galeri) {
    echo "Judul: {$galeri->judul}\n";
    echo "Gambar: {$galeri->gambar}\n";
    echo "---\n";
}
