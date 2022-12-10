<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RoleRouteController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\UserDetails;
use App\Http\Controllers\Builder\BudgetController;
use App\Http\Controllers\Builder\BudgetDetailsController;
use App\Http\Controllers\Builder\DocumentController;
use App\Http\Controllers\Builder\DesignController;
use App\Http\Controllers\Builder\DesignationController;
use App\Http\Controllers\Builder\BuilderOptionController;
use App\Http\Controllers\Builder\CompanyController;
use App\Http\Controllers\WorkerController;

use App\Http\Controllers\Builder\FlatController;
use App\Http\Controllers\Builder\FloorDetailsController;
use App\Http\Controllers\Builder\FlatDetailController;
use App\Http\Controllers\Builder\FloorbudgetController;
use App\Http\Controllers\Builder\FoundationController;
use App\Http\Controllers\Builder\TestDetailController;
use App\Http\Controllers\Builder\MaterialController;
use App\Http\Controllers\Builder\MaterialDetailController;
use App\Http\Controllers\Builder\UnitController;
use App\Http\Controllers\Constructions\ConstructControlller;
use App\Http\Controllers\Location\CountryController;
use App\Http\Controllers\Lands\LandController;
use App\Http\Controllers\Location\DistrictController;
use App\Http\Controllers\Location\DivisionController;
use App\Http\Controllers\Management\ManagementController;
use App\Http\Controllers\Management\TeamController;
use App\Http\Controllers\Projects\CommonProject;
use App\Http\Controllers\Projects\ProjectsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// change auth routes froms and routes middleware loaded from \App\Http\kernal
// \Providers\RouteServiceProvider

// * User login
Route::get('/', [AuthController::class, 'userLoginForm'])->name('userlogin');
Route::post('/', [AuthController::class, 'userLoginCheck'])->name('userlogin');


Route::get('register', [UserController::class, 'userRegistrationForm'])->name('userstore');

Route::post('register', [UserController::class, 'userRegistrationStore'])->name('userstore');

Route::get('logout', [AuthController::class, 'logOut'])->name('logout');




Route::group(['middleware' => AdminMiddleware::class], function () {
    Route::prefix('admin')->group(function () {

        // Locations
        Route::resource('country', CountryController::class);
        Route::resource('division', DivisionController::class);
        Route::resource('district', DistrictController::class);

        // Create Users
        Route::resource('member', UserController::class);
        Route::post('/userdetail/{member}',[UserDetails::class,'update'])->name('userdetails.update');

        Route::get('/adms', [RoleRouteController::class, 'admins'])->name('admins');

        Route::get('/moderators', [RoleRouteController::class, 'moderators'])->name('admin.moderators');

        // project
        Route::resource('/details/project', ProjectsController::class);

        Route::get('/overeview/project/{project}', [CommonProject::class,'index'])->name('admin.project.overview');

        // constructions
        Route::get('/construction/{project}', [ConstructControlller::class,'index'])->name('construct.index');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');

        // Route::get('/account/{id}', function ($id) {
        //     return view('profile.account');
        // })->name('account');



        Route::resource('/document', DocumentController::class);
        Route::resource('/land', LandController::class);

        // design
        Route::get('/design',[DesignController::class, 'index'])->name('design');
        Route::get('/design/create/{id}', [DesignController::class, 'create'])->name('design.create');
        Route::post('/design/store', [DesignController::class, 'store'])->name('design.store');
        Route::get('/design/edit/{design}', [DesignController::class, 'edit'])->name('design.edit');
        Route::put('/design/update', [DesignController::class, 'update'])->name('design.update');
        Route::post('/design/delete/{design}', [DesignController::class, 'destroy'])->name('design.destroy');

        // builder
        Route::resource('/designation', DesignationController::class);
        Route::resource('/builder', BuilderOptionController::class);
        
        // material
        Route::resource('/unit', UnitController::class);
        Route::resource('/material', MaterialController::class);
        Route::resource('/materialDetails', MaterialDetailController::class);
        
        // floor
        Route::resource('/floorDetails', FloorDetailsController::class);
        Route::resource('/floorBudget', FloorbudgetController::class);
        
        // budget
        Route::resource('/budget', BudgetController::class);
        Route::resource('/floorBudgetDetail', BudgetDetailsController::class);
        
        // project budget
        Route::post('budget',[BudgetController::class,'store'])->name('budget.store');


        // Foundation
        Route::resource('/foundation', FoundationController::class);

        // flat
        Route::resource('/flatDetail', FlatDetailController::class);
        Route::resource('/flat', FlatController::class);

        //test
        Route::resource('/testDetail',TestDetailController::class);
        
        //company
        Route::resource('/companyname',CompanyController::class);
        
        //worker
        Route::resource('/worker',WorkerController::class);

        //management
        Route::resource('/management',ManagementController::class);
        Route::resource('/team',TeamController::class);
    });
});
