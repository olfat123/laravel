    function check_all(){
      $('input[class="item_checkbox"]:checkbox').each(function(){
        if($('input[class="check_all"]:checkbox:checked').length == 0 ){
          $(this).prop('checked',false);         
        }else{         
          $(this).prop('checked',true);
        }
      });
    }

    function delete_all(){

    	$(document).on('click', '.delBtn', function(){
    		var item_checked = $('input[class="item_checkbox"]:checkbox:checked').length;
    		if(item_checked > 0){
    			$('.record_count').text(item_checked);
    			$('.not_empty_record').removeClass('hidden');
    		}else{
    			$('.record_count').text('');
    			$('.not_empty_record').addClass('hidden');
    			$('.empty_record').removeClass('hidden');
    		}
    		$('#multibleDelete').modal('show');
    	});
    }

