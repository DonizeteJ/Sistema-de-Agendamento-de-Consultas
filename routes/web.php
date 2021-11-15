<?php

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

Route::get('/', 'AuthController@index')->name('login');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::post('/login', 'AuthController@login')->name('loginAction');

Route::get('/home', 'AuthController@home')->name('home');

Route::get('/home/agendamentos', 'AgendamentoController@index')->name('agendar');

Route::get('/home/lista_pacientes', 'PacienteController@index')->name('listaPaciente');
Route::post('/home/lista_pacientes/editar_pacientes/action/{id}', 'PacienteController@editar')->name('editarPacienteAction');
Route::get('/home/lista_pacientes/registrar_pacientes/{id?}', 'PacienteController@criar')->name('registrarPaciente');
Route::post('/home/lista_pacientes/registrar_paciente/action/{id?}', 'PacienteController@criarAction')->name('registrarPacienteAction');
route::get('/home/lista_pacientes/apagar_paciente/{id}', 'PacienteController@apagar')->name('apagarPaciente');

Route::get('/home/lista_medico', 'MedicoController@index')->name('listaMedico');
Route::post('/home/lista_medico/editar_medico/action/{id}', 'MedicoController@editar')->name('editarMedicoAction');
Route::get('/home/lista_medico/registrar_medico/{id?}', 'MedicoController@criar')->name('registrarMedico');
Route::post('/home/lista_medico/registrar_medico/action/{id?}', 'MedicoController@criarAction')->name('registrarMedicoAction');
route::get('/home/lista_medico/apagar_medico/{id}', 'MedicoController@apagar')->name('apagarMedico');