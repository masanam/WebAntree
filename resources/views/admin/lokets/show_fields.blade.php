<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $lokets->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $lokets->description }}</p>
</div>

<!-- Schedule Field -->
<div class="form-group">
    {!! Form::label('schedule', 'Schedule:') !!}
    <p>{{ $lokets->schedule }}</p>
</div>

<!-- Quota Field -->
<div class="form-group">
    {!! Form::label('quota', 'Quota:') !!}
    <p>{{ $lokets->quota }}</p>
</div>

<!-- Hostid Field -->
<div class="form-group">
    {!! Form::label('hostId', 'Hostid:') !!}
    <p>{{ $lokets->hostId }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $lokets->status }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $lokets->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $lokets->updated_by }}</p>
</div>

