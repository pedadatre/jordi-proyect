<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole; // Importar el middleware
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCrewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProfileController;

// Ruta para la página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas de autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (HttpRequest $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->role_id == 1) {
            return redirect()->intended('/admin');
        } elseif ($user->role_id == 2) {
            return redirect()->intended('/user');
        }

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::post('/logout', function (HttpRequest $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (HttpRequest $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'Bday' => 'required|date',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'Bday' => $request->Bday,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => 2, // Default role for new users
    ]);

    Auth::login($user);

    return redirect('/')->with('success', 'User registered successfully.');
});

// Rutas para el administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/requests', [RequestController::class, 'index'])->name('admin.requests');
    Route::patch('/admin/requests/{request}', [RequestController::class, 'update'])->name('admin.requests.update');

    // Rutas para AdminUserController
    Route::resource('admin/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    // Rutas para AdminCrewController
    Route::resource('admin/crews', AdminCrewController::class)->names([
        'index' => 'admin.crews.index',
        'create' => 'admin.crews.create',
        'store' => 'admin.crews.store',
        'show' => 'admin.crews.show',
        'edit' => 'admin.crews.edit',
        'update' => 'admin.crews.update',
        'destroy' => 'admin.crews.destroy',
    ]);
});

// Rutas para el usuario
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/request', [RequestController::class, 'create'])->name('user.request.create');
    Route::post('/user/request', [RequestController::class, 'store'])->name('user.request.store');
});

// Rutas para el perfil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

require __DIR__.'/auth.php';