<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Designers;
use App\Http\Livewire\DesignerLists;
use App\Http\Livewire\DesignerCaseSteps;
use App\Http\Livewire\Designers\AddTestCaseStepsForm;
use App\Http\Livewire\Designers\CreateDesigner;
use App\Http\Livewire\Designers\IndexDesigner;
use App\Http\Livewire\Designers\RedesignTestCase;

use App\Http\Livewire\Designers\RedesignTestCaseForm;

use App\Http\Livewire\Designers\RedesignTestCaseStepForm;

use App\Http\Livewire\Designers\RedesignTestData;
use App\Http\Livewire\Designers\RedesignTestDataForm;
use App\Http\Livewire\Designers\TestCaseStepDataForm;
use App\Http\Livewire\Executors;

use App\Http\Livewire\Reviewers\ShowTestDataReviewer;

use App\Http\Livewire\Executors\CreateExecutor;
use App\Http\Livewire\Executors\IndexExecutor;
use App\Http\Livewire\Executors\ShowExecutor;
use App\Http\Livewire\Executors\ShowTestData;
use App\Http\Livewire\Executors\ShowTestDataExecutor;
use App\Http\Livewire\GeneralTestCase;
use App\Http\Livewire\GeneralTestCaseShow;
use App\Http\Livewire\Histories;

use App\Http\Livewire\Projects\IndexProject;
// use App\Http\Livewire\IndexProject;


use App\Http\Livewire\Priorites\IndexPriority;

use App\Http\Livewire\Reviewers;
use App\Http\Livewire\Reviewers\AddTestCaseComment;
use App\Http\Livewire\Reviewers\IndexReviewer;
use App\Http\Livewire\Reviewers\ShowTestCaseData;
use App\Http\Livewire\Statuses\IndexStatus;
use App\Http\Livewire\Statuses\StatusForm;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('designer/index', IndexDesigner::class)->name('designer.live');
    Route::get('testcase/design', CreateDesigner::class)->name('test_case.design');
    Route::get('testcase/design/{test_case}/edit', CreateDesigner::class)->name('test_case.edit');

    Route::get('testcase/design/{test_case}/steps', AddTestCaseStepsForm::class)->name('test_case.steps');
    Route::get('testcase/design/{test_case}/steps/redesign', AddTestCaseStepsForm::class)->name('redesign.steps');

    Route::get('testcase/design/step/{test_case_step}/data-requirements', TestCaseStepDataForm::class)->name('test_case_steps.add-data-requirements');
    Route::get('/designer/livewire/history' , Histories::class)->name('history.live');
    Route::get('/designer/designercasesteps', DesignerCaseSteps::class)->name('designer.designercasesteps');
    Route::get('/designer/redesign/{test_case}', RedesignTestCase::class)->name('designer.redesign');
    Route::get('designer/redesign/{test_case_step}/step', RedesignTestCaseStepForm::class)->name('redesign.testcasestep');
    Route::get('designer/redesign/{test_data}/data-requirements', RedesignTestDataForm::class)->name('redesign.testdata');
    Route::get('designer/redesign/{test_case}/test-case', RedesignTestCaseForm::class)->name('redesign.testcase');
    Route::get('general/testcase', GeneralTestCase::class)->name('general.testcase');
    Route::get('general/testcase/{test_case}/show', GeneralTestCaseShow::class)->name('general.show');



    Route::get('/reviewer/index', IndexReviewer::class)->name('reviwer.live');
    Route::get('testcase/review/{test_case}/details', ShowTestCaseData::class)->name('test_case.show');
    Route::get('testcase/review/step/{test_case_step}/testdata', ShowTestDataReviewer::class)->name('test_data.show');

    // Route::get('testcase/review/details/{test_case_step}/addcomment', AddTestCaseComment::class)->name('test_case.add-comment');

    Route::get('/executor', Executors::class)->name('executor.live');
    Route::get('testcase/executor', IndexExecutor::class)->name('test_case.executor');
    Route::get('testcase/executor/{test_case}/show', ShowExecutor::class)->name('show.executor');
    Route::get('testcase/executor/{test_case_step}/create', CreateExecutor::class)->name('create.executor');
    // Route::get('testcase/executor/{test_case_step}/showtestdata', ShowTestDataExecutor::class)->name('showtestdata.executor');


    Route::get('/project/index', IndexProject::class)->name('project.index');

    Route::get('/status', IndexStatus::class)->name('status.index');
    // Route::get('status/edit/{status}', StatusForm::class)->name('status.edit');
    // Route::get('status/create', StatusForm::class)->name('status.create');
    Route::get('/priority', IndexPriority::class)->name('priority.index');




    // Route::get('designer/index', IndexDesigner::class)->name('designer.index');


    Route::group(['namespace' => 'App\Http\Controllers'], function () {

        Route::get('designer/history', 'DesignerController@history')->name('designer.history');
        // Route::get('/designer/designercasesteps', 'DesignerController@designercasesteps')->name('designer.designercasesteps');
        Route::post('/designer/designercase', 'DesignerController@designercase')->name('designer.designercase');
        Route::resource('/designer', 'DesignerController');
        Route::resource('/history', 'HistoryController');






        Route::controller('ViewGeneratorController')->group(function () {
            Route::get('viewgenerator/gettables', ['as' => 'viewgenerator.gettables', 'uses' => 'ViewGeneratorController@gettables']);
            Route::get('viewgenerator/{table}/index', ['as' => 'viewgenerator.index', 'uses' => 'ViewGeneratorController@index']);
            Route::get('viewgenerator/{table}/edit', ['as' => 'viewgenerator.edit', 'uses' => 'ViewGeneratorController@edit']);
            Route::get('viewgenerator/{table}/create', ['as' => 'viewgenerator.create', 'uses' => 'ViewGeneratorController@create']);
            Route::get('viewgenerator/{table}/model', ['as' => 'viewgenerator.model', 'uses' => 'ViewGeneratorController@model']);
            Route::get('viewgenerator/{table}/create/live', ['as' => 'viewgenerator.createlive', 'uses' => 'ViewGeneratorController@createlive']);
        });
    });
});
