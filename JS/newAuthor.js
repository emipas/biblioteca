



$(document).ready(function(){
	$("#addAutore").hide();
	$("#add").click(

	function(e){
		e.preventDefault();
		e.stopPropagation();
   		$("#addAutore").show();
   		$("#newAuthorErrorMsg").hide();
	});

	$("#salvaAutore").click(function(e){

		e.preventDefault();
		e.stopPropagation();
		
		var newAutore = { 'nomeAutore' : $("#nome_autore").val()};
		
		var jqxhr = $.post( "api/author/save", JSON.stringify(newAutore), function(data) {
		  //alert( "success" );
		})
		  .done(function(data) {
		    alert('autore inserito');
		    $("#addAutore").hide();
		    $(function() {
		    	$("#selectAutore").append('<option selected="selected">'+newAutore['nomeAutore']+'</option');
		    	
		    });
		    
		  })
		  .fail(function(data) {
		    console.log(data.responseJSON);
		    $('#newAuthorErrorMsg').show();
		  });
		  
		
		
	});
});			

