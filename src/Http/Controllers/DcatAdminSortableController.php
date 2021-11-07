<?php

namespace Xcy\DcatAdminSortable\Http\Controllers;

use Dcat\Admin\Layout\Content;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DcatAdminSortableController extends Controller
{
    public function sortable(Request $request, $id): array
    {
        if ($request->input("sortable") == 'up') {
            $request->input('table')::where('id', $id)->first()->moveOrderUp();
        }

        if ($request->input('sortable') == 'down') {
            $request->input('table')::where('id', $id)->first()->moveOrderDown();
        }

        return ['status' => 1, 'message' => '操作成功'];
    }
}
