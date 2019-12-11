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

$router->group(['prefix' => 'candidate', 'middleware' => 'auth'], function () use ($router) //serve candidates prefix
{
    $router->get('/', 'CandidateController@index');
    $router->get('/{id}', 'CandidateController@show');
    $router->post('/', 'CandidateController@add');
    $router->put('/{id}', 'CandidateController@edit');
    $router->delete('/{id}', 'CandidateController@delete');


});

$router->group(['prefix' => 'education', 'middleware' => 'auth'], function () use ($router) //serve education prefix
{
    $router->get('/', 'EducationHistoryController@index');
    $router->get('/{candidateId}', 'EducationHistoryController@show');
    $router->post('/', 'EducationHistoryController@add');
    $router->put('/{candidateId}/{id}', 'EducationHistoryController@edit');
    $router->delete('/{candidateId}/{id}', 'EducationHistoryController@delete');
});

$router->group(['prefix' => 'reference', 'middleware' => 'auth'], function () use ($router) //serve reference prefix
{
    $router->get('/', 'ReferenceController@index');
    $router->get('/{candidateId}', 'ReferenceController@show');
    $router->post('/', 'ReferenceController@add');
    $router->put('/{candidateId}/{id}', 'ReferenceController@edit');
    $router->delete('/{candidateId}/{id}', 'ReferenceController@delete');
});

$router->group(['prefix' => 'portfolio', 'middleware' => 'auth'], function () use ($router) //serve portfolio prefix
{
    $router->get('/', 'PortfolioController@index');
    $router->get('/{candidateId}', 'PortfolioController@show');
    $router->post('/', 'PortfolioController@add');
    $router->put('/{candidateId}/{id}', 'PortfolioController@edit');
    $router->delete('/{candidateId}/{id}', 'PortfolioController@delete');
});


$router->group(['prefix' => 'publication', 'middleware' => 'auth'], function () use ($router) //serve publication prefix
{
    $router->get('/', 'PublicationController@index');
    $router->get('/{candidateId}', 'PublicationController@show');
    $router->post('/', 'PublicationController@add');
    $router->put('/{candidateId}/{id}', 'PublicationController@edit');
    $router->delete('/{candidateId}/{id}', 'PublicationController@delete');
});

$router->group(['prefix' => 'work_experience', 'middleware' => 'auth'], function () use ($router) //serve work_exp prefix
{
    $router->get('/', 'WorkExperienceController@index');
    $router->get('/{candidateId}', 'WorkExperienceController@show');
    $router->post('/', 'WorkExperienceController@add');
    $router->put('/{candidateId}/{id}', 'WorkExperienceController@edit');
    $router->delete('/{candidateId}/{id}', 'WorkExperienceController@delete');
});

$router->group(['prefix' => 'skill', 'middleware' => 'auth'], function () use ($router) //serve certificate prefix
{
    $router->get('/', 'SkillController@index');
    $router->get('/{candidateId}', 'SkillController@show');
    $router->post('/', 'SkillController@add');
    $router->put('/{candidateId}/{id}', 'SkillController@edit');
    $router->delete('/{candidateId}/{id}', 'SkillController@delete');
});

$router->group(['prefix' => 'certificate', 'middleware' => 'auth'], function () use ($router) //serve certificate prefix
{
    $router->get('/', 'CertificateController@index');
    $router->get('/{candidateId}', 'CertificateController@show');
    $router->post('/', 'CertificateController@add');
    $router->put('/{candidateId}/{id}', 'CertificateController@edit');
    $router->delete('/{candidateId}/{id}', 'CertificateController@delete');
});

$router->post('users/register', 'UserController@add');

$router->group(['prefix' => 'users', 'middleware' => 'auth'], function () use ($router)
{
    $router->get('/', 'UserController@index');
    $router->get('/{id}', 'UserController@show');
    
});