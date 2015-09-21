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