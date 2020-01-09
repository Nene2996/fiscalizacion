<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/papeletas/{numberlicence}/papeleta', 'Api\PapeletaController@searchLicence');
Route::get('/papeletas', 'Api\PapeletaController@list');
