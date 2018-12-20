@extends('admin.index')
@section('content')
<script type="text/javascript">
	$(document).ready(function(){
		$('#jstree').jstree({
		  "core" : {
		  	'data' : {!! load_cat(old('parent')) !!},
		  
		    "themes" : {
		      "variant" : "large"
		    }
		  },
		  "checkbox" : {
		    "keep_selected_style" : false
		  },
		  "plugins" : [ "wholerow" ]
		});
	});

	$('#jstree').on('change.jstree', function(e,data){
		var i , j , r = [];
		for(i = 0, j = data.selected.length; i < j; i++)
		{
			r.push(data.instance.get_node(data.selected[i]).id);
		}
		$('.parent_id').val(r.join(', '));
	});
</script>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['url'=>'/admin/productsCategory','files'=>true])!!}
			<div class="form-group">
				{!! Form::label('name_ar', trans('admin.name_ar'))!!}
				{!! Form::text('name_ar',old('name_ar'),['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('name_en', trans('admin.name_en'))!!}
				{!! Form::text('name_en',old('name_en'),['class'=>'form-control'])!!}
			</div>
			<div class="clearfix"></div>
				<div id="jstree"></div>
				<input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
			<div class="clearfix"></div>
					
			<div class="form-group">
				{!! Form::label('description', trans('admin.description'))!!}
				{!! Form::text('description',old('description'),['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('keyword', trans('admin.keyword'))!!}
				{!! Form::text('keyword','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('icon', trans('admin.icon'))!!}
				{!! Form::file('icon',['class'=>'form-control'])!!}
			
			</div>		
		
				{!! Form::submit( trans('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection