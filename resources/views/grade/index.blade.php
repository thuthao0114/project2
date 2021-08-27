@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách Lớp
                            @can('tao-lophoc')
                            <a class="btn btn-success" href="{{ route('grades.create') }}"> Thêm mới</a>
                                @endcan
                        </h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Tên Lớp</th>
                    <th>Thuộc khóa học</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name_grade }}</td>
                    <td>
                        {{ $value->courses->name_course }}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('grades.show',$value->id_grade) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-lophoc')
                        <a class="btn btn-primary" href="{{ route('grades.edit',$value->id_grade) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-lophoc')
                        {!! Form::open(['method' => 'DELETE','route' => ['grades.destroy', $value->id_grade],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
