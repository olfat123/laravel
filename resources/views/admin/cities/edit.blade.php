@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['url'=>'/admin/cities/'.$city->id,'method'=>'put'])!!}
			<div class="form-group">
				{!! Form::label('city_name_ar',_('admin.city_name_ar'))!!}
				{!! Form::text('city_name_ar',$city->city_name_ar,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('city_name_en',_('admin.city_name_en'))!!}
				{!! Form::text('city_name_en',$city->city_name_en,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('country_id',_('admin.admin_city_country'))!!}
				{!! Form::select('country_id',\App\Model\Country::pluck('country_name_'.session('lang'),'id'),$city->country_id,['class'=>'form-control'])!!}
			</div>
				
			
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection