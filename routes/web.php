<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\report_dacontroller;
use App\Http\Controllers\EditController;
use App\Http\Controllers\addcontroller;
use App\Http\Controllers\testController;
use App\Http\Controllers\test2Controller;
use App\Http\Controllers\dashboard_Contronller;
use App\Http\Controllers\buildingController;
use App\Http\Controllers\cargivers_Controller;
use App\Http\Controllers\Export_ExcelController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\fsellController;
use App\Http\Controllers\ReportingStatisticsController;
use App\Http\Controllers\qrcontroller;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\sellController;
use App\Http\Controllers\tableNController;
use App\Http\Controllers\tb_typeController;
use App\Http\Controllers\templateController;
use App\Http\Livewire\Tables;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\building;
use App\Models\room;
use App\Models\tb_cargiver;
use App\Models\tb_type;
use Illuminate\Support\Facades\DB;
use Inertia\Middleware;
use App\http\Middleware\admin;
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

// Route::get('/', function () {

//     return Inertia('Welcome',);
// });





Route::get('/', function () {

    return view('user.index');
});

Route::get('/bashboard', function () {

    return view('user.template.startbootstrap-sb-admin-2-gh-pages.show_dashboard ');
});


Route::post('/report', function () {
    return view('user.report');
});

Route::get('/index_view', function () {
    return view('user.index');
});

Route::get('/show_user', function () {
    return view('user.show');
});

Route::get('/map', function () {
    return view('user.map');
});

Route::post('/search', function () {
    return view('user.search');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::post('/login_db', function () {
    return view('user.login_db');
});

Route::post('/form_login', function () {
    return view('user.form_login');
});


/////////////////////////////

Route::get('/cargivers_view', function () {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'tb_cargivers')
        ->join(env('PREFIX') . 'user_statuses', env('PREFIX') . 'tb_cargivers.user_statuses', '=', env('PREFIX') . 'user_statuses.id')
        ->get();
    return view('user.cargivers', compact('status', 'data'));
});


Route::get('/types_view', function () {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'tb_types')->get();
    return view('user.types', compact('status', 'data'));
});

Route::get('/room_view/{building_id}', function ($building_id) {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'rooms')->get();
    $data_buildings = DB::table(env('PREFIX') . 'buildings')->get();
    return view('user.room', compact('status', 'data', 'data_buildings', 'building_id'));
});




Route::get('/building_view', function () {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'buildings')
        ->orderBy('building_name', 'asc')
        ->get();
    return view('user.building', compact('status', 'data'));
});


//////////////////////////////////









Route::get('/map_admin', function () {
    return view('admin.map');
});

Route::get('/testqr', function () {
    return view('admin.testqr');
});

Route::post('/testqr', function () {
    return view('admin.testqr');
});

Route::get('/test_geo ', function () {
    return view('admin.template_admin.test-styleV1');
});





/* Route::get('/testqou', function () {
    return view('admin.testqou');
});Route::post('/testqou', function () {
    return view('admin.testqou');
}); */

Route::resource('/ptest', test2Controller::class);

Route::resource('/testqou', testController::class);

// Route::post('/callpic', [testController::class, 'callpic']);

Route::match(['get', 'post'], '/callpic', function () {
    // Your code here
    $data_pic = DB::table(env('PREFIX') . 'pictures')->get();

    return view('admin.callpic', compact('data_pic'));
});
/* Route::post('/callpic', function () {
    $data_pic = DB::table('pictures')->get();

    return view('admin.callpic', compact('data_pic'));
}); */

/* Route::get('/ptest', function () {
    return view('admin.ptest');
});

Route::post('/ptest', function () {
    return view('admin.ptest');
}); */
// 


//////////////////////////////////ต้องมีทั้ง get and post 
// Route::post('/add', function () {
//     return view('admin.add');
// });
// Route::get('/add', function () {
//     return view('admin.add');
// });
/////////////////////////////////////////
Route::get('/index_admin', function () {
    return view('admin.index');
});

// ->middleware('admin');
Route::get('/show_admin', function () {
    return view('admin.show');
});

Route::post('/search_admin', function () {
    return view('admin.search');
});

Route::get('/table_showimage', function () {
    return view('admin.template_admin.table_showimage');
});
Route::post('/table_showimage', function () {
    return view('admin.template_admin.table_showimage');
});

Route::get('/table_showedit', function () {
    return view('admin.template_admin.table_showedit');
});
Route::post('/table_showedit', function () {
    return view('admin.template_admin.table_showedit');
});

Route::get('/table_showsell', function () {
    return view('admin.template_admin.table_showsell');
});
Route::post('/table_showsell', function () {
    return view('admin.template_admin.table_showsell');
});

Route::get('/report_showimage', function () {
    return view('admin.template_admin.report_showimage');
});

