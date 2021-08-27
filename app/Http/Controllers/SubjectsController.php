<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-monhoc|tao-monhoc|capnhat-monhoc|xoa-monhoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-monhoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-monhoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-monhoc', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = Subjects::get();
        return  view('subject.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::pluck('name_grade','id_grade')->all();
        return  view('subject.create',compact('grades'));
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
            'name_subjects' => 'required',
            'id_grade' => 'required',
        ]);

        $input = $request->all();
        $data = Subjects::create($input);
        return redirect()->route('subjects.index')
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
        $data = Subjects::find($id);
        return view('subject.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subjects::find($id);
        $grades = Grade::pluck('name_grade','id_grade')->all();
        $dataGrade = $data->grades->pluck('name_grade','id_grade')->all();

        return view('subject.edit',compact('data','grades','dataGrade'));
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
            'name_subjects' => 'required',
            'id_grade' => 'required',
        ]);

        $input = $request->all();
        $data = Subjects::find($id);
        $data->update($input);
        return redirect()->route('subjects.index')
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
        Subjects::find($id)->delete();
        return redirect()->route('subjects.index')
            ->with('success','Xóa thành công');
    }
}
