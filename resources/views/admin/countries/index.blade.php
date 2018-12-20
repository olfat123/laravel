@extends('admin.index')
@section('content')

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        {{__('admin.countries')}}
      </h3> 
        
        {{ $dataTable->table([
          'class'=>'dataTable table table-striped table-hover table-bordered'
          ]) }}
      
      
    </div>


<!-- Modal -->
<div id="multibleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete')}}</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <div class="empty_record hidden">
            <h1>{{ trans('admin.please_check_some_records') }}</h1>
          </div>
          <div class="not_empty_record hidden">
            <h1>{{ trans('admin.ask_delete_item') }} <span class="record_count">5</span>?</h1>
          </div>   

        </div>
      </div>
      <div class="modal-footer">
        <div class="empty_record hidden">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="not_empty_record hidden">
          <input type="submit" name="del_all" value="{{ trans('admin.delete')}}" class="btn btn-danger del_all" />
        </div>
      </div>
    </div>

  </div>
</div>
  </div>
   <script>
    delete_all();
   </script>  
{{ $dataTable->scripts([]) }}
    

@endsection