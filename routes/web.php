<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AssociateController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


// Rotas Iniciais
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        // 'canRegister' => Route::has('register'),
        // 'laravelVersion' => Application::VERSION,
        // 'phpVersion' => PHP_VERSION,
    ]);
})->name('index');

// Rotas Públicas
Route::get('/partners/menu', [PartnerController::class, 'menu'])->name('partners.menu');
Route::get('/partners/add/{type}', [PartnerController::class, 'add'])->name('partners.add');
Route::post('/partners/contract/{type}', [PartnerController::class, 'contract'])->name('partners.contract');
Route::post('/partners/include', [PartnerController::class, 'include'])->name('partners.include');
Route::get('/partners/search', [PartnerController::class, 'search'])->name('partners.search');
Route::post('/partners/save', [PartnerController::class, 'save'])->name('partners.save');
Route::get('/partners/confirm', [PartnerController::class, 'confirm'])->name('partners.confirm');
Route::get('/partners/result', [PartnerController::class, 'result'])->name('partners.result');

Route::get('/associates/valid',  [AssociateController::class, 'valid'])->name('associates.valid');
Route::post('/associates/confirm',  [AssociateController::class, 'confirm'])->name('associates.confirm');
Route::view('/terms/view', 'documents.terms.agree')->name('terms.view');
Route::get('/address/search/{zipcode}', [AddressController::class, 'search'])->name('address.search');
Route::get('terms', [SystemController::class, 'terms'])->name('terms.agree');

Route::get('/partners/{id}', [PartnerController::class, 'show'])->name('partners.show')->where('id', '[0-9]+');;


// Rotas Privadas
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/partners/index', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/partners/detail/{id}', [PartnerController::class, 'detail'])->name('partners.detail');
    Route::post('/partners/check/', [PartnerController::class, 'check'])->name('partners.check');
    Route::post('/partners/documents/', [PartnerController::class, 'documents'])->name('partners.documents');
    Route::get('/partners/contracts/', [PartnerController::class, 'contracts'])->name('partners.contracts');
    Route::get('/partners/terms/', [PartnerController::class, 'terms'])->name('partners.terms');
    Route::get('/partners/specialities/add/{id}', [PartnerController::class, 'addSpecialities'])->name('partners.specialities.add');
    Route::post('/partners/specialities/delete/{partner_id}/{speciality_id}', [PartnerController::class, 'deleteSpecialities'])->name('partners.specialities.delete');
    Route::get('/partners/user/add/', [PartnerController::class, 'addUser'])->name('partners.user.add');
    Route::get('/partners/user/find/{id}', [PartnerController::class, 'findUser'])->name('partners.user.find');
    Route::post('/partners/specialities/store', [PartnerController::class, 'storeSpecialities'])->name('partners.specialities.store');
    Route::resource('partners', PartnerController::class);

    Route::post('/doctors/specialities/store', [DoctorController::class, 'storeSpecialities'])->name('doctors.specialities.store');
    Route::post('/doctors/specialities/delete/{doctor_id}/{speciality_id}', [DoctorController::class, 'deleteSpecialities'])->name('doctors.specialities.delete');
    Route::resource('doctors', DoctorController::class);

    Route::get('/associates/dependents', [AssociateController::class, 'dependents'])->name('associates.dependents');
    Route::post('/associates/phones/store', [AssociateController::class, 'storePhones'])->name('associates.phones.store');
    Route::post('/associates/emails/store', [AssociateController::class, 'storeEmails'])->name('associates.emails.store');
    Route::delete('/associates/phones/delete/{associate_id}/{phone_id}', [AssociateController::class, 'deletePhones'])->name('associates.phones.delete');
    Route::delete('/associates/emails/delete/{associate_id}/{email_id}', [AssociateController::class, 'deleteEmails'])->name('associates.emails.delete');
    Route::get('/associates/filter/{filter}', [AssociateController::class, 'filter'])->name('associates.filter');
    Route::resource('associates', AssociateController::class);
    
    Route::get('/dependents/list', [DependentController::class, 'list'])->name('dependents.list');
    Route::get('/dependents/detail/{id}', [DependentController::class, 'detail'])->name('dependents.detail');
    Route::post('/dependents/check/', [DependentController::class, 'check'])->name('dependents.check');
    Route::resource('dependents', DependentController::class);
    
    Route::get('/users/detail', [UserController::class, 'detail'])->name('users.detail');
    Route::resource('users', UserController::class);
    
    Route::resource('cards', CardController::class);
 
    Route::resource('incidents', IncidentController::class);

    Route::get('/reports/index', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/associates', [ReportController::class, 'getAssociates'])->name('reports.associates');
    Route::get('/reports/associates/pdf', [ReportController::class, 'reportEmails'])->name('reports.associates.pdf');

    Route::get('/files/view/{type}/{id}/{name}/{extension}', [FileController::class, 'view'])->name('files.view');

    Route::get('/dashboard', function () {
        if ( Hash::check( 'AMS.2022' , Auth::user()->password ) ) {
             return redirect('user/profile');
        };
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
