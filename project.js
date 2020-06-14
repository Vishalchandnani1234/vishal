var image=["review1.png",
			"review2.png",
			"review3.png"];

var i=0;
function slides()
{
	document.getElementById('#slide1').src = image[i];
	if(i<(image.length-1))
	{
		i++;
	}
	else
	{
		i=0;
	}
}
setInterval(slides,2000);			