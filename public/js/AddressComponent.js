function changeCountryName() {
	var selectBox = $("#CountryNameSelectedBox");
	var selectedValue = selectBox.options[selectBox.selectedIndex].value;

	$('#unit_code-select-box').find('option').remove().end(); 

	$("#unit_code-select-box").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");
	for (i = 0; i < admistrative_unit_country_code.length; i++) {
		if(admistrative_unit_country_code[i] == selectedValue){
			$("#unit_code-select-box").append(new Option(admistrative_unit_name[i], admistrative_unit_code[i]));
		}
	}

	$('#address_component_unit_country_code_hidden').value = selectedValue;
	$('#address_component_unit_all_type_hidden').value = admistrative_unit_type;
}

function changeAdmisUnit() {
	var selectBox = $("#unit_code-select-box");
	var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	var countryCode = $('#address_component_unit_country_code_hidden').value;

	for (i = 0; i < admistrative_unit_type.length; i++) {
		if(selectedValue == admistrative_unit_code[i] && countryCode == admistrative_unit_country_code[i]){
			$('#address_component_unit_type_hidden').value = admistrative_unit_type[i];
			$('#address_component_unit_level_hidden').value = admistrative_unit_address_component_level[i];
		}
	}
}