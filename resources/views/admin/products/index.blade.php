@extends('admin.index')
@section('content')

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        {{__('admin.products')}}
      </h3> 
        
        {{ $dataTable->table([
          'class'=>'dataTable table table-striped table-hover table-bordered'
          ]) }}
      
      
    </div>
    
  </div>
     
{{ $dataTable->scripts([]) }}
    

@endsection