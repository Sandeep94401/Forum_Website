function sendOtp()
{
    $(".error").html("").hide();
    var number=$("#mobile").val();
    if(number.length == 10 && number!=null)
    {
        var input={
         "mobile_number" : number,
         "action" : "send_otp"
        };
        $.ajax({
        url: 'controller.php',
        type: 'POST',
        data: input,
        success: function(response){
            $(".container").html(response);

        }
    });
}

else{
    $(".error").html('please enter valid ')
    $(".error").show();

}
}
function verifyOtp()
{
    $(".error").html("").hide();
    $(".success").html("").hide();
var otp= $("#mobileOtp").val();
var input={
    "otp" : otp,
    "action" : "verify_otp"
   };
   if(otp.length == 10 && otp!=null)
{
   $.ajax({
    url: 'controller.php',
    type: 'POST',
 dataType : "json",
    data: input,
    success: function(response){
        $("." + response.type).html(response.message);
        $("." + response.type).show();
},
error : function()
{
    alert("ss");
}
});
}
}