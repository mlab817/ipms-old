<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use Illuminate\Http\Request;

class UnduplicateController extends Controller
{
    public function __invoke()
    {
        $allocations = Allocation::all();

        $rawQuery = 'DELETE t1 FROM allocations t1 INNER JOIN allocations t2 WHERE t1.id > t2.id AND t1.project_id = t2.project_id;';
        \DB::table('allocations')->raw($rawQuery);
    }
}
