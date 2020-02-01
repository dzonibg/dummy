<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;

class SearchController extends Controller
{
    public function index() {
        return view("search.search");
    }

    public function autocomplete(Request $request) {
        $search = $request->get('term');

//        $result = DB::where('name', 'LIKE', '%'. $search. '%')->get();
        $result = Contract::query()->select("contract_id")
            ->where('contract_id', 'LIKE', '%' . $search . '%')->get();

        return response()->json($result);
    }

}
