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

Route::get('/home/registrar_pacientes', 'PacienteController@index')->name('registrarPaciente');
Route::post('/home/registrar_paciente/action', 'PacienteController@criarAction')->name('registrarPacienteAction');

Route::get('/home/registrar_medico', 'MedicoController@index')->name('registrarMedico');
Route::post('/home/registrar_medico/action', 'MedicoController@criarAction')->name('registrarMedicoAction');
