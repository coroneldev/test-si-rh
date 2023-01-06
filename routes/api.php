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
use App\Http\Controllers\Api\Rh\ClIdiomaController;
use App\Http\Controllers\Api\Rh\ClSistemaController;
use App\Http\Controllers\Api\Rh\ClRolController;

use App\Http\Controllers\Api\Rh\TrnAccesoController;
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

Route::get('usuarios', [UserController::class, 'index']);
Route::post('usuarios', [UserController::class, 'store']);
Route::post('usuarios/ingreso', [UserController::class, 'ingresar']);
Route::get('usuarios/salir', [UserController::class, 'salir']);

/*CLASIFICADORES*/
Route::get('/estados-civiles', [ClEstadoCivilController::class, 'index']);
Route::post('/estados-civiles', [ClEstadoCivilController::class, 'store']);
Route::get('/estados-civiles/{id}', [ClEstadoCivilController::class, 'show']);
Route::put('/estados-civiles/{id}', [ClEstadoCivilController::class, 'update']);
Route::delete('/estados-civiles/{id}', [ClEstadoCivilController::class, 'destroy']);

Route::get('/generos', [ClGeneroController::class, 'index']);
Route::post('/generos', [ClGeneroController::class, 'store']);
Route::get('/generos/{id}', [ClGeneroController::class, 'show']);
Route::put('/generos/{id}', [ClGeneroController::class, 'update']);
Route::delete('/generos/{id}', [ClGeneroController::class, 'destroy']);

Route::get('/paises', [ClPaisController::class, 'index']);
Route::post('/paises', [ClPaisController::class, 'store']);
Route::get('/paises/{id}', [ClPaisController::class, 'show']);
Route::put('/paises/{id}', [ClPaisController::class, 'update']);
Route::delete('/paises/{id}', [ClPaisController::class, 'destroy']);

Route::get('/ciudades', [ClCiudadController::class, 'index']);
Route::post('/ciudades', [ClCiudadController::class, 'store']);
Route::get('/ciudades/{id}', [ClCiudadController::class, 'show']);
Route::put('/ciudades/{id}', [ClCiudadController::class, 'update']);
Route::delete('/ciudades/{id}', [ClCiudadController::class, 'destroy']);

Route::get('/parentescos', [ClParentescoController::class, 'index']);
Route::post('/parentescos', [ClParentescoController::class, 'store']);
Route::get('/parentescos/{id}', [ClParentescoController::class, 'show']);
Route::put('/parentescos/{id}', [ClParentescoController::class, 'update']);
Route::delete('/parentescos/{id}', [ClParentescoController::class, 'destroy']);

Route::get('/tipos-documentos', [ClTipoDocumentoController::class, 'index']);
Route::post('/tipos-documentos', [ClTipoDocumentoController::class, 'store']);
Route::get('/tipos-documentos/{id}', [ClTipoDocumentoController::class, 'show']);
Route::put('/tipos-documentos/{id}', [ClTipoDocumentoController::class, 'update']);
Route::delete('/tipos-documentos/{id}', [ClTipoDocumentoController::class, 'destroy']);

Route::get('/instituciones', [ClInstitucionController::class, 'index']);
Route::post('/instituciones', [ClInstitucionController::class, 'store']);
Route::get('/instituciones/{id}', [ClInstitucionController::class, 'show']);
Route::put('/instituciones/{id}', [ClInstitucionController::class, 'update']);
Route::delete('/instituciones/{id}', [ClInstitucionController::class, 'destroy']);

Route::get('/niveles-estudios', [ClNivelEstudioController::class, 'index']);
Route::post('/niveles-estudios', [ClNivelEstudioController::class, 'store']);
Route::get('/niveles-estudios/{id}', [ClNivelEstudioController::class, 'show']);
Route::put('/niveles-estudios/{id}', [ClNivelEstudioController::class, 'update']);
Route::delete('/niveles-estudios/{id}', [ClNivelEstudioController::class, 'destroy']);

