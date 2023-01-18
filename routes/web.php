<?php

use App\Http\Controllers\AdministExpenController;
use App\Http\Controllers\ExpensisModalController;
use App\Http\Controllers\FeasibilityStudiesController;
use App\Http\Controllers\GeneralProjectIncomeController;
use App\Http\Controllers\GeneralProjectIncomeExpensesController;
use App\Http\Controllers\IncomeSourcesController;
use App\Http\Controllers\MainActivityController;
use App\Http\Controllers\MarketingChannelController;
use App\Http\Controllers\ProjectBpChannelResourceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectExpGeneralIncomeController;
use App\Http\Controllers\ProjectExpGeneralIncomeIncrementalController;
use App\Http\Controllers\ProjectExpGeneralIncomeIncrementalDetailController;
use App\Http\Controllers\ProjectFsGeneralIncomeController;
use App\Http\Controllers\ProjectFsGeneralIncomeIncrementalController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\SaleChannelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SystemContactController;
use App\Http\Controllers\SystemPageController;
use App\Http\Controllers\SystemServicesController;
use App\Http\Controllers\UsersController;
use App\Models\AdministExpen;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile', [App\Http\Controllers\UsersController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
Route::post('/password', [App\Http\Controllers\UsersController::class, 'edit_password'])->name('edit_password')->middleware('auth');



Route::resource('users',UsersController::class)->middleware('auth');
Route::get('/get_users', [App\Http\Controllers\UsersController::class, 'get_users'])->name('get_users')->middleware('auth');

Route::post('user/verify',[UsersController::class,'verify_user'])->name('verify_user')->middleware('auth');
Route::post('user/active',[UsersController::class,'active_user'])->name('active_user')->middleware('auth');
Route::post('user/deactivate',[UsersController::class,'deactivate_user'])->name('deactivate_user')->middleware('auth');
Route::post('user/search',[UsersController::class,'search_user'])->name('search_user')->middleware('auth');



