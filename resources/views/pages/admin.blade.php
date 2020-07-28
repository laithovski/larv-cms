@extends('layouts.app')
@section('main-row')

@include('inc.sideArea')

<div class="col-md-8" id="main-admin">
    <div id="admin-container">
        <div id="admin-table" class="table-responsive">
            @if(count($admins) > 0 )

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Added</th>
                    <th>Hashed Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @for ($i = 0; $i < count($admins); $i++)
                    <tr>
                        <?php $admin = $admins[$i]; ?>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->password }}</td>
                        <td>edit button</td>
                        <td>remove button</td>
                    </tr>
                @endfor
            </table>
             @else
             <h3>No admin are available</h3>                  
            @endif
        </div>
        <div class="divider"></div>
        <div class="admin-form">
            <h4>Add new CMS Admin</h4>
            {!! Form::open(['route' => 'admin.store', 'method' => 'POST']) !!}
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
                {!! Form::label('confirmPassword', 'Confirm Password') !!}
                {!! Form::password('confirmPassword', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
            </div>
            
            <div class="form-group">
                <small class="text-muted"><span class="glyphicon glyphicon-info-sign"></span>Make sure your Information are correct before</small>
                {!! Form::submit('Register', ['class' => 'btn btn-success btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