Route::get('/estados', [ClEstadoController::class, 'index']);
Route::post('/estados', [ClEstadoController::class, 'store']);
Route::get('/estados/{id}', [ClEstadoController::class, 'show']);
Route::put('/estados/{id}', [ClEstadoController::class, 'update']);
Route::delete('/estados/{id}', [ClEstadoController::class, 'destroy']);
Route::get('/estados/seccion/{seccion_id}', [ClEstadoController::class, 'estadosPorSeccion']);

Route::get('/catetgorias-viaje', [ClCategoriaViajeController::class, 'index']);
Route::post('/catetgorias-viaje', [ClCategoriaViajeController::class, 'store']);
Route::get('/catetgorias-viaje/{id}', [ClCategoriaViajeController::class, 'show']);
Route::put('/catetgorias-viaje/{id}', [ClCategoriaViajeController::class, 'update']);
Route::delete('/catetgorias-viaje/{id}', [ClCategoriaViajeController::class, 'destroy']);

Route::get('/clasificaciones', [ClClasificacionController::class, 'index']);
Route::post('/clasificaciones', [ClClasificacionController::class, 'store']);
Route::get('/clasificaciones/{id}', [ClClasificacionController::class, 'show']);
Route::put('/clasificaciones/{id}', [ClClasificacionController::class, 'update']);
Route::delete('/clasificaciones/{id}', [ClClasificacionController::class, 'destroy']);

Route::get('/estructuras-organizacionales', [ClEstructuraOrganizacionalController::class, 'index']);
Route::post('/estructuras-organizacionales', [ClEstructuraOrganizacionalController::class, 'store']);
Route::get('/estructuras-organizacionales/{id}', [ClEstructuraOrganizacionalController::class, 'show']);
Route::put('/estructuras-organizacionales/{id}', [ClEstructuraOrganizacionalController::class, 'update']);
Route::delete('/estructuras-organizacionales/{id}', [ClEstructuraOrganizacionalController::class, 'destroy']);

Route::get('/horarios', [ClHorarioController::class, 'index']);
Route::post('/horarios', [ClHorarioController::class, 'store']);
Route::get('/horarios/{id}', [ClHorarioController::class, 'show']);
Route::put('/horarios/{id}', [ClHorarioController::class, 'update']);
Route::delete('/horarios/{id}', [ClHorarioController::class, 'destroy']);

Route::get('/identificadores', [ClIdentificadorController::class, 'index']);
Route::post('/identificadores', [ClIdentificadorController::class, 'store']);
Route::get('/identificadores/{id}', [ClIdentificadorController::class, 'show']);
Route::put('/identificadores/{id}', [ClIdentificadorController::class, 'update']);
Route::delete('/identificadores/{id}', [ClIdentificadorController::class, 'destroy']);

Route::get('/organismos-finaciadores', [ClOrganismoFinanciadorController::class, 'index']);
Route::post('/organismos-finaciadores', [ClOrganismoFinanciadorController::class, 'store']);
Route::get('/organismos-finaciadores/{id}', [ClOrganismoFinanciadorController::class, 'show']);
Route::put('/organismos-finaciadores/{id}', [ClOrganismoFinanciadorController::class, 'update']);
Route::delete('/organismos-finaciadores/{id}', [ClOrganismoFinanciadorController::class, 'destroy']);

Route::get('/puestos', [ClPuestoController::class, 'index']);
Route::post('/puestos', [ClPuestoController::class, 'store']);
Route::get('/puestos/{id}', [ClPuestoController::class, 'show']);
Route::put('/puestos/{id}', [ClPuestoController::class, 'update']);
Route::delete('/puestos/{id}', [ClPuestoController::class, 'destroy']);

