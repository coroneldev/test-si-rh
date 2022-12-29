<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Rh\UserController;

use App\Http\Controllers\Api\Rh\ClEstadoCivilController;
use App\Http\Controllers\Api\Rh\ClGeneroController;
use App\Http\Controllers\Api\Rh\ClParentescoController;
use App\Http\Controllers\Api\Rh\ClPaisController;
use App\Http\Controllers\Api\Rh\ClCiudadController;
use App\Http\Controllers\Api\Rh\ClTipoDocumentoController;
use App\Http\Controllers\Api\Rh\ClInstitucionController;
use App\Http\Controllers\Api\Rh\ClNivelEstudioController;
use App\Http\Controllers\Api\Rh\ClEstadoController;

use App\Http\Controllers\Api\Rh\ClCategoriaViajeController;
use App\Http\Controllers\Api\Rh\ClClasificacionController;
use App\Http\Controllers\Api\Rh\ClEstructuraOrganizacionalController;
use App\Http\Controllers\Api\Rh\ClHorarioController;
use App\Http\Controllers\Api\Rh\ClIdentificadorController;
use App\Http\Controllers\Api\Rh\ClOrganismoFinanciadorController;
use App\Http\Controllers\Api\Rh\ClPuestoController;
use App\Http\Controllers\Api\Rh\ClTipoContratoController;
use App\Http\Controllers\Api\Rh\TrnInsumoController;

use App\Http\Controllers\Api\Rh\TrnPersonaController;
use App\Http\Controllers\Api\Rh\TrnParentescoController;
use App\Http\Controllers\Api\Rh\TrnDocumentoDigitalController;
use App\Http\Controllers\Api\Rh\TrnIdiomaController;
use App\Http\Controllers\Api\Rh\TrnCursoController;
use App\Http\Controllers\Api\Rh\TrnFormacionAcademicaController;
use App\Http\Controllers\Api\Rh\TrnExperienciaLaboralController;
use App\Http\Controllers\Api\Rh\TrnDatoLaboralController;
use App\Http\Controllers\Api\Rh\TrnDeclaracionJuradaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registrarse', [UserController::class, 'register']);
Route::post('ingresar', [UserController::class, 'login']);

Route::get('/personas', [TrnPersonaController::class, 'index']);
Route::post('/personas', [TrnPersonaController::class, 'store']);
Route::get('/personas/{id}', [TrnPersonaController::class, 'show']);
Route::put('/personas/{id}', [TrnPersonaController::class, 'update']);

Route::get('/tipos-documentos', [ClTipoDocumentoController::class, 'index']);

Route::get('/documentos', [TrnDocumentoDigitalController::class, 'index']);
Route::post('/documentos', [TrnDocumentoDigitalController::class, 'store']);
Route::post('/documentos/adjunto/{id}', [TrnDocumentoDigitalController::class, 'DocuemntoAdjunto']);
Route::get('/documentos/persona/{id_persona}/{tipo_documento_id}/{id_tabla}', [TrnDocumentoDigitalController::class, 'documentoPersonaIdTabla']);
Route::put('/documentos/{id}', [TrnDocumentoDigitalController::class, 'update']);
Route::post('/documentos/archivos', [TrnDocumentoDigitalController::class, 'cargarArchivo']);


Route::get('/estados-civiles', [ClEstadoCivilController::class, 'index']);
Route::post('/estados-civiles', [ClEstadoCivilController::class, 'store']);
Route::put('/estados-civiles/{id}', [ClEstadoCivilController::class, 'update']);

Route::get('/generos', [ClGeneroController::class, 'index']);
Route::post('/generos', [ClGeneroController::class, 'store']);
Route::put('/generos/{id}', [ClGeneroController::class, 'update']);

Route::get('/paises', [ClPaisController::class, 'index']);
Route::post('/paises', [ClPaisController::class, 'store']);
Route::put('/paises/{id}', [ClPaisController::class, 'update']);

Route::get('/ciudades', [ClCiudadController::class, 'index']);
Route::post('/ciudades', [ClCiudadController::class, 'store']);
Route::put('/ciudades/{id}', [ClCiudadController::class, 'update']);

Route::get('/parentescos', [ClParentescoController::class, 'index']);
Route::post('/parentescos', [ClParentescoController::class, 'store']);
Route::put('/parentescos/{id}', [ClParentescoController::class, 'update']);

/*Clasificadores Datos laborales*/

Route::get('/tipos-contratos', [ClTipoContratoController::class, 'index']);
Route::post('/tipos-contratos', [ClTipoContratoController::class, 'store']);
Route::get('/tipos-contratos/{id}', [ClTipoContratoController::class, 'show']);
Route::put('/tipos-contratos/{id}', [ClTipoContratoController::class, 'update']);

Route::get('/estructuras-organizacionales', [ClEstructuraOrganizacionalController::class, 'index']);
Route::post('/estructuras-organizacionales', [ClEstructuraOrganizacionalController::class, 'store']);
Route::get('/estructuras-organizacionales/{id}', [ClEstructuraOrganizacionalController::class, 'show']);
Route::put('/estructuras-organizacionales/{id}', [ClEstructuraOrganizacionalController::class, 'update']);


