<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProgramsModel;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
      $programs = ProgramsModel::all();

      return view('admin.programs.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProgramRequest|Request $request
     * @return Response
     */
    public function store(CreateProgramRequest $request)
    {
        //
        ProgramsModel::create($request->all());

        return redirect('admin/programs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
