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
use App\Http\Controllers\nanis\SearchOrdenesController;
use App\Http\Controllers\nanis\SearchUsuariosController;
use App\Http\Controllers\nanis\ViewConfigController;

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
Route::resource('servicios', SearchOrdenesController::class);
Route::post('servicios_search', [SearchOrdenesController::class, 'autosearch'])->name('servicios_search');
Route::post('ordens_search', [SearchOrdenesController::class, 'autosearch'])->name('ordens_search');
Route::post('ordens_addmodal', [SearchOrdenesController::class, 'addModal'])->name('ordens_addmodal');
Route::post('servicios_addmodal', [SearchOrdenesController::class, 'addModal'])->name('servicios_addmodal');
Route::post('servicios_update', [SearchOrdenesController::class, 'changeStatus'])->name('servicios_update');
Route::post('config_update', [SearchOrdenesController::class, 'changeStatusConfig'])->name('config_update');
Route::post('servicios_editmodal', [SearchOrdenesController::class, 'editModal'])->name('servicios_editmodal');
Route::resource('ordens_insert', SearchOrdenesController::class);

//Search Usuarios Views
Route::post('usuarios_search', [SearchUsuariosController::class, 'autosearch'])->name('usuarios_search');
Route::post('usuarios_addmodal', [SearchUsuariosController::class, 'addModal'])->name('usuarios_addmodal');
Route::resource('promos_insert', SearchUsuariosController::class);
Route::post('usuarios_change_status', [SearchUsuariosController::class, 'changeStatus'])->name('usuarios_change_status');
Route::post('promo_change_status', [SearchUsuariosController::class, 'changeStatusPromo'])->name('promos_change_status');
Route::post('switch_change_status', [SearchUsuariosController::class, 'changeStatusSwitch'])->name('switch_change_status');
Route::post('promos_search', [SearchUsuariosController::class, 'promoAutoSearch'])->name('promos_search');
Route::post('promos_update', [SearchUsuariosController::class, 'promoEdit'])->name('promos_update');
Route::post('promos_editmodal', [SearchUsuariosController::class, 'editModalPromo'])->name('promos_editmodal');
Route::post('promos_addmodal', [SearchUsuariosController::class, 'addModalPromo'])->name('promos_addmodal');

// Config
Route::resource('config', ViewConfigController::class);
// Route::resource('empleados_insert', ViewConfigController::class);
Route::post('empleados_insert', [ViewConfigController::class, 'save'])->name('empleados_insert');
Route::post('empleados_editmodal', [ViewConfigController::class, 'editModalEmpleado'])->name('empleados_editmodal');
Route::post('empleados_addmodal', [ViewConfigController::class, 'addModalEmpleado'])->name('empleados_addmodal');
Route::post('empleados_search', [ViewConfigController::class, 'empleadoAutoSearch'])->name('empleados_search');
Route::post('empleados_update', [ViewConfigController::class, 'empleadoEdit'])->name('empleados_update');
Route::post('empleados_change_status', [ViewConfigController::class, 'changeStatusEmpleado'])->name('empleados_change_status');

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

