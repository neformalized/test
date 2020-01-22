/*
* кривеший код который я когда либо писал :с
* ну не люблю яваскрипт вообще, от слова совсем
*/

$(document).ready(function(){
	
	$('#state select').chosen({
		width: '200px',
		disable_search: false,
		disable_search_threshold: 1,
		enable_split_word_search: false,
		search_contains: true,
		display_disabled_options: false,
		display_selected_options: false,
		max_shown_results: Infinity
	});
		
	$('#region select').chosen({
		width: '200px',
		disable_search: false,
		disable_search_threshold: 1,
		enable_split_word_search: false,
		search_contains: true,
		display_disabled_options: false,
		display_selected_options: false,
		max_shown_results: Infinity
	});
		
	$('#territory select').chosen({
		width: '200px',
		disable_search: false,
		disable_search_threshold: 1,
		enable_split_word_search: false,
		search_contains: true,
		display_disabled_options: false,
		display_selected_options: false,
		max_shown_results: Infinity
	});
});

function check(){
	
	var errors = false;
	
	//
	
	var name = $('input[name="name"]');
	var email = $('input[name="email"]');
	var territory = $('.need select');
	
	//
	
	if(name.val() == ''){
		errors = true;
	}
	else{
		if(!name.val().match('^[a-zA-Zа-яА-Я]{2,12}([\ ][a-zA-Zа-яА-Я]{2,12})?([\ ][a-zA-Zа-яА-Я]{2,12})?$')){
			errors = true;
			name.css('background-color', 'red');
		}
		else{
			name.css('background-color', 'green');
		}
	}
	
	//
	
	if(email.val() == ''){
		errors = true;
	}
	else{
		if(!email.val().match('^[a-zA-Z0-9\_\.]{3,32}\@[a-zA-Z0-9]{2,32}\.?[a-zA-Z0-9]{2,12}\.[a-zA-Z]{2,12}$')){
			errors = true;
			email.css('background-color', 'red');
		}
		else{
			email.css('background-color', 'green');
		}
	}
	
	//
	
	if(territory.val() == undefined || territory.val() == '') errors = true;
	
	//
	
	if(errors == true){
		$('#submit').css('display', 'none');
		return
	}
	
	//
	
	var result;
	
	$.ajax({
		type: 'GET',
		async: false,
		url: '/?controller=api/home&act=getPeople&email=' + email.val(),
		success: function(data){
			result = data;
		}
	});
	
	if(result == 'false' || result == '[]'){
		$('#submit').css('display', 'block');
	}
	else{
		result = JSON.parse(result);
		
		output = 'Такой email уже зарегистрирован\n';
		output += 'ФИО: ' + result["name"] + '\n';
		output += 'Территория: ' + result["territory"] + '\n';
		
		alert(output);
	}
}

function loader(id, scene){
	
	var result;
	
	$.ajax({
		type: 'GET',
		async: false,
		url: '/?controller=api/home&act=getById&id=' + id,
		success: function(data){
			result = data;
		}
	});
	
	switch(scene){
		case 1:
			clearOptions('#region');
			clearOptions('#territory');
			
			loadOptions(result, '#region');
			
			$('#territory').css('display', 'none');
			$('#region').css('display', 'block');
			break;
		case 2:
			clearOptions('#territory');
			$('#territory').css('display', 'none');
			
			if(result == '[]' || result == 'false'){
				
				$('#region').addClass('need');
				$('#territory').removeClass('need');
			}
			else{
				
				loadOptions(result, '#territory');
				
				$('#region').removeClass('need');
				$('#territory').addClass('need');
				$('#territory').css('display', 'block');
			}
			
			break;
	}
}

function clearOptions(target){
	
	var selector = $(target + ' select');
	
	selector.empty();
	selector.append('<option></option>');
}

function loadOptions(options, target){
	
	var selector = $(target + ' select');
	var object = JSON.parse(options);
	
	for(var row in object){
		selector.append('<option value="' + object[row]["ter_id"] + '">' + object[row]["ter_name"] + '</option>');
	}
	
	selector.trigger('chosen:updated');
}