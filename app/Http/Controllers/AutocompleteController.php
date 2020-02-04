<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
        return view('search.autocomplete');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('contracts')
                ->where('contract_id', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
       <li id="countryl"><a href="#">'.$row->contract_id.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function getmac(Request $request) {
        $contract_id = $request->get('contract_id');
        $data = DB::table('contracts')->where('contract_id', $contract_id)->first();
        echo $data->mac;
    }

    public function fetchContract(Request $request) {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('contracts')
                ->where('mac', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
       <li id="macl"><a href="#">'.$row->mac.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }

    }

    public function getContract(Request $request) {
        $contract_id = $request->get('mac');
        $data = DB::table('contracts')->where('mac', $contract_id)->first();
        echo $data->contract_id;
    }

}
