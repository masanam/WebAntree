<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191,'maxlength' => 191]) !!}
</div>

 <!-- Picture Field -->     
 <div class="form-group col-sm-12 col-lg-12">
 {!! Form::label('image', 'Picture:') !!}
    <div id="picture-thumb">
    <img id="holder" src="{{ isset($categories) ? $categories->image : '' }}" style="padding:10px;max-width:600px;max-height:300px">
    </div>
	<div class="input-group">
    <input class="form-control" type="text" id="image" name="image" value="{{ old('image', isset($categories) ? $categories->image : '') }}">
   <span class="input-group-append">
     <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white">
        <i class="fa fa-file"></i> Choose
     </a>
     </span>
   </div>
 </div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
</div>
