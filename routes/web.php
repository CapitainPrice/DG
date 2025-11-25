<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// 1. Rota da página inicial (index.html)
Route::get('/', function () {
    return view('index'); // Carrega resources/views/index.blade.php
})->name('home');

// 2. Rota da página de cursos (cursos.html)
Route::get('/cursos', function () {
    return view('cursos'); // Carrega resources/views/cursos.blade.php
})->name('cursos');

// 3. Rotas de autenticação (login e logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Rotas de Cadastro CORRIGIDAS ---
// Exibe o formulário de cadastro (GET)
Route::get('/cadastro', [AuthController::class, 'showRegister'])->name('register');

// Processa o envio do formulário de cadastro (POST)
// O JavaScript fará o POST para esta rota:
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.post'); 

Route::get('/forgot-password', function () {
    return view('forgotten');
})->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
     ->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');


// OBS: Certifique-se de que 'use App\Http\Controllers\AuthController;' está no topo do arquivo.