$(document).ready(
	function(){
		$('#selectstate').chosen({
			width: '200px',
			disable_search: false,
			disable_search_threshold: 1,
			enable_split_word_search: false,
			no_results_text: 'Ничего не найдено',
			placeholder_text_single: 'Список областей',
			search_contains: true,
			display_disabled_options: false,
			display_selected_options: false,
			max_shown_results: Infinity
		});
		
		$('#selectcity').chosen({
			width: '200px',
			disable_search: false,
			disable_search_threshold: 1,
			enable_split_word_search: false,
			no_results_text: 'Ничего не найдено',
			placeholder_text_single: 'Список городов',
			search_contains: true,
			display_disabled_options: false,
			display_selected_options: false,
			max_shown_results: Infinity
		});
		
		$('#selectlocation').chosen({
			width: '200px',
			disable_search: false,
			disable_search_threshold: 1,
			enable_split_word_search: false,
			no_results_text: 'Ничего не найдено',
			placeholder_text_single: 'Список районов',
			search_contains: true,
			display_disabled_options: false,
			display_selected_options: false,
			max_shown_results: Infinity
		});
		
		
	}
);

function registration(){
	
	var fio = $('#fio').val();
	var email = $('#email').val();
	var location = $('#selectlocation').val();
	
	//
	
	var errors = false;
	
	//
	
	if(!email.match('^[a-zA-Z0-9\_\.]{3,32}\@[a-zA-Z0-9]{2,32}\.?[a-zA-Z0-9]{2,12}\.[a-zA-Z]{2,12}$')) errors = true;
	if(!fio.match('^[a-zA-Zа-яА-Я]{2,12}([\ ][a-zA-Zа-яА-Я]{2,12})?([\ ][a-zA-Zа-яА-Я]{2,12})?$')) errors = true;
	if(!location.match('^[0-9]{10}$')) errors = true;
	
	//
	
	if(errors == true) return;
	
	//
	
	var result;
	
	$.ajax({
		type: 'GET',
		async: false,
		url: '/?controller=Api&fnc=checkEmail&email=' + email,
		success: function(data){
			result = data;
		}
	});
	
	if(result == 'false') $('#reg').submit();
	else{
		result = JSON.parse(result);
		
		output = 'Такой email уже зарегистрирован\n';
		output += 'ФИО: ' + result["name"] + '\n';
		output += 'Территория: ' + result["territory"] + '\n';
		
		alert(output);
	}
}

function loader(value, scenario){
	
	var result;
	
	$.ajax({
		type: 'GET',
		async: false,
		url: '/?controller=Api&fnc=getLocality&ter_id=' + value,
		success: function(data){
			result = data;
		}
	});
	
	if(result == 'false') return;

	switch(scenario){
		case 1:
			clearOptions('#selectcity');
			clearOptions('#selectlocation');
			loadOptions(result, '#selectcity');
			$('#locations').css('display', 'none');
			$('#citys').css('display', 'block');
			break;
		case 2:
			clearOptions('#selectlocation');
			loadOptions(result, '#selectlocation');
			$('#locations').css('display', 'block');
			break;
	}
}

function clearOptions(selectId){
	$(selectId).empty();
	$(selectId).append('<option></option>');
}

function loadOptions(data, destination){
	
	var object = JSON.parse(data);
	
	for(var row in object){
		$(destination).append('<option value="' + object[row]["ter_id"] + '">' + object[row]["ter_name"] + '</option>');
	}
	
	$(destination).trigger('chosen:updated');
}