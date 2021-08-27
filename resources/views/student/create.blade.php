@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới sinh viên <a class="btn btn-primary" href="{{ route('students.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('route' => 'students.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên sinh viên:</strong>
                        {!! Form::text('name_student', null, array('placeholder' => 'Tên sinh viên','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ngày sinh:</strong>
                        {!! Form::date('birthday', null, array('placeholder' => 'Ngày sinh','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Giới tính:</strong>
                        {!! Form::text('gender', null, array('placeholder' => 'giới tính','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Trạng thái:</strong>
                        {!! Form::text('status', null, array('placeholder' => 'Trạng thái','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thuộc lớp:</strong>
                        {!! Form::select('id_grade', $grades,"", array('class' => 'form-control','required'=>'required')) !!}
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