Route::get('/tipos-contratos', [ClTipoContratoController::class, 'index']);
Route::post('/tipos-contratos', [ClTipoContratoController::class, 'store']);
Route::get('/tipos-contratos/{id}', [ClTipoContratoController::class, 'show']);
Route::put('/tipos-contratos/{id}', [ClTipoContratoController::class, 'update']);
Route::delete('/tipos-contratos/{id}', [ClTipoContratoController::class, 'destroy']);

Route::get('/idiomas', [ClIdiomaController::class, 'index']);
Route::post('/idiomas', [ClIdiomaController::class, 'store']);
Route::get('/idiomas/{id}', [ClIdiomaController::class, 'show']);
Route::put('/idiomas/{id}', [ClIdiomaController::class, 'update']);
Route::delete('/idiomas/{id}', [ClIdiomaController::class, 'destroy']);

Route::get('/sistemas', [ClSistemaController::class, 'index']);
Route::post('/sistemas', [ClSistemaController::class, 'store']);
Route::get('/sistemas/{id}', [ClSistemaController::class, 'show']);
Route::put('/sistemas/{id}', [ClSistemaController::class, 'update']);
Route::delete('/sistemas/{id}', [ClSistemaController::class, 'destroy']);

Route::get('/roles', [ClRolController::class, 'index']);
Route::post('/roles', [ClRolController::class, 'store']);
Route::get('/roles/{id}', [ClRolController::class, 'show']);
Route::put('/roles/{id}', [ClRolController::class, 'update']);
Route::delete('/roles/{id}', [ClRolController::class, 'destroy']);

/*TRANSACCIONES*/ 
/*Registro de Personas*/ 
Route::get('/personas', [TrnPersonaController::class, 'index']);
Route::post('/personas', [TrnPersonaController::class, 'store']);
Route::get('/personas/{id}', [TrnPersonaController::class, 'show']);
Route::put('/personas/{id}', [TrnPersonaController::class, 'update']);
Route::delete('/personas/{id}', [TrnPersonaController::class, 'destroy']);

/*Relacion Personal*/
Route::get('/parentescos-personas', [TrnParentescoController::class, 'index']);
Route::post('/parentescos-personas', [TrnParentescoController::class, 'store']);
Route::get('/parentescos-personas/{id}', [TrnParentescoController::class, 'show']);
Route::put('/parentescos-personas/{id}', [TrnParentescoController::class, 'update']);
Route::delete('/parentescos-personas/{id}', [TrnParentescoController::class, 'destroy']);
Route::get('/parentescos-personas/persona/{persona_id}', [TrnParentescoController::class, 'parentescoPersonaId']);

/*Documentacion Digital*/
Route::get('/documentos', [TrnDocumentoDigitalController::class, 'index']);
Route::post('/documentos', [TrnDocumentoDigitalController::class, 'store']);
Route::get('/documentos/{id}', [TrnDocumentoDigitalController::class, 'show']);
Route::put('/documentos/{id}', [TrnDocumentoDigitalController::class, 'update']);
Route::delete('/documentos/{id}', [TrnDocumentoDigitalController::class, 'destroy']);
Route::post('/documentos/adjunto/{documento_id}', [TrnDocumentoDigitalController::class, 'cargarAdjunto']);
Route::get('/documentos/persona/{persona_id}/{tipo_documento_id}/{id_tabla}', [TrnDocumentoDigitalController::class, 'documentoTablaPersonaId']);

/*Declaraciones Juradas*/ 
Route::get('/declaraciones-juradas', [TrnDeclaracionJuradaController::class, 'index']);
Route::post('/declaraciones-juradas', [TrnDeclaracionJuradaController::class, 'store']);
Route::get('/declaraciones-juradas/{id}', [TrnDeclaracionJuradaController::class, 'show']);
Route::put('/declaraciones-juradas/{id}', [TrnDeclaracionJuradaController::class, 'update']);
Route::delete('/declaraciones-juradas/{id}', [TrnDeclaracionJuradaController::class, 'destroy']);
Route::get('/declaraciones-juradas/persona/{persona_id}', [TrnDeclaracionJuradaController::class, 'declaracionJuaradaPersonaId']);

