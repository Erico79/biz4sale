{{--<!-- Category Name Field -->
<div class="form-group col-sm-12  is-empty">
    {!! Form::label('root_category', 'Root Category',['class' => 'control-label']) !!}
   <select name="root_category" class="form-control">
       @if(count($root_cats))
           @foreach($root_cats as $root_cat)
               <option value="{{ $root_cat->id }}">{{ $root_cat->category_name }}</option>
               @endforeach
           @endif
       <option value="">Root</option>
   </select>
</div>--}}
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('category_name', 'Category Name',['class' => 'control-label']) !!}
    {!! Form::text('category_name', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
{{--<div class="form-group col-sm-12 is-empty">--}}
    {{--<label ><a href="http://fontawesome.io/icons/" target="_blank">Category icon click here for examples</a></label>--}}
{{--    {!! Form::label('category_icon', 'Category icon ',['class' => 'control-label']) !!}--}}
    {{--<select name="category_icon" class="form-control" required>--}}
        {{--@if(count($icons))--}}
            {{--@foreach($icons as $icon)--}}

                {{--<option value="{{ $icon->value }}">&#xf07d;</option>--}}
            {{--@endforeach--}}
        {{--@endif--}}
    {{--</select>--}}
    {{--{!! Form::text('category_icon', null, ['class' => 'form-control','required'=>'required','placeholder'=>'eg fa-home... click on the link above for examples']) !!}--}}
{{--</div>--}}
<!-- Category code Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('category_code', 'Category Code',['class' => 'control-label']) !!}
    {!! Form::text('category_code', null, ['class' => 'form-control','required'=>'required']) !!}
</div>



