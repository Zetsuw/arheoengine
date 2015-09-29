new WOW().init();

function match(x) {
	valoare_criteriu = $('#criteriuINPUT').val();
    return x[0];
}

$('#criteriuINPUT').click(function(){
	$('#dropList').show();
});

function SetareCriteriu(x){
	$('#criteriuINPUT').text(x);
	$('#dropList').hide();
}

$('.rightClose').click(function(){
	var id=$('.rightClose').closest("div").attr("id");
	$("#"+id).fadeOut();
});

$("#age_options").hide();

$( "#search_categories" ).change(function(){
	if($( "#search_categories" ).val()=="Epoca sit"){
		$("#search_value").hide();
		$("#age_options").show();
		$("#value").prop( "disabled", true );
		$("#ages").prop( "disabled", false );
	} else {
		$("#search_value").show();
		$("#age_options").hide();
		$("#value").prop( "disabled", false );
		$("#ages").prop( "disabled", true );
	}
});