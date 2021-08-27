@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới lớp <a class="btn btn-primary" href="{{ route('grades.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('route' => 'grades.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên lớp:</strong>
                        {!! Form::text('name_grade', null, array('placeholder' => 'Tên lớp','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Trạng thái:</strong>
                    <select name="status" class="form-control" required>
                            <option selected value="0"> Hiển thị</option>
                            <option value="1"> Không hiển thị</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thuộc khóa học:</strong>
                        {!! Form::select('id_course', $courses,"", array('class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