Route::resource('projects',ProjectController::class)->middleware('auth');
Route::get('/get_projects', [App\Http\Controllers\ProjectController::class, 'get_projects'])->name('get_projects')->middleware('auth');
Route::post('/store_project', [App\Http\Controllers\ProjectController::class, 'store_project'])->name('store_project')->middleware('auth');
Route::post('/store_project_details', [App\Http\Controllers\ProjectController::class, 'store_project_details'])->name('store_project_details')->middleware('auth');
Route::get('projects/{id}/business_model/create', [App\Http\Controllers\ProjectbusinessplansController::class, 'create'])->name('create_business_model')->middleware('auth');
Route::post('projects//business_model/storeproblemssolutions', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_problems_solutions'])->name('storeproblemssolutions')->middleware('auth');
Route::post('projects//business_model/storedetailsmarket', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_details_market'])->name('storedetailsmarket')->middleware('auth');
Route::post('projects//business_model/storesalesmarketingchannels', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_sales_marketing_channels'])->name('storesalesmarketingchannels')->middleware('auth');
Route::post('projects//business_model/storecompatitor', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_compatitor'])->name('storecompatitor')->middleware('auth');
Route::post('projects//business_model/storevisionmessagegoals', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_vision_message_goals'])->name('storevisionmessagegoals')->middleware('auth');
Route::post('projects//business_model/storerevenuecost', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_revenue_cost'])->name('storerevenuecost')->middleware('auth');
Route::post('projects//business_model/storeusersdetails', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_users_details'])->name('storeusersdetails')->middleware('auth');
Route::post('projects//business_model/storeservicenamedescription', [App\Http\Controllers\ProjectbusinessplansController::class, 'store_service_name_description'])->name('storeservicenamedescription')->middleware('auth');

Route::delete('project/delete', [ProjectController::class, 'destroy'])->name('proj.del');

Route::resource('sliders',SliderController::class)->middleware('auth');
Route::resource('pages',SystemPageController::class)->middleware('auth');

Route::resource('contacts',SystemContactController::class)->middleware('auth');

Route::resource('services',SystemServicesController::class)->middleware('auth');
Route::resource('projectype',ProjectTypeController::class)->middleware('auth');
Route::resource('adminstExp',AdministExpenController::class)->middleware('auth');

Route::resource('projBpChanlRes',ProjectBpChannelResourceController::class)->middleware('auth');
Route::resource('marketchanel',MarketingChannelController::class)->middleware('auth');
Route::resource('incomSourc',IncomeSourcesController::class)->middleware('auth');
Route::resource('expensisModel',ExpensisModalController::class)->middleware('auth');
Route::resource('mainActivity',MainActivityController::class)->middleware('auth');
Route::resource('saleChanel',SaleChannelController::class)->middleware('auth');

Route::post('slider/search',[SliderController::class,'search_slider'])->name('search_slider')->middleware('auth');
Route::post('project/search',[ProjectController::class,'search_project'])->name('search_project')->middleware('auth');
Route::post('adminstExp/search',[AdministExpenController::class,'search_adminst_expen'])->name('search_adminst_expen')->middleware('auth');
Route::post('mainActivity/search',[MainActivityController::class,'search_mainActivity'])->name('search_mainActivity')->middleware('auth');
Route::post('expensisModel/search',[ExpensisModalController::class,'search_expModal'])->name('search_expModal')->middleware('auth');
Route::post('incomSourc/search',[IncomeSourcesController::class,'search_incomSourc'])->name('search_incomSourc')->middleware('auth');
Route::post('marketchanel/search',[MarketingChannelController::class,'search_marktechanle'])->name('search_marktechanle')->middleware('auth');
Route::post('saleChanel/search',[SaleChannelController::class,'search_salechanel'])->name('search_salechanel')->middleware('auth');
Route::post('projectype/search',[ProjectTypeController::class,'search_projType'])->name('search_projType')->middleware('auth');
Route::post('pages/search',[SystemPageController::class,'search_pages'])->name('search_pages')->middleware('auth');
Route::post('services/search',[SystemServicesController::class,'search_services'])->name('search_services')->middleware('auth');
Route::post('contact/search',[SystemContactController::class,'search_contact'])->name('search_contact')->middleware('auth');


Route::get('view_revenues',[FeasibilityStudiesController::class,'view_revenues'])->name('revenues');


//*************************************************************** Feasibility study ****************************************************************************************

Route::controller(FeasibilityStudiesController::class)->group(function (){
    Route::get('feasibility-study','index')->name('feasibility-study');
    Route::get('strategic-plan','view_strategic_plan')->name('strategic-plan');
    Route::get('market-study','view_market_study')->name('market-study');
    Route::get('administrators','view_administrators')->name('administrators');
    Route::post('create-project-product-service', 'create_service')->name('create_project_product_service');
    Route::post('update-project-product-service', 'update_service')->name('update_project_product_service');
    Route::post('delete-project-product-service', 'delete_service')->name('delete_project_product_service');
    Route::get('fetch_project_services', 'fetch_project_services')->name('fetch_project_services');
});
    Route::resource('fs-account-receivable',\App\Http\Controllers\FsAccountReceivableController::class);
    Route::resource('fs-working-capital',\App\Http\Controllers\FsWorkingCapitalController::class);
    Route::resource('fs-startup-cost',\App\Http\Controllers\FsStartupCostController::class);
    Route::delete('fs_startup_cost/delete', [\App\Http\Controllers\FsStartupCostController::class, 'destroy'])->name('fs_startup_cost.del');
    Route::get('fs_startup_cost/startupCosts', [App\Http\Controllers\FsStartupCostController::class, 'fetchStartupCost'])->name('fetch_startupCosts')->middleware('auth');
    Route::resource('funding-source',\App\Http\Controllers\FundingSourceController::class);
    Route::resource('capital-structure',\App\Http\Controllers\CapitalStructureController::class);
    Route::resource('loan-detail',\App\Http\Controllers\LoanDetailController::class);

//*************************************************************** General Project Income ****************************************************************************************
Route::post('general_project_value_incremental_store',[GeneralProjectIncomeController::class,'value_incremental_store'])->name('general_project_income.value_incremental_store');



Route::resource('general_project_income',GeneralProjectIncomeController::class);
Route::post('general_project_income_store_incremental',[GeneralProjectIncomeController::class,'general_project_income_store_incremental'])->name('general_project_income_store_incremental');
Route::get('view_general_project_income_incremental',[GeneralProjectIncomeController::class,'general_project_income_incremental'])->name('view_general_project_income_incremental');
Route::get('total_revenue',[GeneralProjectIncomeController::class,'total_revenue'])->name('total_revenue');

//*************************************************************** General Project Income Expenses ****************************************************************************************

Route::resource('general_project_income_expenses',GeneralProjectIncomeExpensesController::class);
Route::post('general_project_income_expenses_store_incremental',[GeneralProjectIncomeExpensesController::class,'general_project_income_expenses_store_incremental'])->name('general_project_income_expenses_store_incremental');
Route::get('view_general_project_expenses_incremental',[GeneralProjectIncomeExpensesController::class,'general_project_expenses_incremental'])->name('view_general_project_expenses_incremental');
Route::get('total_expenses',[GeneralProjectIncomeExpensesController::class,'total_expenses'])->name('total_expenses');

//*************************************************************** Project Fs General  Income  ****************************************************************************************
Route::post('project_fs_general_income_store',[ProjectFsGeneralIncomeController::class,'project_fs_general_income_store'])->name('project_fs_general_income_store');
Route::post('project_fs_general_income_icremental_store',[ProjectFsGeneralIncomeIncrementalController::class,'project_fs_general_income_icremental_store'])->name('project_fs_general_income_icremental_store');
Route::post('project_fs_general_income_icremental_detail_store',[ProjectFsGeneralIncomeIncrementalController::class,'project_fs_general_income_icremental_detail_store'])->name('project_fs_general_income_icremental_detail_store');
Route::get('project_fs_general_income_icremental_detail_get',[ProjectFsGeneralIncomeIncrementalController::class,'project_fs_general_income_icremental_detail_get'])->name('project_fs_general_income_icremental_detail_get');
Route::get('project_fs_general_income_icremental_total_revenue',[ProjectFsGeneralIncomeController::class,'project_fs_general_income_icremental_total_revenue'])->name('project_fs_general_income_icremental_total_revenue');

Route::post('project_fs_general_income_delete_item/{id}',[ProjectFsGeneralIncomeController::class,'project_fs_general_income_delete_item'])->name('project_fs_general_income_delete_item');

//*************************************************************** Project EXp General  Income  ****************************************************************************************
Route::post('project_exp_general_income_store',[ProjectExpGeneralIncomeController::class,'project_exp_general_income_store'])->name('project_exp_general_income_store');
Route::post('project_exp_general_income_icremental_store',[ProjectExpGeneralIncomeIncrementalController::class,'project_exp_general_income_icremental_store'])->name('project_exp_general_income_icremental_store');
Route::post('project_exp_general_income_icremental_detail_store',[ProjectExpGeneralIncomeIncrementalController::class,'project_exp_general_income_icremental_detail_store'])->name('project_exp_general_income_icremental_detail_store');
Route::get('project_exp_general_income_icremental_detail_get',[ProjectExpGeneralIncomeIncrementalController::class,'project_exp_general_income_icremental_detail_get'])->name('project_exp_general_income_icremental_detail_get');
Route::get('project_exp_general_income_icremental_total_revenue',[ProjectExpGeneralIncomeController::class,'project_exp_general_income_icremental_total_revenue'])->name('project_exp_general_income_icremental_total_revenue');

Route::get('allـearnings',[ProjectExpGeneralIncomeIncrementalDetailController::class,'allـearnings'])->name('allـearnings');


