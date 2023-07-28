$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
    });
});

function send()
{
	let email = document.getElementsByName('email')[0].value;
	let phoneNumber = document.getElementsByName('phoneNumber')[0].value;
	let backUpPhone = document.getElementsByName('backUpPhone')[0].value;
	let surname = document.getElementsByName('surname')[0].value;
	let name = document.getElementsByName('name')[0].value;
	let fathersName = document.getElementsByName('fathersName')[0].value;
	let dayOfBirth = document.getElementsByName('dayOfBirth')[0].value;
	let monthOfBirth = document.getElementsByName('monthOfBirth')[0].value;
	let yearOfBirth = document.getElementsByName('yearOfBirth')[0].value;
	let pendalf = document.querySelector('input[name="pendalf"]:checked').value;

	let m='POST';

	jax(m,email, phoneNumber,backUpPhone,surname,name,
		fathersName,dayOfBirth,monthOfBirth,yearOfBirth,pendalf);
}

document.getElementsByName("saveChanges")[0].onclick = send;

function jax(m,email, phoneNumber,backUpPhone,surname,name,
	fathersName,dayOfBirth,monthOfBirth,yearOfBirth,pendalf)
{
	$.ajax
	({
		dataType: 'json', 
		url: 'send.php',
		method: m,
		data: {email:email, phoneNumber:phoneNumber,backUpPhone:backUpPhone,
				surname:surname,name:name,fathersName:fathersName,dayOfBirth:dayOfBirth,
				monthOfBirth:monthOfBirth,yearOfBirth:yearOfBirth,pendalf:pendalf},
		success: function(json_encode)
		{
			if(!json_encode.status)
			{
				alert(Object.values(json_encode));
				values();
        	}
		}
	})
}