/*Cursos Realizados*/ 
Route::get('/cursos-personas', [TrnCursoController::class, 'index']);
Route::post('/cursos-personas', [TrnCursoController::class, 'store']);
Route::get('/cursos-personas/{id}', [TrnCursoController::class, 'show']);
Route::put('/cursos-personas/{id}', [TrnCursoController::class, 'update']);
Route::delete('/cursos-personas/{id}', [TrnCursoController::class, 'destroy']);
Route::get('/cursos-personas/persona/{persona_id}/{tipo}', [TrnCursoController::class, 'cursoTipoPersonaId']);

/*Idiomas Persona*/
Route::get('/idiomas-personas', [TrnIdiomaController::class, 'index']);
Route::post('/idiomas-personas', [TrnIdiomaController::class, 'store']);
Route::get('/idiomas-personas/{id}', [TrnIdiomaController::class, 'show']);
Route::put('/idiomas-personas/{id}', [TrnIdiomaController::class, 'update']);
Route::delete('/idiomas-personas/{id}', [TrnIdiomaController::class, 'destroy']);
Route::get('/idiomas-personas/persona/{persona_id}', [TrnIdiomaController::class, 'idiomaPersonaId']);

/*Formacion Academica*/
Route::get('/formaciones-academicas', [TrnFormacionAcademicaController::class, 'index']);
Route::post('/formaciones-academicas', [TrnFormacionAcademicaController::class, 'store']);
Route::get('/formaciones-academicas/{id}', [TrnFormacionAcademicaController::class, 'show']);
Route::put('/formaciones-academicas/{id}', [TrnFormacionAcademicaController::class, 'update']);
Route::delete('/formaciones-academicas/{id}', [TrnFormacionAcademicaController::class, 'destroy']);
Route::get('/formaciones-academicas/persona/{persona_id}', [TrnFormacionAcademicaController::class, 'formacionPersonaId']);

/*Experiencia Laboral*/
Route::get('/experiencias-laborales', [TrnExperienciaLaboralController::class, 'index']);
Route::post('/experiencias-laborales', [TrnExperienciaLaboralController::class, 'store']);
Route::get('/experiencias-laborales/{id}', [TrnExperienciaLaboralController::class, 'show']);
Route::put('/experiencias-laborales/{id}', [TrnExperienciaLaboralController::class, 'update']);
Route::delete('/experiencias-laborales/{id}', [TrnExperienciaLaboralController::class, 'destroy']);
Route::get('/experiencias-laborales/persona/{persona_id}', [TrnExperienciaLaboralController::class, 'ExperienciaLaboralPersonaId']);

/*Datos Laborales*/
Route::get('/datos-laborales', [TrnDatoLaboralController::class, 'index']);
Route::post('/datos-laborales', [TrnDatoLaboralController::class, 'store']);
Route::get('/datos-laborales/{id}', [TrnDatoLaboralController::class, 'show']);
Route::put('/datos-laborales/{id}', [TrnDatoLaboralController::class, 'update']);
Route::delete('/datos-laborales/{id}', [TrnDatoLaboralController::class, 'destroy']);
Route::get('/datos-laborales/persona/{persona_id}', [TrnDatoLaboralController::class, 'datoLaboralPersonaId']);

/*Administracion de sistema*/
Route::get('/accesos', [TrnAccesoController::class, 'index']);
Route::post('/accesos', [TrnAccesoController::class, 'store']);
Route::get('/accesos/{id}', [TrnAccesoController::class, 'show']);
Route::put('/accesos/{id}', [TrnAccesoController::class, 'update']);
Route::delete('/accesos/{id}', [TrnAccesoController::class, 'destroy']);




Route::get('/insumos-personas', [TrnInsumoController::class, 'index']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
Route::get('logout', [UserController::class, 'logout']);
    
});
