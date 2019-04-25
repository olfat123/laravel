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
            {!! Form::open(['url'=>'/admin/products','files'=>true])!!}
                <div class="form-group">
                    {!! Form::label('name',_('admin.name'))!!}
                    {!! Form::text('Name',setting()->Name,['class'=>'form-control'])!!}
                </div>		
                <div class="form-group">
                    {!! Form::label('price',_('admin.price'))!!}
                    {!! Form::number('Price',setting()->Price,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('image',_('admin.image'))!!}
                    {!! Form::file('Image',['class'=>'form-control'])!!}
			    </div>	
                <div class="clearfix"></div>
				<div id="jstree"></div>
				    <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
			    <div class="clearfix"></div>	
			 
            
            {!! Form::submit(_('admin.save'),['class'=>'btn btn-primary'])!!}
            {!! Form::close()!!}
			
		</div>
	</div>

@endsection