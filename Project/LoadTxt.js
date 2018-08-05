
function readText(file1,file2)
{
    var rawFile1 = new XMLHttpRequest();
	var rawFile2 = new XMLHttpRequest();
    rawFile1.open("GET", file1, false);
	rawFile2.open("GET", file2, false);
    rawFile1.onreadystatechange = function ()
    {
		rawFile2.onreadystatechange = function()
		{
			if(rawFile1.readyState === 4&& rawFile2.readyState === 4)
			{
				if((rawFile1.status === 200 || rawFile1.status == 0 )&&( rawFile2.status === 200 || rawFile2.status == 0))
				{
					var allText1 = rawFile1.responseText;
					var allText2 = rawFile2.responseText;

					var textByLine1 = allText1.split("\n");
					var textByLine2 = allText2.split("\n");
						
					//Defult Breakfast
					var Write = document.getElementById('Breakfast');
					
					//Count the Times
					var TCount1 = 0
					var TCount2 = 0
					
					var j = 0;
					
					for(var i=0;i<textByLine1.length;i++)
					{
						if(textByLine1[i] > "~T~")
						{
							TCount1 ++;
							i++;
						}
						if(textByLine1[i] < "~T~")
						{
							if(TCount1 == 1)
							{
								Write = document.getElementById('Lunch');
							}
							if(TCount1 == 2)
							{
								Write = document.getElementById('Dinner');
							}
							Write.innerHTML +=  "<h2>"+"&emsp;" + textByLine1[i] +"</h2>";
						}
						
						for(j;j<textByLine2.length;j++)
						{
							if(textByLine2[j] > "~C~"||textByLine2[j] > "~T~")
							{
								if(textByLine2[j] > "~T~")
								{
									TCount2++;
									j++;
									break;
								}
								else
								{
									j++;
									break;
								}
							}
							if(textByLine2[j] < "~C~"&&textByLine2[j] < "~T~")
							{

								if(TCount2 == 1)
								{
									Write = document.getElementById('Lunch');
								}
								if(TCount2 == 2)
								{
									Write = document.getElementById('Dinner');
								}
								//So last check box does not load in			> = equals  < = notequal
								if(textByLine2[j] >"")
								{
									Write.innerHTML +=  '<input type="checkbox" name="checkboxall" value="'+textByLine2[j]+'">'+'&emsp;'+ textByLine2[j] +'<br>';
								}
							}
						}
					}
				}
			}
		}
		rawFile2.send(null);
    }
    rawFile1.send(null);
}

function doSubmit() 
{	
	chkboxName = "checkboxall"
	
	var checkboxes = document.getElementsByName(chkboxName);
	var checkboxesChecked = [];
	// loop over them all
	for (var i=0; i<checkboxes.length; i++) 
	{
		// And stick the checked ones onto an array...
		if (checkboxes[i].checked) 
		{
			checkboxesChecked.push(checkboxes[i].value);
		}
	}
	// Return the array if it is non-empty, or null
	if(checkboxesChecked.length > 0 ? checkboxesChecked : null)
	{
		DisplayCart(checkboxesChecked);
	}
	
	else{
		alert("You need to select at least 1 item!");
	}
}

function validateOrder()
{
	$(document).ready(function()
	{
		$('#submitB').prop("disabled", true);
		$('input:checkbox').click(function() {
		 if ($(this).is(':checked')) {
		 $('#submitB').prop("disabled", false);
		 } else {
		 if ($('.checkboxes').filter(':checked').length < 1){
		 $('#submitB').attr('disabled',true);
		 }
		 }
		});
	});
}
	
function doClear()
{
	chkboxName = "checkboxall"
	var checkboxes = document.getElementsByName(chkboxName);
	//Clears checks
	for (var i=0; i<checkboxes.length; i++) 
	{
		checkboxes[i].checked = false;
	}
	//Clears Cart
	var Write = document.getElementById('Cart');
	Write.innerHTML = "";
}
	
function DisplayCart(toCartArray)
{
	var Write = document.getElementById('Cart');
	//Cart Text
	Write.innerHTML = "<hr>"+'<h1 style="font-family:verdana;">Cart</h1>';
	//Add items to cart on website
	for(var i=0; i<toCartArray.length; i++)
	{
		Write.innerHTML +=  i+1+") "+toCartArray[i]+"<br />";
	}
	//Checkout Button
	Write.innerHTML += "<br/>"+'<button class = "MenuButtons" id="CheckoutButton" type="button" onClick="ToCheckout()">Checkout</button>';
	//Scrolls to bottom
	window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);

	//Store array for use on another page
	if( !window.localStorage)
	{
		alert("Sorry, you're using an ancient browser");
	}
	else 
	{
		localStorage.myArray = JSON.stringify(toCartArray);
	}
}

function ToCheckout()
{
	//Change page
	window.location.href='uDine Menu Checkout.html'
}

function DisplayCheckout()
{
	//Get stored data and set it back to toCartArray
	var toCartArray = JSON.parse(localStorage.myArray);
	
	var Write = document.getElementById('CheckoutDisplay');
	
	for(var i=0; i<toCartArray.length; i++)
	{
		Write.innerHTML +=  i+1+") "+toCartArray[i]+"<br />";
	}
}

function CheckoutButton()
{
	var addedTime = 20;
	var d = new Date();
	var apm = "AM";
	if (d.getHours() >12){var h = d.getHours()-12; apm = "PM"; } 
	var m = d.getMinutes();
	m = m + addedTime;
	if(m > 59){m = m-60; h++; if(m<10){var u = "0"+ m; m = u;}}
	alert("Your order has been placed and will be ready for pickup at "+h+":"+m+" "+apm+".");
	window.location.href='uDine Menu.html'
}