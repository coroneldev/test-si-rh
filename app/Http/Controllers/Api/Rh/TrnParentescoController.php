<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use App\Models\RhTrnParentesco;
use Illuminate\Http\Request;

class TrnParentescoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentescos = RhTrnParentesco::all()->first()::with('parentesco')->first();
      //  $parentescos = RhTrnParentesco::all(); 
        return response()->json([
            'status'    => true,
            'message'   => 'Registro de personas recuperadas exitosamente',
            'data'      => $parentescos
        ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
