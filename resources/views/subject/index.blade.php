@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">

                        <h2>Danh sách môn học
                            @can('tao-monhoc')<a class="btn btn-success" href="{{ route('subjects.create') }}"> Thêm mới</a>
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
                    <th>Tên môn học</th>
                    <th>Thuộc lớp</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name_subjects }}</td>
                    <td>
                        {{ $value->grades->name_grade }}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('subjects.show',$value->id_subjects) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-monhoc')
                        <a class="btn btn-primary" href="{{ route('subjects.edit',$value->id_subjects) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-monhoc')
                        {!! Form::open(['method' => 'DELETE','route' => ['subjects.destroy', $value->id_subjects],'style'=>'display:inline']) !!}
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
