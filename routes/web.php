<?php

Route::get('/', 'BillSplitController@index');
Route::get('/calculate', 'BillSplitController@calculate');
/*Route::get('/clearOrCalculate', 'BillSplitController@clearOrCalculate');

Route::get('/submit/new', 'BillSplitController@new');
Route::get('/submit/calculate', 'BillSplitController@calculate');
*/