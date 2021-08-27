@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách sách
                            @can('tao-sach')
                            <a class="btn btn-success" href="{{ route('books.create') }}">  Thêm mới</a>
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
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Thuộc môn học</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->title_book }}</td>
                    <td>{{ $value->quantity }}</td>
                    <td>
                        {{ $value->subjects->name_subjects }}
                    </td>
                    <td>

                        <a class="btn btn-info" href="{{ route('books.show',$value->id_book) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-sach')
                        <a class="btn btn-primary" href="{{ route('books.edit',$value->id_book) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-sach')
                            {!! Form::open(['method' => 'DELETE','route' => ['books.destroy', $value->id_book],'style'=>'display:inline']) !!}
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
