document.getElementById("regform").addEventListener("submit", function(event){
	var counter = 0;
	var error = document.getElementById("errormail");
	var elem = document.getElementById("email");
	if(elem.value == ""){
		error.innerHTML = "Inserisci un email valida!";
		counter += 1;
	}
	else error.innerHTML = "";

	error = document.getElementById("errorpass");
	elem = document.getElementById("pass");
	if(elem.value == "" || elem.value.length < 8){
		error.style.color = '#d00';
		error.innerHTML = "La password deve avere almeno 8 caratteri!";
		counter += 1;
	}
	else error.innerHTML = "";

	var error2 = document.getElementById("errorpass2");
	var elem2 = document.getElementById("confirm");
	if(elem.value != elem2.value){
		error2.style.color = '#d00';
		error2.innerHTML = "Le due password non coincidono!";
		counter += 1;
	}

	if(counter) event.preventDefault();
});
