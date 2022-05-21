<?php
use App\Http\Controllers\APIController;
use App\Http\Controllers\control_escolar\blocks\SearchAlumnosController;
use App\Http\Controllers\control_escolar\blocks\SearchCarrerasController;
use App\Http\Controllers\control_escolar\blocks\SearchDocentesController;
use App\Http\Controllers\control_escolar\ViewControlEscolarController;
use App\Http\Controllers\CursoDescriptionController;
use App\Http\Controllers\CursoDetailsController;
use App\Http\Controllers\cursos\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ViewDashboardController;
use App\Http\Controllers\ViewPanelControlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('login', LoginController::class);
Route::get('cerrar_sesion', [LoginController::class, 'logout'])->name('login.logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('control_escolar', ViewControlEscolarController::class);
/* Route::get('test_alumnos', [ViewControlEscolarController::class, 'store'])->name('test_alumnos'); */
Route::resource('panel_control', ViewPanelControlController::class);
Route::resource('views', ViewDashboardController::class);

//Search Ordenes Views
Route::post('ordenes_search', [SearchOrdenesController::class, 'autosearch'])->name('ordenes_search');

//Search Alumnos Views
Route::post('alumnos_search', [SearchAlumnosController::class, 'autosearch'])->name('alumnos_search');
Route::post('alumnos_editmodal', [SearchAlumnosController::class, 'editModal'])->name('alumnos_editmodal');
Route::post('alumnos_addmodal', [SearchAlumnosController::class, 'addModal'])->name('alumnos_addmodal');
/* Route::get('alumnos_testmail', [SearchAlumnosController::class, 'testMain'])->name('alumnos_testmail'); */

Route::post('alumnos_update', [SearchAlumnosController::class, 'actualizarAlumno'])->name('alumnos_update');
Route::post('alumnos_single_update', [SearchAlumnosController::class, 'actualizarSingleAlumno'])->name('alumnos_single_update');
Route::post('alumnos_change_status', [SearchAlumnosController::class, 'changeStatus'])->name('alumnos_change_status');
Route::post('alumnos_delete', [SearchAlumnosController::class, 'deleteAlumno'])->name('alumnos_delete');
Route::resource('alumnos_insert', SearchAlumnosController::class);
Route::post('alumno_kardex_pdf', [PDFController::class, 'generatePDF'])->name('alumno_kardex_pdf');
Route::post('alumnos_excel', [ExcelController::class, 'exportExcelUsuarios'])->name('alumnos_excel');

//Search Docentes
Route::post('docentes_search', [SearchDocentesController::class, 'autosearch'])->name('docentes_search');
Route::post('docentes_addmodal', [SearchDocentesController::class, 'addModal'])->name('docentes_addmodal');
Route::post('docentes_editmodal', [SearchDocentesController::class, 'editModal'])->name('docentes_editmodal');
Route::post('docentes_update', [SearchDocentesController::class, 'actualizarDocente'])->name('docentes_update');
Route::resource('docentes_insert', SearchDocentesController::class);

//Carrera
Route::resource('carrera', SearchCarrerasController::class);
Route::post('carrera_addmodal', [SearchCarrerasController::class, 'addModal'])->name('carrera_addmodal');
Route::post('carrera_editmodal', [SearchCarrerasController::class, 'editModal'])->name('carrera_editmodal');
Route::post('carrera_update', [SearchCarrerasController::class, 'actualizarCarrera'])->name('carrera_update');

//View cursos
Route::get('dashboard/curso_details', [CursoDetailsController::class, 'index'])->name('curso_details');
Route::resource('curso', CursoDescriptionController::class);
Route::post('test_files', [CursoController::class, 'testFiles'])->name('test_files');

//API
Route::get('usuarios', [APIController::class, 'Usuario'])->name('usuarios');

Route::get('views_test', [ViewDashboardController::class, 'store'])->name('views_test');

Route::get('verb_list', [ExcelController::class, 'importListVerb'])->name('verb_list');

