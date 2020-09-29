const form =document.getElementById('form');
const username =document.getElementById('username');
const password =document.getElementById('password');

form.addEventListener('submit',(e) => {
	e.preventDefault();
	checkInputs();
});

function checkInputs(){
	const usernameValue=username.value.trim();
	const passwordValue=password.value.trim();

	if(usernameValue ===''){
		setErrorFor(username,'username cannot be Blank');
	}else{	
		setSuccessFor(username);

	}
	if(passwordValue===''){
		setErrorFor(password,'password cannot be Blank');
	}else{	
		setSuccessFor(password);
	}
}
function setErrorFor(input,message){
	const formControl= input.parentElement;
	const small= formControl.querySelector('small');

	small.innerText=message;

	formControl.className='form-control error';
}
function setSuccessFor(input){
	const formControl=input.parentElement;
	formControl.className='form-control success';	
}

