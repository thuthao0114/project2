<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-lophoc|tao-lophoc|capnhat-lophoc|xoa-lophoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-lophoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-lophoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-lophoc', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = Grade::get();
        return  view('grade.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck('name_course','id_course')->all();
        return  view('grade.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_grade' => 'required',
            'id_course' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $data = Grade::create($input);
        return redirect()->route('grades.index')
            ->with('success','Tạo mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Grade::find($id);
        return view('grade.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Grade::find($id);
        $courses = Course::pluck('name_course','id_course')->all();
        $dataCourse = $data->courses->pluck('name_course','id_course')->all();

        return view('grade.edit',compact('data','courses','dataCourse'));
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
        $this->validate($request, [
            'name_grade' => 'required',
            'id_course' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $data = Grade::find($id);
        $data->status = $request->status;
        $data->update($input);
        return redirect()->route('grades.index')
            ->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::Where('id_grade',$id)->first()->delete();
        return redirect()->route('grades.index')
            ->with('success','Xóa thành công');
    }
}
