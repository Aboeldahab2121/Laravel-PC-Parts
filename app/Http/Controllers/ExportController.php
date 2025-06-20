<?php

namespace App\Http\Controllers;

use App\Exports\ItemExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::store(new ItemExport , 'Items.xlsx');
    }
}
