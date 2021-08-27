@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật sinh viên <a class="btn btn-primary" href="{{ route('students.index') }}"> Trở lại</a></h2>
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


            {!! Form::model($data, ['method' => 'PATCH','route' => ['students.update', $data->id_student]]) !!}
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
                        {!! Form::text('gender', null, array('placeholder' => 'Giới tính','class' => 'form-control','required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Trạng thái:</strong>
                        <select name="status">
                            @if($data->status == 0)
                                <option selected value="0"> Mở</option>
                                <option value="1"> Khóa</option>
                            @else
                                <option value="0"> Mở</option>
                                <option selected value="1"> Khóa</option>
                            @endif

                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thuộc lớp:</strong>
                        {!! Form::select('id_grade', $grades,$dataGrade, array('class' => 'form-control' ,'required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
