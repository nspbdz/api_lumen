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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->put('/update/{id}', 'PostsController@update');

// $router->put('/posts/{id}', 'PostsController@update');
// $router->get('/posts', 'PostsController@index');
$router->post('/create', 'PostsController@create');
// $router->post('/posts', 'PostsController@store');

// $router->get('/posts/{id}', 'PostsController@show');
$router->get('/show', 'PostsController@show');
$router->get('/showid/{id}', 'PostsController@showid');

// domicile
$router->get('/showDomicile/limit/{limit}', 'DomicileController@show');
$router->get('/showDomicileid/{id}', 'DomicileController@showDomicileid');
$router->post('/createDomicile', 'DomicileController@createDomicile');
$router->put('/updateDomicile/{id}', 'DomicileController@updateDomicile');
$router->delete('/deletedomicile/{id}', 'DomicileController@deletedomicile');

//education
$router->get('/showeducation/limit/{limit}', 'EducationController@show');
$router->get('/showeducationid/{id}', 'EducationController@showEducationid');
$router->post('/createeducation', 'EducationController@createeducation');
$router->put('/updateeducation/{id}', 'EducationController@updateEducation');
$router->delete('/deleteeducation/{id}', 'EducationController@deleteeducation');

//family
$router->get('/showfamily/limit/{limit}', 'FamilyController@show');
$router->get('/showfamilyid/{id}', 'FamilyController@showfamilyid');
$router->post('/createfamily', 'FamilyController@createfamily');
$router->put('/updatefamily/{id}', 'FamilyController@updatefamily');
$router->delete('/deletefamily/{id}', 'FamilyController@deletefamily');

//grou[]
$router->get('/showgroup/{comp_id}/{cust_id}/{site_id}/limit/{limit}', 'GroupController@show');
$router->get('/showgroupid/{comp_id}/{cust_id}/{site_id}', 'GroupController@showgroupid');
$router->post('/creategroup', 'GroupController@creategroup');

//payroll
// $router->get('/showpayroll/limit/{limit}', 'PayrollController@show');
// $router->get('/showpayrollid/{id}', 'PayrollController@showpayrollid');
// $router->post('/createpayroll', 'PayrollController@createpayroll');
// $router->put('/updatefamily/{id}', 'PayrollController@updatefamily');
// $router->delete('/deletefamily/{id}', 'PayrollController@deletefamily');



// kasih status jika tidak ada false dan jika ada true
//  limit saat get all 50 data /  menggunakan paramater
// 
