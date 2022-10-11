<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RiwayatLoginController;
use App\Http\Controllers\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'Controller@index')->name('admin.dash');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['roleA']], function () {
        Route::prefix('admin')->group(function () {
            //riwayat login
            Route::get('/data-log', [RiwayatLoginController::class, 'log'])->name('log.index');
            Route::delete('/data-log/{id}', [RiwayatLoginController::class, 'loghapus']);

            Route::get('/data-pengaturan', [SettingController::class, 'pengaturan'])->name('pengaturan.index');
            Route::post('/data-pengaturan/update', [SettingController::class, 'pengaturanupdate'])->name('pengaturan');

            Route::get('/', [Controller::class, 'index'])->name('admin');
            Route::get('/data-mahasiswa', [Controller::class, 'mahasiswa'])->name('mahasiswa.index');
            Route::post('/data-mahasiswa', [Controller::class, 'mahasiswastore'])->name('mahasiswa.store');
            Route::post('/data-mahasiswa/update', [Controller::class, 'mahasiswaupdate'])->name('mahasiswa.update');
            Route::delete('/data-mahasiswa/{id}', [Controller::class, 'mahasiswahapus'])->name('mahasiswa.destroy');

            Route::get('/data-siswa', [Controller::class, 'dosen'])->name('dosen.index');
            Route::get('/data-siswa/riwayat-quiz/{id}', [Controller::class, 'riwayat'])->name('riwayat.quiz');

            Route::post('/data-siswa', [Controller::class, 'dosenstore'])->name('dosen.store');
            Route::post('/data-siswa/update', [Controller::class, 'dosenupdate'])->name('dosen.update');
            Route::delete('/data-siswa/{id}', [Controller::class, 'deleteuser'])->name('dosen.destroy');

            Route::get('/data-guru', [Controller::class, 'guru'])->name('guru.index');
            Route::post('/data-guru', [Controller::class, 'gurustore'])->name('guru.store');
            Route::post('/data-guru/update', [Controller::class, 'guruupdate'])->name('guru.update');
            Route::delete('/data-guru/{id}', [Controller::class, 'deleteuser'])->name('guru.destroy');

            Route::get('/data-admin', [Controller::class, 'admin'])->name('admin.index');
            Route::post('/data-admin', [Controller::class, 'adminstore'])->name('admin.store');
            Route::post('/data-admin/update', [Controller::class, 'adminupdate'])->name('admin.update');
            Route::delete('/data-admin/{id}', [Controller::class, 'deleteuser'])->name('admin.destroy');

            //pembelajaran
            Route::get('/data-pembelajaran', [PembelajaranController::class, 'pembelajaran'])->name('pembelajaran.index');
            Route::post('/data-pembelajaran', [PembelajaranController::class, 'pembelajaranstore'])->name('pembelajaran.store');
            Route::post('/data-pembelajaran/update', [PembelajaranController::class, 'pembelajaranupdate'])->name('pembelajaran.update');
            Route::delete('/data-pembelajaran/{id}', [PembelajaranController::class, 'pembelajaranhapus'])->name('pembelajaran.destroy');
            //materi
            Route::get('/data-materi/{id}', [materiController::class, 'materi']);
            Route::post('/data-materi', [materiController::class, 'materistore'])->name('materi.store');
            Route::post('/data-materi/update', [materiController::class, 'materiupdate'])->name('materi.update');
            Route::delete('/data-materi/{id}', [materiController::class, 'materihapus'])->name('materi.destroy');
            //text
            Route::get('/data-materi/{id}/{bel}/text', [materiController::class, 'materitext']);
            Route::post('/data-materi/text', [materiController::class, 'materitextstore'])->name('materitext.store');
            Route::post('/data-materi/textup', [materiController::class, 'materitextupdate'])->name('materitext.update');
            Route::delete('/data-materi/{id}/text', [materiController::class, 'materitexthapus']);

            Route::get('/data-materi/{id}/{bel}/file', [materiController::class, 'materifile']);
            Route::post('/data-materi/file', [materiController::class, 'materifilestore'])->name('materifile.store');
            Route::post('/data-materi/fileup', [materiController::class, 'materifileupdate'])->name('materifile.update');
            Route::delete('/data-materi/{id}/file', [materiController::class, 'materifilehapus']);

            Route::get('/data-materi/{id}/{bel}/video', [materiController::class, 'materivideo']);
            Route::post('/data-materi/video', [materiController::class, 'materivideostore'])->name('materivideo.store');
            Route::post('/data-materi/videoup', [materiController::class, 'materivideoupdate'])->name('materivideo.update');
            Route::delete('/data-materi/{id}/video', [materiController::class, 'materivideohapus']);

            //text
            Route::get('/data-quiz', [QuizController::class, 'quiztext']);
            Route::post('/data-quiz/text', [QuizController::class, 'quiztextstore'])->name('quiztext.store');
            Route::post('/data-quiz/textup', [QuizController::class, 'quiztextupdate'])->name('quiztext.update');
            Route::delete('/data-quiz/{id}/text', [QuizController::class, 'quiztexthapus']);
        });
        Route::get('/profil', [Controller::class, 'profil']);
        Route::post('/profil', [Controller::class, 'storeprofil']);
    });

    Route::group(['middleware' => ['role']], function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [User::class, 'index']);
            Route::get('/profil', [User::class, 'profiluser']);
            Route::get('/riwayat', [User::class, 'rr']);

            Route::post('/profil', [User::class, 'profilstore'])->name('profilstore');

            Route::get('/tentang', [User::class, 'tentang']);
            Route::get('/mulai', [User::class, 'mulai']);
            Route::get('/quiz', [User::class, 'quiz']);
            Route::post('/quiz', [User::class, 'postq'])->name('postquiz');
            Route::get('/report/{id}', [User::class, 'report']);

            // Route::get('/qui', [User::class, 'mulai']);
            Route::post('/getsearch', [User::class, 'getsearch'])->name('getsearch');

            Route::get('/materi/{id}', [User::class, 'materi']);
            Route::get('/materi/{id}/{materi}', [User::class, 'detail']);
        });
    });

  
});
Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/splash', [User::class, 'splash']);
Route::get('/user/login', [User::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
