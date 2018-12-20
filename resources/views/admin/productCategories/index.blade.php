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
		    "keep_selected_style" : true
		  },
		  "plugins" : [ "wholerow", "checkbox" ]
		});
	});
</script>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        {{__('admin.productsCategory')}}
      </h3> 
        
        <div id="jstree"></div>
      
      
    </div>
    
  </div>
     

    

@endsection