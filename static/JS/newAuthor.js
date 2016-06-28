$("#addAutorse").hide();
alert('poppo');
$("#add").click(

function(){
   		$("#addAutore").show();
});

$(document).ready(function(){
	$("#salvaAutore").click(function(){
		var nomeAutore = $("#nome_autore").val();
		$.ajax({
			type: "POST",
			url:"",
			data: "nomeAutore=" + nome_autore,
			dataType: "",
			success: function(msg)
			{
			   $("#risultato").html(msg);
			},
			error: function()
			{
				alert:("Chiamata fallita,riprovare");
			}
		});
	});
});			

