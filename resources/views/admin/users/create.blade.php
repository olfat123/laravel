@extends('admin.index')
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">
				{{$title}}
			</h3>
		</div>
		<div class="box-body">
            {!! Form::open(['url'=>'/admin/users'])!!}
                <div class="form-group">
                    {!! Form::label('name',_('admin.name'))!!}
                    {!! Form::text('name',setting()->name,['class'=>'form-control'])!!}
                </div>		
                <div class="form-group">
                    {!! Form::label('email',_('admin.email'))!!}
                    {!! Form::email('email',setting()->email,['class'=>'form-control'])!!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password',_('admin.password'))!!}
                    {!! Form::password('password',setting()->password,['class'=>'form-control'])!!}                   

                
                </div>		
			 
            
            {!! Form::submit(_('admin.save'),['class'=>'btn btn-primary'])!!}
            {!! Form::close()!!}
			
		</div>
	</div>

@endsection