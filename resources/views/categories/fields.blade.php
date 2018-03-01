<!-- Category Name Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('category_name', 'Category Name',['class' => 'control-label']) !!}
    {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Path Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image_path', 'Image Path:') !!}
    {!! Form::text('image_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
   <select name="status" class="form-control">
       <option value="1">Active</option>
       <option value="0">In Active</option>
   </select>
</div>