Route::post('/report_showimage', function () {
    return view('admin.template_admin.report_showimage');
});

Route::get('/report_map', function () {
    return view('admin.template_admin.report_map');
});

Route::post('/report_map', function () {
    return view('admin.template_admin.report_map');
});



Route::get('/search_admin', function () {
    return view('admin.search');
});
Route::post('/inserdata', function () {
    return view('admin.inserdata');
});

Route::get('/export', function () {
    return view('admin.template_admin.export');
});






Route::get('/table', function () {
    $stateQR = 0;
    return view('admin.table', compact('stateQR'));
});
Route::post('/table', function () {
    $stateQR = 0;
    return view('admin.table', compact('stateQR'));
});

Route::get('/tableN', function () {
    $stateQR = 0;
    return view('admin.template_admin.tableex', compact('stateQR'));
});
Route::post('/tableN', function () {
    $stateQR = 0;
    return view('admin.template_admin.tableex', compact('stateQR'));
});
Route::get('/tableNController/show', [tableNController::class, 'show']);

///////////////////////////////
Route::post('/showdura', function () {
    return view('admin.showdura');
});
Route::get('/showdura', function () {
    return view('admin.showdura');
});
///////////////////////////////
Route::post('/deletetable', function () {
    return view('admin.deletetable');
});



Route::get('/updatedata', function () {
    return view('admin.updatedata');
});
Route::post('/updatedata', function () {
    return view('admin.updatedata');
});

Route::post('/deletepic', function () {
    return view('admin.deletepic');
});

Route::post('/editpic', function () {
    return view('admin.editpic');
});

Route::post('/deleteall', function () {
    return view('admin.deleteall');
});

Route::post('/addpic', function () {
    return view('admin.addpic');
});

/* Route::get('/fsell', function () {
    return view('admin.history');
}); */



Route::post('/deletecheck', function () {
    return view('admin.deletecheck');
});

Route::post('/deletecheck', function () {
    return view('admin.deletecheck');
});

Route::get('/cargivers', function () {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'tb_cargivers')
        ->join(env('PREFIX') . 'user_statuses', env('PREFIX') . 'tb_cargivers.user_statuses', '=', env('PREFIX') . 'user_statuses.id')
        ->get();
    return view('admin.cargivers', compact('status', 'data'));
});


Route::get('/types', function () {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'tb_types')->get();
    return view('admin.types', compact('status', 'data'));
});

Route::get('/room/{building_id}', function ($building_id) {
    $status = 'view';
    $data = DB::table(env('PREFIX') . 'rooms')->get();
    $data_buildings = DB::table(env('PREFIX') . 'buildings')->orderBy('building_name', 'asc')->get();
    return view('admin.room', compact('status', 'data', 'data_buildings', 'building_id'));
});

Route::get('/building', function () {
    $status = 'view';
    
    $data = DB::table(env('PREFIX') . 'buildings')
    ->orderBy('building_name', 'asc')
    ->get();
    return view('admin.building', compact('status', 'data'));
});

Route::get('/EX', function () {
    return view('admin.template_admin.Export_broken');
});

Route::get('/edit_table', function () {
    return view('admin.template_admin.edit_table');
});




Route::get('/get/{filename}', [FileController::class, 'getfile']);




//  Route::resource('/showreport',report_dacontroller::class);

Route::resource('/fsell', fsellController::class);


Route::resource('/tableneo', EditController::class);

Route::post('/tableneo/sell', [EditController::class, 'sell']);

Route::post('/delpiccar', [EditController::class, 'deletePicture'])->name('deletePicture');
Route::post('/editpiccar', [EditController::class, 'editPicture'])->name('editPicture');
Route::post('/addpiccar', [EditController::class, 'addrealPicture'])->name('addrealPicture');
Route::post('/fetch_carousel_data', [testController::class, 'fetchData'])->name('fetchData');


// fortest send file realtime

/* Route::post('/delpiccar', [testController::class, 'deletePicture']); */
/* 
Route::resource('/tabletest', testController::class); */
//  Route::post('tableneo/{id}','EditController@update');

// Route::get('/tableneo/show/{caregiver_name}/{user_statuses}', [EditController::class, 'show']);


// Route::get('/tableneo/show/{caregiver_name}/{user_statuses}', Tables::class);

Route::get('/tableneo/show/{caregiver_name}/{user_statuses}', function () {
    return view('admin.template_admin.edit_table');
});

Route::get('/tableneo/show_trash/{caregiver_name}/{user_statuses}', function () {
    return view('admin.trash_table');
});



Route::post('/tableneo/{id}', [EditController::class, 'update']);

//  Route::post('/tableneo/{id}',[EditController::class,'update']);

