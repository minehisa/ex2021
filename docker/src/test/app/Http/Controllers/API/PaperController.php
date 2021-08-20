<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\Paperbasics;
use App\Models\Paperdetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function get_paper_vue(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        return response()->json(Auth::user()->paperbasic()->join('paperdetails','paperbasic.paperid','=', 'paperdetails.paperid')->select('paperbasic.paperid','papername','updatetime','regittime')->get());
    }

    public function get_paper_bootstrap(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        return response()->json(Auth::user()->paperbasic()->join('paperdetails','paperbasic.paperid','=', 'paperdetails.paperid')->select('paperbasic.paperid','papername','updatetime','regittime')->paginate());
    }

    public function delete(Request $request)
    {

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
