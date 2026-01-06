<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

$user = User::create([
    'name' => 'Kepala Desa',
    'email' => 'fharadilla@kepaladesa.com',
    'password' => Hash::make('123fhara'),
    'role' => 'admin',
]);

echo "User berhasil dibuat:\n";
echo "Email: " . $user->email . "\n";
echo "Role: " . $user->role . "\n";
echo "ID: " . $user->id . "\n";
