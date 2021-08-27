@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật lớp <a class="btn btn-primary" href="{{ route('grades.index') }}"> Trở lại</a></h2>
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


            {!! Form::model($data, ['method' => 'PATCH','route' => ['grades.update', $data->id_grade]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên lớp:</strong>
                        {!! Form::text('name_grade', null, array('placeholder' => 'Tên lớp','class' => 'form-control','required'=>'required')) !!}
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
                        <strong>Thuộc khóa học:</strong>
                        {!! Form::select('id_course', $courses,$dataCourse, array('class' => 'form-control' ,'required'=>'required')) !!}
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
