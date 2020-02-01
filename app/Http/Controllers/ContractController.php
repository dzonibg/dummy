<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contract.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        echo $request->contract_id;
        echo '<br>';
        $contract = DB::table("contracts")->where("contract_id", $request->contract_id)->first();
        echo $contract->mac;
        echo '<br>';
        echo $contract->id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }

    public function autocomplete(Request $request) {
//        $data = $contract->select("contract_id")->where("contract_id", "LIKE", "%{request->input('query')%")->get();
        $query = $request->get('query');
        $data = \DB::table("contracts")
            ->select("contract_id")
            ->where("contract_id", "LIKE", '%' . $query . '%');
        return response()->json($data);
    }
}
