<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subjects;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-sach|tao-sach|capnhat-sach|xoa-sach', ['only' => ['index','store']]);
        $this->middleware('permission:tao-sach', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-sach', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-sach', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Book::get();
        return  view('book.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subjects::pluck('name_subjects','id_subjects')->all();
        return  view('book.create',compact('subjects'));
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
            'title_book' => 'required',
            'quantity' => 'required',
            'id_subjects' => 'required',
        ]);

        $input = $request->all();
        $data = Book::create($input);
        return redirect()->route('books.index')
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
        $data = Book::find($id);
        return view('book.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Book::find($id);
        $subjects = Subjects::pluck('name_subjects','id_subjects')->all();
        $dataSubject = $data->grades->pluck('name_subjects','id_subjects')->all();

        return view('student.edit',compact('data','subjects','dataSubject'));
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
            'title_book' => 'required',
            'quantity' => 'required',
            'id_subjects' => 'required',
        ]);

        $input = $request->all();
        $data = Book::find($id);
        $data->update($input);
        return redirect()->route('books.index')
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
        Book::find($id)->delete();
        return redirect()->route('books.index')
            ->with('success','Xóa thành công');
    }
}
