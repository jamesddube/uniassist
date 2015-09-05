<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramRequest;
use App\SubjectModel;
use App\SubjectRequiredModel;
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

        $subjects = SubjectModel::all();
        return view('admin.programs.create',compact('subjects'));
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

        $sub1 = new SubjectRequiredModel();
        $sub = new SubjectRequiredModel();

        $sub1->program_code = $request->program_code;
        $sub1->subject_code = $request->required_subject_1;
        $sub1->save();

        $sub->program_code = $request->program_code;
        $sub->subject_code = $request->required_subject_2;
        $sub->save();

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
