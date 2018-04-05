<?php

Route::get('/', 'BillSplitController@index');

Route::get('/calculate', 'BillSplitController@calculate');
