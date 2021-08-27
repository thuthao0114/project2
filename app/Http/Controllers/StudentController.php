<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
session_start();
class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-sinhvien|tao-sinhvien|capnhat-sinhvien|xoa-sinhvien', ['only' => ['index','store']]);
        $this->middleware('permission:tao-sinhvien', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-sinhvien', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-sinhvien', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Student::get();
        return  view('student.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::pluck('name_grade','id_grade')->all();
        return  view('student.create',compact('grades'));
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
            'name_student' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'id_grade' => 'required',
        ]);

        $input = $request->all();
        $data = Student::create($input);
        return redirect()->route('students.index')
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
        $data = Student::find($id);
        return view('student.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        $grades = Grade::pluck('name_grade','id_grade')->all();
        $dataGrade = $data->grades->pluck('name_grade','id_grade')->all();

        return view('student.edit',compact('data','grades','dataGrade'));
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
            'name_student' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'id_grade' => 'required',
        ]);

        $input = $request->all();
        $data = Student::find($id);
        $data->status = $request->status;
        $data->update($input);
        return redirect()->route('students.index')
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
        Student::find($id)->delete();
        return redirect()->route('students.index')
            ->with('success','Xóa thành công');
    }
}
