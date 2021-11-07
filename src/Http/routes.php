<?php

use Xcy\DcatAdminSortable\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::post('xcyDcatAdmin/sortable/{id}', Controllers\DcatAdminSortableController::class.'@sortable');
