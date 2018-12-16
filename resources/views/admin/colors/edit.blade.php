@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['url'=>'/admin/colors/'.$color->id,'method'=>'put'])!!}
			<div class="form-group">
				{!! Form::label('color_name_ar',_('admin.color_name_ar'))!!}
				{!! Form::text('color_name_ar',$color->color_name_ar,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('color_name_en',_('admin.color_name_en'))!!}
				{!! Form::text('color_name_en',$color->color_name_en,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('color',_('admin.admin_color'))!!}
				{!! Form::text('color',$color->color,['class'=>'form-control'])!!}
			</div>
				
			
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection