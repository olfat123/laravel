@extends('admin.index')
@section('content')
<script type="text/javascript">
	$(document).ready(function(){
		$('#jstree').jstree({
		  "core" : {
		  	'data' : {!! load_cat() !!},
		    "themes" : {
		      "variant" : "large"
		    }
		  },
		  "checkbox" : {
		    "keep_selected_style" : true
		  },
		  "plugins" : [ "wholerow", "checkbox" ]
		});
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
				{!! Form::label('name_ar',_('admin.name_ar'))!!}
				{!! Form::text('name_ar','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('name_en',_('admin.name_en'))!!}
				{!! Form::text('name_en','',['class'=>'form-control'])!!}
			</div>
			<div class="clearfix"></div>
				<div id="jstree"></div>
			<div class="clearfix"></div>
					
			<div class="form-group">
				{!! Form::label('description',_('admin.description'))!!}
				{!! Form::text('description','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('keyword',_('admin.keyword'))!!}
				{!! Form::text('keyword','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('icon',_('admin.icon'))!!}
				{!! Form::file('icon',['class'=>'form-control'])!!}
			
			</div>		
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection