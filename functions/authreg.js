//Задание 2

login.onblur = function(){
	let regex = /^[а-яёa-z0-9А-ЯЁA-Z$()^;:,]{3,}$/;

	if (!regex.test(login.value)){
		errorlogin.innerHTML = 'Может состоять из цифр,символов русского и английского алфавита, символов $ ( ) ^ ; : ,. Не должен быть кроче 3 символов.';
	}
}

login.onfocus = function(){
		errorlogin.innerHTML = '';
}


//Задание 3
// email.onblur = function(){
// 	let regex = /^\w+([\.\w]+)*\w@\w((\.\w)*\w+)*\.\w{2,3}$/;

// 	if (!regex.test(email.value)){
// 		email.classList.add('invalid');
// 		errorEmail.innerHTML = 'Неверный e-mail';
// 	}
// }

// email.onfocus = function(){
// 	if (this.classList.contains('invalid')){
// 		this.classList.remove('invalid');
// 		errorEmail.innerHTML = '';
// 	}
// }

// //Задание 4
// city.onblur = function(){
// 	let regex = /^[а-яёa-z]{1,20}$/i;

// 	if (!regex.test(city.value)){
// 		city.classList.add('invalid');
// 		errorCity.innerHTML = 'Может состоять из символов русского и английского алфавита. Не должен быть длиннее 20 символов.';
// 	}
// }

// city.onfocus = function(){
// 	if (this.classList.contains('invalid')){
// 		this.classList.remove('invalid');
// 		errorCity.innerHTML = '';
// 	}
// }
// //Задание 5
// pass.onblur = function(){
// 	let regex = /((?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*[0-9])){8,}/; 

// 	if (!regex.test(pass.value)){
// 		pass.classList.add('invalid');
// 		errorPass.innerHTML = 'Должен содержать цифры и буквы в верхнем и нижнем регистре. Не может быть короче 8 символов.';
// 	}
// }

// pass.onfocus = function(){
// 	if (this.classList.contains('invalid')){
// 		this.classList.remove('invalid');
// 		errorPass.innerHTML = '';
// 	}
// }

// function showPass(){
// 	if (pass.getAttribute('type') == 'password') {
// 		pass.setAttribute('type', 'text');
// 	} else {
// 		pass.setAttribute('type', 'password');
// 	}
// }

// //Задание 6
// number.onblur = function(){
// 	let regex = /\((\d{2})\)\s+(\d{3}-\d{2}-\d{2})/;

// 	if (!regex.test(number.value)){
// 		number.classList.add('invalid');
// 		errorNumber.innerHTML = 'Требуется ввод в формате (хх) ххх-хх-хх';
// 	}
// }

// number.onfocus = function(){
// 	if (this.classList.contains('invalid')){
// 		this.classList.remove('invalid');
// 		errorNumber.innerHTML = '';
// 	}
// }
// //Задание 7
// date.onblur = function(){
// 	let regex = /^\d{2}.\d{2}.\d{2}$/;

// 	if (!regex.test(date.value)){
// 		date.classList.add('invalid');
// 		errorDate.innerHTML = 'Требуется ввод в формате хх.хх.хх';
// 	}
// }

// date.onfocus = function(){
// 	if (this.classList.contains('invalid')){
// 		this.classList.remove('invalid');
// 		errorDate.innerHTML = '';
// 	}
// }


// //Задание 8
// function isFilledCheck(){
// 	let flag = true;

// 	if (firstName.value == ''){
// 		errorFirstName.innerHTML = 'Это обязательное поле';
// 		flag = false;
// 	}

// 	if (lastName.value == ''){
// 		errorLastName.innerHTML = 'Это обязательное поле';
// 		flag = false;
// 	}

// 	if (number.value == ''){
// 		errorNumber.innerHTML = 'Это обязательное поле';
// 		flag = false;
// 	}

// 	return flag;
// }
