<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Dateofbirth Field -->
<div class="form-group">
    {!! Form::label('dateOfBirth', 'Dateofbirth:') !!}
    <p>{{ $user->dateOfBirth }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $user->phone }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $user->address }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $user->city }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $user->gender }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

<!-- Blood Field -->
<div class="form-group">
    {!! Form::label('blood', 'Blood:') !!}
    <p>{{ $user->blood }}</p>
</div>

<!-- Idktp Field -->
<div class="form-group">
    {!! Form::label('idKtp', 'Idktp:') !!}
    <p>{{ $user->idKtp }}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $user->photo }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $user->status }}</p>
</div>

<!-- Roles Field -->
<div class="form-group">
    {!! Form::label('roles', 'Roles:') !!}
    <p>{{ $user->roles }}</p>
</div>

<!-- Login At Field -->
<div class="form-group">
    {!! Form::label('login_at', 'Login At:') !!}
    <p>{{ $user->login_at }}</p>
</div>

<!-- Login Ip Field -->
<div class="form-group">
    {!! Form::label('login_ip', 'Login Ip:') !!}
    <p>{{ $user->login_ip }}</p>
</div>

