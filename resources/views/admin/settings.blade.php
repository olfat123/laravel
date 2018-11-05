@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
			{!! Form::open(['url'=>'/admin/settings','files'=>true])!!}
			<div class="form-group">
				{!! Form::label('sitename_ar',_('admin.sitename_ar'))!!}
				{!! Form::text('sitename_ar',setting()->siteName_ar,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('sitename_en',_('admin.sitename_en'))!!}
				{!! Form::text('sitename_en',setting()->siteName_en,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('email',_('admin.admin_email'))!!}
				{!! Form::email('email',setting()->email,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('logo',_('admin.logo'))!!}
				{!! Form::file('logo',['class'=>'form-control'])!!}
				@if(!empty(setting()->logo))
					<img src="{{Storage::url(setting()->logo)}}" />
				@endif

			
			</div>
			<div class="form-group">
				{!! Form::label('icon',_('admin.icon'))!!}
				{!! Form::file('icon',['class'=>'form-control'])!!}
				@if(!empty(setting()->icon))
					<img src="{{Storage::url(setting()->icon)}}" />
				@endif
			</div>
			<div class="form-group">
				{!! Form::label('description',_('admin.description'))!!}
				{!! Form::textarea('description',setting()->description,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('keywords',_('admin.keywords'))!!}
				{!! Form::textarea('keywords',setting()->keywords,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('main_lang',_('admin.main_lang'))!!}
				{!! Form::select('main_lang',['ar'=>_('admin.ar'),'en'=>_('admin.en')],setting()->main_lang,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('status',_('admin.status'))!!}
				{!! Form::select('status',['open'=>_('admin.open'),'close'=>_('admin.close')],setting()->status,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('message_maintenance',_('admin.message_maintenance'))!!}
				{!! Form::textarea('message_maintenance',setting()->message_maintenance,['class'=>'form-control'])!!}
			</div>
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection