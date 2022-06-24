document.getElementById("pwdform").addEventListener("submit", function(event){
	var counter = 0;
	error = document.getElementById("errorpass");
	elem = document.getElementById("pass");
	if(elem.value == "" || elem.value.length < 8){
		error.style.color = 'red';
		error.innerHTML = "La password deve avere almeno 8 caratteri!";
		counter += 1;
	}
	else error.innerHTML = "";

	var error2 = document.getElementById("errorpass2");
	var elem2 = document.getElementById("confirm");
	if(elem.value != elem2.value){
		error2.style.color = 'red';
		error2.innerHTML = "Le due password non coincidono!";
		error.style.color = 'red';
		error.innerHTML = "Le due password non coincidono!";
		counter += 1;
	}

	var elem3 = document.getElementById("currentpass");
	if(elem3.value == elem.value){
		error2.style.color = 'red';
		error2.innerHTML = "La vecchia password e la nuova sono uguali!";
		error.style.color = 'red';
		error.innerHTML = "La vecchia password e la nuova sono uguali!";
		counter += 1;
	}

	if(counter) event.preventDefault();
});