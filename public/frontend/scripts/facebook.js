$(function(){
  $(document).ready(function(){
    
    $('#review_likeId').on('click',function(){
    	console.log('getlikes');
    	var slug  = $(this).data('slug')
      $.ajax({
    		url:'https://graph.facebook.com/?ids=http://www.escapar.me/reviews/'+slug,
    		type:'get',
    		success:function(data){
    			console.log(data)
    			//var like = $('#txtSlug').val(data)

    			$.ajax({
    				url:'/',
    				data: '',
    				success: function(data){
    					//console.log(data);
    				}
    			})
    		}
    	})
    })
  })
})
function getLikes(){

}
