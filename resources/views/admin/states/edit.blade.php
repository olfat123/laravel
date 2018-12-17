@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['url'=>'/admin/states/'.$state->id,'method'=>'put'])!!}
			<div class="form-group">
				{!! Form::label('state_name_ar',_('admin.state_name_ar'))!!}
				{!! Form::text('state_name_ar',$state->state_name_ar,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('state_name_en',_('admin.state_name_en'))!!}
				{!! Form::text('state_name_en',$state->state_name_en,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('country_id',_('admin.admin_state_country'))!!}
				{!! Form::select('country_id',\App\Model\Country::pluck('country_name_'.session('lang'),'id'),$state->country_id,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('city_id',_('admin.admin_state_city'))!!}
				{!! Form::select('city_id',\App\Model\City::pluck('city_name_'.session('lang'),'id'),$state->city_id,['class'=>'form-control'])!!}
			</div>
			
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection