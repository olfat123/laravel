@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['route'=>'countries.store','files'=>true])!!}
			<div class="form-group">
				{!! Form::label('country_name_ar',_('admin.country_name_ar'))!!}
				{!! Form::text('country_name_ar',setting()->country_name_ar,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('country_name_en',_('admin.country_name_en'))!!}
				{!! Form::text('country_name_en',setting()->country_name_en,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('code',_('admin.admin_code'))!!}
				{!! Form::text('code',setting()->code,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('mob',_('admin.admin_mob'))!!}
				{!! Form::text('mob',setting()->mob,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('logo',_('admin.logo'))!!}
				{!! Form::file('logo',['class'=>'form-control'])!!}
				

			
			</div>		
			
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection