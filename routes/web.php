<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'candidate'], function () use ($router) //serve candidates prefix
{
    $router->get('/', 'CandidateController@index');
    $router->get('{/id}', 'CandidateController@show');
    $router->post('/', 'CandidateController@add');
    $router->put('/{id}', 'CandidateController@edit');
    $router->delete('/{id}', 'CandidateController@delete');
});

$router->group(['prefix' => 'education'], function () use ($router) //serve education prefix
{
    $router->get('/', 'EducationHistoryController@index');
    $router->get('/{candidateId}', 'EducationHistoryController@show');
    $router->post('/', 'EducationHistoryController@add');
    $router->put('/{candidateId}/{id}', 'EducationHistoryController@edit');
    $router->delete('/{candidateId}/{id}', 'EducationHistoryController@delete');
});


