

$( document ).ready(function() {
  // Handler for .ready() called.

$("#btnSend").click(function(){
	
	var apiNumber=$("#apiCall").val();
	if (isNaN(apiNumber)==true || apiNumber=='')
	{
		alert("not a number");
		return;
	}
	var pString="";

	for(a=1;a<4;a++)
	{
		var p=$("#p"+a).val();
		pString+=p+"|";
	}

   $.post("api/gateway.php",
    {
        callNumber: apiNumber,
        z: pString
    },
    function(data, status){
      // alert("Data: " + data + "\nStatus: " + status);
       $("#output").text(data);
    });

    console.log(pString);
});

});