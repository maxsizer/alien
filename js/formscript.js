function firstField() {
		document.getElementById('first_name').focus();
	}


		function validateDate(inputField, helpText) {
				// First see if the input value contains data
				if (!validateNonEmpty(inputField, helpText))
					return false;
				// Then see if the input value is a date
				return validateRegEx(/^\d{2}\/\d{2}\/\d{2,4}$/,
					inputField.value, helpText,
					"Please enter a date (for example, 01/14/1975).");
			}
		
	function validateNonEmpty(inputField, helpText) {
				// See if the input value contains any text
				if (inputField.value.length === 0) {
					// The data is invalid, so set the help message
					if (helpText !== null)
						helpText.innerHTML = "Please enter a value here.";
			doSelection(inputField);
		//setTimeout(function (){inputField.focus(), 0});

			return false;
				}
				else {
					// The data is OK, so clear the help message
					if (helpText !== null)
						helpText.innerHTML = "";
					return true;
				}
		 }
	
		
	function validateLength(minLength, maxLength, inputField, helpText) {
				// See if the input value contains at least minLength but no more than maxLength characters
				if (inputField.value.length < minLength || inputField.value.length > maxLength) {
					// The data is invalid, so set the help message
					if (helpText !== null)
						helpText.innerHTML = "Please enter a value " + minLength + " to " + maxLength +
							" characters in length.";
			//setTimeout(function (){inputField.focus(), 0});
			return false;
				}
				else {
					// The data is OK, so clear the help message
					if (helpText !== null)
						helpText.innerHTML = "";
					return true;
				}
			}
	
	
	function validateNumber(inputField, helpText) {
				// See if the input value contains any text
				if (isNaN(parseFloat(inputField.value))) {
					// The data is invalid, so set the help message
					if (helpText !== null)
						helpText.innerHTML = "Please enter a number.";

					return false;
				}
				else {
					// The data is OK, so clear the help message
					if (helpText !== null)
						helpText.innerHTML = "";
					return true;
				}
		 }

	function validateEmail (inputField, helpText) {

	if ((inputField.value.indexOf(".")<3) || (inputField.value.indexOf("@")<1) || (inputField.value.indexOf(" ")!='-1'))   //checks for a dot after position 3, an @ after the first place and no spaces
		{
					if (helpText !== null)
						helpText.innerHTML = "Please enter an email address.";
			//document.my_form.inputField.focus();
					return false;
				}
				else {
					// The data is OK, so clear the help message
					if (helpText !== null)
						helpText.innerHTML = "";
					return true;
				}
	}
	

/*function addLoadEvent(func){
	var oldonload = window.onload;
	if(typeof window.onload != 'function'){
		window.onload = func;
	}
	else{
		window.onload = function(){
			if(oldonload){
				oldonload();
			}
			func();
		};
	}
}
	 
	addLoadEvent(firstField);*/