@extends('admin.index')
@section('content')

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.country_id',function(){
			var country = $('.country_id option:selected').val();
			if(country > 0)
			{
				$.ajax({
					url:'/admin/states/create',
					type:'get',
					dataType: 'html',
					data:{country_id:country,select:''},
					success: function(data){
						$('.city').html(data);
					}
				});
			}
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
			{!! Form::open(['url'=>'/admin/states','files'=>true])!!}
			<div class="form-group">
				{!! Form::label('state_name_ar',_('admin.state_name_ar'))!!}
				{!! Form::text('state_name_ar','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('state_name_en',_('admin.state_name_en'))!!}
				{!! Form::text('state_name_en','',['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('country_id',_('admin.admin_state_country'))!!}
				{!! Form::select('country_id',App\Country::pluck('country_name_en','id'),'',['class'=>'form-control country_id','placeholder'=>'..........'])!!}
			</div>
			<div class="form-group">
				{!! Form::label('city_id',_('admin.admin_state_city')) !!}
				<span class="city"></span>
			</div>
					
			
		
				{!! Form::submit(_('admin.save'),['class'=>'btn btn primary'])!!}
				{!! Form::close()!!}
			
		</div>
	</div>

@endsection