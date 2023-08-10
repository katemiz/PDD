<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Attachment;
use App\Http\Livewire\ListCompanies;
use App\Http\Livewire\ListProjects;
use App\Http\Livewire\ListRequirements;
use App\Http\Livewire\RequirementLivewire;
use App\Http\Livewire\ListEndproducts;
use App\Http\Livewire\ListGates;
use App\Http\Livewire\ListMocs;
use App\Http\Livewire\ListPocs;
use App\Http\Livewire\ListWitnesses;
use App\Http\Livewire\ListUsers;
use App\Http\Livewire\ListRoles;
use App\Http\Livewire\ListPermissions;

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MocController;
use App\Http\Controllers\PocController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\EndProductsController;
use App\Http\Controllers\CurrentProjectController;
use App\Http\Controllers\WitnessController;
use App\Http\Controllers\RolesPermissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('lang/{lang}', [
    'as' => 'lang.switch',
    'uses' => 'App\Http\Controllers\LanguageController@switchLang',
]);





Route::middleware('auth')->group(function () {


    // ADMIN
    // ************************************************************
    Route::get('/convertOldToNew', [RolesPermissionsController::class, 'convertOldToNew']);


    Route::get('/admin/users', ListUsers::class);
    Route::get('/admin/roles', ListRoles::class);
    Route::get('/admin/permissions', ListPermissions::class);

    Route::get('/admin/users/view/{id}', [RolesPermissionsController::class, 'usrview']);
    Route::get('/admin/roles/view/{id}', [RolesPermissionsController::class, 'roleview']);
    Route::get('/admin/permissions/view/{id}', [RolesPermissionsController::class, 'permissionview']);

    Route::get('/admin/users/form/{id?}', [RolesPermissionsController::class, 'usrform']);
    Route::get('/admin/roles/form/{id?}', [RolesPermissionsController::class, 'roleform']);
    Route::get('/admin/permissions/form/{id?}', [RolesPermissionsController::class, 'permissionform']);

    Route::post('/admin/users/store/{id?}', [RolesPermissionsController::class, 'usrstore']);
    Route::post('/admin/roles/store/{id?}', [RolesPermissionsController::class, 'rolestore']);
    Route::post('/admin/permissions/store/{id?}', [RolesPermissionsController::class, 'permissionstore']);

    Route::get('/admin/users/delete/{id}', [UserController::class, 'delete']);

    // ************************************************************


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Attachment
    Route::get('/add-attach/{item}/{itemId}',  Attachment::class);
    Route::get('/attach-view/{id}',  [AttachmentController::class, 'attachview']);
    Route::get('/attach-delete/{model}/{modelId}/{id}',  [AttachmentController::class, 'attachdelete']);
    Route::post('/upload-attach/{itemName}/{itemId}',  [AttachmentController::class, 'upload']);



    // Current Project
    Route::get('/selectcurrentproject', [CurrentProjectController::class, 'selectCurrent']);
    Route::get('/setcurrentproject/{id}', [CurrentProjectController::class, 'setCurrent']);

    // Companies
    Route::get('/companies', ListCompanies::class);
    Route::get('/companies/view/{id}', [CompanyController::class, 'view']);
    Route::get('/companies/form/{id?}', [CompanyController::class, 'form']);
    Route::post('/companies/store/{id?}', [CompanyController::class, 'store']);
    Route::get('/companies/delete/{id}', [CompanyController::class, 'delete']);

    // Projects
    Route::get('/projects', ListProjects::class);
    Route::get('/projects/view/{id}', [ProjectController::class, 'view']);
    Route::get('/projects/form/{id?}', [ProjectController::class, 'form']);
    Route::post('/projects/store/{id?}', [ProjectController::class, 'store']);
    Route::get('/projects/delete/{id}', [ProjectController::class, 'delete']);

    // Decision Gates / Meetings
    Route::get('/dgates', ListGates::class);
    Route::get('/dgates/view/{id}', [GateController::class, 'view']);
    Route::get('/dgates/form/{id?}', [GateController::class, 'form']);
    Route::post('/dgates/store/{id?}', [GateController::class, 'store']);
    Route::get('/dgates/delete/{id}', [GateController::class, 'delete']);

    // MOC - Means of Compliances
    Route::get('/mocs', ListMocs::class);
    Route::get('/mocs/view/{id}', [MocController::class, 'view']);
    Route::get('/mocs/form/{id?}', [MocController::class, 'form']);
    Route::post('/mocs/store/{id?}', [MocController::class, 'store']);
    Route::get('/mocs/delete/{id}', [MocController::class, 'delete']);

    // POC - Proof of Compliances
    Route::get('/pocs', ListPocs::class);
    Route::get('/pocs/view/{id}', [PocController::class, 'view']);
    Route::get('/pocs/form/{id?}', [PocController::class, 'form']);
    Route::post('/pocs/store/{id?}', [PocController::class, 'store']);
    Route::get('/pocs/delete/{id}', [PocController::class, 'delete']);

    // Witness
    Route::get('/witness', ListWitnesses::class);
    Route::get('/witness/view/{id}', [WitnessController::class, 'view']);
    Route::get('/witness/form/{id?}', [WitnessController::class, 'form']);
    Route::post('/witness/store/{id?}', [WitnessController::class, 'store']);
    Route::get('/witness/delete/{id}', [WitnessController::class, 'delete']);

    // End Products
    Route::get('/endproducts', ListEndproducts::class);
    Route::get('/endproducts/view/{id}', [EndProductsController::class, 'view']);
    Route::get('/endproducts/form/{id?}', [EndProductsController::class, 'form']);
    Route::post('/endproducts/store/{id?}', [EndProductsController::class, 'store']);
    Route::get('/endproducts/delete/{id}', [EndProductsController::class, 'delete']);

    // Requirements
    Route::get('/requirements', ListRequirements::class);
    Route::get('/requirements/view/{id}', [RequirementController::class, 'view']);
    Route::get('/requirements/form/{id?}', RequirementLivewire::class);
    Route::get('/requirements/verform/{rid}/{id?}', [RequirementController::class, 'verform']);
    Route::post('/requirements/store/{id?}', [RequirementController::class, 'store']);
    Route::get('/requirements/export', [RequirementController::class, 'excelExport']);
    Route::post('/verifications/store/{rid}/{id?}', [RequirementController::class, 'verstore']);
    Route::get('/verifications/delete/{rid}/{id}', [RequirementController::class, 'delver']);
    Route::get('/requirements/delete/{id}', [RequirementController::class, 'delete']);

    // Excel Import-Export
    Route::get('file-import-export', [UserController::class, 'fileImportExport']);
    Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

    Route::get('/all-requirements', [ExportController::class, 'allreqs']);
    Route::get('/pocs-vs-requirements', [ExportController::class, 'pocsvsreqs']);
    Route::get('/dgates-vs-pocs', [ExportController::class, 'dgatesvspocs']);
    Route::get('/compliance-matrix', [ExportController::class, 'compliancematrix']);
    Route::get('/compliance-matrix-export', [ExportController::class, 'excelCMExport']);







});

require __DIR__.'/auth.php';
