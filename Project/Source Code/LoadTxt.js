
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
							Write.innerHTML +=  "<h3>"+"&emsp;" + textByLine1[i] +"</h3>";
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
					Write.innerHTML += '<input type="submit" value="Add to Cart" onClick="doSubmit()">'
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
			alert(checkboxesChecked.toString());
			}
		}