Route::get('/catetgorias-viaje', [ClCategoriaViajeController::class, 'index']);
Route::get('/clasificaciones', [ClClasificacionController::class, 'index']);
Route::get('/horarios', [ClHorarioController::class, 'index']);
Route::get('/identificadores', [ClIdentificadorController::class, 'index']);
Route::get('/organismos-finaciadores', [ClOrganismoFinanciadorController::class, 'index']);
Route::get('/puestos', [ClPuestoController::class, 'index']);
Route::get('/insumos-personas', [TrnInsumoController::class, 'index']);


Route::get('/parentescos-personas', [TrnParentescoController::class, 'index']);
Route::post('/parentescos-personas', [TrnParentescoController::class, 'store']);
Route::put('/parentescos-personas/{id}', [TrnParentescoController::class, 'update']);
Route::get('/parentescos-personas/{id}', [TrnParentescoController::class, 'show']);
Route::get('/parentescos-personas/persona/{id_persona}', [TrnParentescoController::class, 'parentescoPersonaId']);


Route::get('/idiomas-personas', [TrnIdiomaController::class, 'index']);
Route::post('/idiomas-personas', [TrnIdiomaController::class, 'store']);
Route::put('/idiomas-personas/{id}', [TrnIdiomaController::class, 'update']);
Route::get('/idiomas-personas/{id}', [TrnIdiomaController::class, 'show']);
Route::get('/idiomas-personas/persona/{id}', [TrnIdiomaController::class, 'idiomaPersonaId']);

Route::get('/instituciones', [ClInstitucionController::class, 'index']);
Route::post('/instituciones', [ClInstitucionController::class, 'store']);
Route::put('/instituciones/{id}', [ClInstitucionController::class, 'update']);
Route::get('/instituciones/{id}', [ClInstitucionController::class, 'show']);

Route::get('/niveles-estudios', [ClNivelEstudioController::class, 'index']);
Route::post('/niveles-estudios', [ClNivelEstudioController::class, 'store']);
Route::put('/niveles-estudios/{id}', [ClNivelEstudioController::class, 'update']);
Route::get('/niveles-estudios/{id}', [ClNivelEstudioController::class, 'show']);

Route::get('/declaraciones-juradas', [TrnDeclaracionJuradaController::class, 'index']);
Route::post('/declaraciones-juradas', [TrnDeclaracionJuradaController::class, 'store']);
Route::get('/declaraciones-juradas/{id}', [TrnDeclaracionJuradaController::class, 'show']);
Route::put('/declaraciones-juradas/{id}', [TrnDeclaracionJuradaController::class, 'update']);
Route::get('/declaraciones-juradas/persona/{id}', [TrnDeclaracionJuradaController::class, 'declaracionJuaradaPersonaId']);

Route::get('/estados', [ClEstadoController::class, 'index']);
Route::post('/estados', [ClEstadoController::class, 'store']);
Route::get('/estados/seccion/{id}', [ClEstadoController::class, 'estadosPorSeccion']);
Route::put('/estados/{id}', [ClEstadoController::class, 'update']);
Route::get('/estados/{id}', [ClEstadoController::class, 'show']);

Route::get('/formaciones-academicas', [TrnFormacionAcademicaController::class, 'index']);
Route::post('/formaciones-academicas', [TrnFormacionAcademicaController::class, 'store']);
Route::get('/formaciones-academicas/{id}', [TrnFormacionAcademicaController::class, 'show']);
Route::put('/formaciones-academicas/{id}', [TrnFormacionAcademicaController::class, 'update']);
Route::get('/formaciones-academicas/persona/{id}', [TrnFormacionAcademicaController::class, 'formacionesPersonaId']);

Route::get('/experiencias-laborales', [TrnExperienciaLaboralController::class, 'index']);
Route::post('/experiencias-laborales', [TrnExperienciaLaboralController::class, 'store']);
Route::get('/experiencias-laborales/{id}', [TrnExperienciaLaboralController::class, 'show']);
Route::put('/experiencias-laborales/{id}', [TrnExperienciaLaboralController::class, 'update']);
Route::get('/experiencias-laborales/persona/{id}', [TrnExperienciaLaboralController::class, 'ExperienciaLaboralPersonaId']);

Route::get('/cursos-personas', [TrnCursoController::class, 'index']);
Route::post('/cursos-personas', [TrnCursoController::class, 'store']);
Route::get('/cursos-personas/{id}', [TrnCursoController::class, 'show']);
Route::put('/cursos-personas/{id}', [TrnCursoController::class, 'update']);
Route::get('/cursos-personas/persona/{id_persona}/{tipo}', [TrnCursoController::class, 'CursoPersonaIdTipo']);

Route::get('/datos-laborales', [TrnDatoLaboralController::class, 'index']);
Route::post('/datos-laborales', [TrnDatoLaboralController::class, 'store']);
Route::get('/datos-laborales/{id}', [TrnDatoLaboralController::class, 'show']);
Route::put('/datos-laborales/{id}', [TrnDatoLaboralController::class, 'update']);
Route::get('/datos-laborales/persona/{id}', [TrnDatoLaboralController::class, 'datoLaboralPersonaId']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get('logout', [UserController::class, 'logout']);
});
