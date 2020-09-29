const form =document.getElementById('form');
const username =document.getElementById('username');
const email =document.getElementById('email');
const password =document.getElementById('password');
const password2 =document.getElementById('password2');

form.addEventListener('submit',(e) => {
	e.preventDefault();
	checkInputs();
});

function checkInputs(){
	const usernameValue=username.value.trim();
	const emailValue=email.value.trim();
	const passwordValue=password.value.trim();
	const password2Value=password2.value.trim();

	if(usernameValue ===''){
		Error(username,'username cannot be Blank');
	}else{	
		Success(username);

	}
	if(emailValue===''){
		Error(email,'Email cannot be blank');
	}else if(!Email(emailValue)){
		Error(email,'Email is not valid');
	}
	else{
		Success(email);
	}

	if(passwordValue===''){
		Error(password,'password cannot be Blank');
	}else{	
		Success(password);
	}
	if(password2Value===''){
		Error(password2,'password2 cannot be Blank');
	}else if(passwordValue!==password2Value){
		Error(password2,'passwords does not match')
	}
	else{	
		Success(password2);
	}
}
function Error(input,message){
	const formControl= input.parentElement;
	const small= formControl.querySelector('small');

	small.innerText=message;

	formControl.className='form-control error';
}
function Success(input){
	const formControl=input.parentElement;
	formControl.className='form-control success';	
}

function Email(email){
	return /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email);	
}
