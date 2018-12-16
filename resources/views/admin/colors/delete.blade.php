<button type="button" class="btn btn-danger" data-toggle="modal" data_target="#del_admin{{ $id }}">
	<i class="fa fa-trash"></i>
	
</button>

<!--- Modal ---->
<div id="del_admin{{ $id }}" class="modal fade" role="dialog">
	<div class="modal-dialog">
		
	
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times</button>
			<h4 class="modal-title">{{ _('admin.delete')}}</h4>			
		</div>
		{{!! Form::open(['route'=>('cities.destroy'.$id),'method'=>'delete'])!!}}
		<div class="modal-body">
			<h4>
				{{ _('admin.delete_this',['name'=> session('lang') == 'ar'?$city_name_ar:$city_name_en])}}
			</h4>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">{{_('admin.close')}}
				
			</button>
			{!! Form::submit(_('admin.yes'),['class'=>'btn btn-danger'])		!!}
		</div>
		{{!! Form::close() !!}}
		
	</div>
</div>
</div>