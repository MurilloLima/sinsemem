<?php

use App\Http\Controllers\Admin\NoticiasController;
use App\Http\Controllers\Admin\CongressoController;
use App\Http\Controllers\Admin\ReunioesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MensagenController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Models\Noticia;
use App\Models\Reunioe;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.pages.index');

//cadastro users
Route::get('user/cadastro/', [HomeController::class, 'cadastro'])->name('home.pages.cadastro');
//noticia
Route::post('noticia/store/', [NoticiaController::class, 'store'])->name('home.pages.cadastro.store');
Route::get('noticia/{slug}', [HomeController::class, 'view'])->name('home.pages.noticia.view');
// servidor
// Route::post('servidor/store/', [ControllersUserController::class, 'store'])->name('home.pages.servidor.store');
// users
Route::post('users/store/', [UserController::class, 'store'])->name('home.pages.user.store');
// download app
Route::get('app/download/', [HomeController::class, 'download'])->name('home.pages.download');
//politica
Route::get('politica/', [HomeController::class, 'politica'])->name('home.pages.politica');



// administrativo
Route::get('/dashboard', function () {
    $noticias = Noticia::all();
    $users = User::all();
    $reunioes = Reunioe::all();
    return view('admin.pages.index', compact(['users', 'noticias', 'reunioes']));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // noticias
    Route::get('admin/noticias', [NoticiasController::class, 'index'])->name('admn.pages.noticias.index');
    Route::get('admin/noticias/create', [NoticiasController::class, 'create'])->name('admin.pages.noticias.create');
    Route::post('admin/noticia', [NoticiasController::class, 'store'])->name('admin.pages.noticias.store');
    Route::get('admin/noticias/edit', [NoticiasController::class, 'edit'])->name('admin.noticias.pages.edit');
    Route::post('admin/noticias/destroy', [NoticiasController::class, 'destroy'])->name('admin.noticias.pages.destroy');

    //reunioes
    Route::get('admin/reunioes', [ReunioesController::class, 'index'])->name('admin.pages.reunioes.index');
    Route::get('admin/reunioes/create', [ReunioesController::class, 'create'])->name('admin.pages.reunioes.create');
    Route::post('admin/reunioes/store', [ReunioesController::class, 'store'])->name('admin.pages.reunioes.store');
    Route::post('admin/reunioes/destroy', [ReunioesController::class, 'destroy'])->name('admin.reunioes.pages.destroy');

    //assembleia
    Route::get('admin/assembleia', [CongressoController::class, 'index'])->name('admin.pages.congresso.index');
    Route::get('admin/assembleia/create', [CongressoController::class, 'create'])->name('admin.pages.congresso.create');
    Route::post('admin/assembleia/store', [CongressoController::class, 'store'])->name('admin.pages.congresso.store');
    Route::post('admin/assembleia/destroy', [CongressoController::class, 'destroy'])->name('admin.congresso.pages.destroy');

    //users
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.pages.users.index');

     //servidores
     Route::get('admin/servidores', [UserController::class, 'servidores'])->name('admin.pages.servidores.create');
     Route::post('admin/servidores/store', [UserController::class, 'servistore'])->name('admin.pages.servidores.store');

    // user admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //arquivos
    Route::get('admin/arquivos', [ArquivoController::class, 'index'])->name('admin.pages.arquivos.index');
    Route::post('admin/arquivos/store', [ArquivoController::class, 'store'])->name('admin.pages.arquivos.store');
    Route::get('admin/arquivos/delete/{id}', [ArquivoController::class, 'destroy'])->name('admin.pages.arquivos.destroy');

    //view user
    Route::get('/view/user/{id}', [UserController::class, 'view'])->name('admin.user.view');

    //ficha inscricao
    Route::get('admin/ficha/inscricao/', [UserController::class, 'index'])->name('admin.pages.ficha.index');
    Route::post('admin/ficha/inscricao/update', [UserController::class, 'update'])->name('admin.pages.ficha.update');

    //mensagem
    Route::get('admin/mensagem', [MensagenController::class, 'index'])->name('admin.pages.mensagem.index');
    Route::get('admin/mensagem/create', [MensagenController::class, 'create'])->name('admin.pages.mensagem.create');
    Route::post('admin/mensagem/store', [MensagenController::class, 'store'])->name('admin.pages.mensagem.store');
    Route::post('admin/mensagem/destroy', [MensagenController::class, 'destroy'])->name('admin.mensagem.pages.destroy');

    //carteira
    Route::get('admin/carteira', [UserController::class, 'carteira'])->name('admin.pages.carteira.index');

});

require __DIR__ . '/auth.php';