Route::post('/deletetableneo/{da_id}/{caregiver_name}/{user_statuses}', [EditController::class, 'destroy'])
    ->where('da_id', '(.+)')
    ->where('caregiver_name', '(.+)')
    ->where('user_statuses', '(.+)');

Route::post('/confirm_destroy/{da_id}/{caregiver_name}/{user_statuses}', [EditController::class, 'confirm_destroy'])
    ->where('da_id', '(.+)')
    ->where('caregiver_name', '(.+)')
    ->where('user_statuses', '(.+)');

Route::post('/deleterow', [EditController::class, 'destroy'])->name('destroy');


Route::post('/deletepiccar', [EditController::class, 'deletepic']);

Route::get('/sell/{da_id}', [sellController::class, 'showSellForm']);

Route::post('/sellup/{da_id}', [sellController::class, 'update']);


//Route::post('/download-qr-code', QrCodeController::class);

Route::get('generate', [QrCodeController::class, 'generate']);


Route::resource('/add', addcontroller::class);

Route::resource('/report_statistics', ReportingStatisticsController::class);
Route::get('/report_statistics/store/{da_id}', [ReportingStatisticsController::class, 'store']);



Route::resource('/report', report_dacontroller::class);



Route::get('/Export_Excel/show_survey', [Export_ExcelController::class, 'show_survey']);
Route::get('/Export_Excel/Export_survey/{status_like}/{like_data}', [Export_ExcelController::class, 'Export_survey']);
Route::get('/Export_Excel/show_broken', [Export_ExcelController::class, 'show_broken']);
Route::get('/Export_Excel/Export_broken', [Export_ExcelController::class, 'Export_broken']);

Route::post('/report/destroy', [report_dacontroller::class, 'destroy']);
Route::get('/report/show/{caregiver_name}/{user_statuses}', [report_dacontroller::class, 'show']);
Route::get('/report/showMap/{caregiver_name}/{user_statuses}/{address}', [report_dacontroller::class, 'showMap']);
Route::post('/report/update', [report_dacontroller::class, 'update']);


// Route::get('/add/create','addcontroller@create');
//  Route::post('/add',[addcontroller::class,'store']);
//  Route::get('/users', [UserController::class, 'index']);


// Route::get('/report', [report_dacontroller::class, 'create']);
// Route::get('/qrcode/{da_id}', 'QRCodeController@downloadQRCode')->name('download-qrcode');
Route::get('/qrcode/{da_id}/{da_name}/{caregiver_name}/{da_price}', [QrCodeController::class, 'downloadQRCode']);


//Route::get('/qrcode/{da_id}',[qrcontroller::class,'downloadQRCode']);
//Route::get('/qrcode/{da_id}',[qrcontroller::class,'create']);

Route::POST('/roomController/store', [roomController::class, 'store']);
Route::POST('/roomController/change_room', [roomController::class, 'change_room']);
Route::POST('/buildingController/store', [buildingController::class, 'store']);
Route::POST('/buildingController/change_building', [buildingController::class, 'change_building']);
Route::POST('/cargivers_Controller/store', [cargivers_Controller::class, 'store']);

Route::POST('/tb_typeController/store', [tb_typeController::class, 'store']);
Route::POST('/tb_typeController/change_type', [tb_typeController::class, 'change_type']);
// Route::resource('/templateController',templateController::class);

Route::POST('/templateController/update/{id}', [templateController::class, 'update']);
Route::get('/templateController/show', [templateController::class, 'show']);

Route::get('/templateController/show_building/{GetStr}', [templateController::class, 'show_building']);
Route::get('/templateController/show_cargivers/{GetStr}', [templateController::class, 'show_cargivers']);
Route::post('/templateController/DeleteIdcargivers/', [templateController::class, 'DeleteIdcargivers']);
Route::post('/templateController/AddIdcargivers/', [templateController::class, 'AddIdcargivers']);
Route::post('/templateController/change_name/', [templateController::class, 'change_name']);
Route::get('/templateController/show_room/{GetStr}/{Getbuild?}/{building_id?}', [templateController::class, 'show_room']);
Route::get('/templateController/show_types/{GetStr}', [templateController::class, 'show_types']);


Route::get('/markers', [MarkerController::class, 'index']);
Route::get('/dashboard_view', [dashboard_Contronller::class, 'user']);
Route::get('/dashboard', [dashboard_Contronller::class, 'admin']);
Route::post('/dashboard', [dashboard_Contronller::class, 'admin']);

Route::get('/export/sql', [ExportController::class, 'exportSQL']);
Route::get('/export/file', [ExportController::class, 'download_html']);


// Route::get('/form_edit_template', function () {
//     return view('admin.template_admin.form_edit_template');
// });

// Route::get('/edit_template', function () {
//     return view('admin.edit_template');
// });
