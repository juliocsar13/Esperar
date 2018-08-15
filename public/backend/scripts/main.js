$(function(){

  $('.btnHidden').click(function(){
   var id = $(this).data('hidden-id');
   var value = $(this).text();
    if (value == 'Ocultar') {
      value = 'Mostrar';
    }else {
      value  = 'Ocultar';
    }

    var data  = {
      id : id,
      value : value,
    }
    console.log(data);
    if (id) {
       $.ajax({
         url: '/admin/review/hidden',
         type: 'POST',
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
         data: data,
         success: function(data){
           if (data.data) {
            return window.location.pathname = '/admin/review';
           }
         },
         error: function(xhr, status){
           //console.log('status error',JSON.stringify(status));
         },
         complete: function(xhr, status){
           ///console.log('status complete',JSON.stringify(status));
         }
      })
    }
  })
  $('.btnHidden-lugar').click(function(){
   var id = $(this).data('hidden-id');
   var value = $(this).text();
    if (value == 'Ocultar') {
      value = 'Mostrar';
    }else {
      value  = 'Ocultar';
    }

    var data  = {
      id : id,
      value : value,
    }
    console.log(data);
    if (id) {
       $.ajax({
         url: '/admin/lugar/hidden',
         type: 'POST',
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
         data: data,
         success: function(data){
           if (data.data) {
            return window.location.pathname = '/admin/lugar';
           }
         },
         error: function(xhr, status){
           //console.log('status error',JSON.stringify(status));
         },
         complete: function(xhr, status){
           ///console.log('status complete',JSON.stringify(status));
         }
      })
    }
  })
  $('.btn-remove-review').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
      url: '/admin/review/'+id,
      type: 'DELETE',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      contentType: 'json',
      success: function(review){
        if (review) {
          console.log('Eliminacion realizada');
        }
      }, error: function(xhr, status){
        //console.log('status error',JSON.stringify(status));
      }, complete: function(xhr, status){
        //console.log('status complete',JSON.stringify(status));
        window.location.pathname = '/admin/review';
      }
    })
  })

  $('.btn-remove-place').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
      url: '/admin/lugar/'+id,
      type: 'DELETE',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      contentType: 'json',
      success: function(place){
        if (place) {
          console.log('Eliminacion realizada');
        }
      }, error: function(xhr, status) {
        //console.log('status error',JSON.stringify(status));
      }, complete: function(xhr, status) {
        //console.log('status complete',JSON.stringify(status));
        window.location.pathname = '/admin/lugar';
      }
    })
  })
})
