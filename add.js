$( document ).ready(function() {
	let date = new Date();
	let yearOfBirth = $('#yearOfBirth');


	for(let i = 1970; i<date.getFullYear(); i++)
    {
		$('<option></option>',{
			value: i,
			text: i.toString(),
		}).appendTo(yearOfBirth);
	}	
});