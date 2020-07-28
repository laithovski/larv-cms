@extends('layouts.app')
@section('main-row')

@include('inc.sideArea')

<div class="col-md-8" id="main-admin">
    <div id="admin-container">
        <div class="divider"></div>
        <div class="admin-form">
            <h4>Login</h4>
            {!! Form::open(['route' => 'login.submit', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('username', 'Name(UserName)') !!}
                {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Login', ['class' => 'btn btn-success btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
