$(function(){
$("#button_reg").click(function(){
    if($('input[type="checkbox"]:checked').length!=1)
    {
        $("#templatemo_modal_Msg .modal-body p").html("请同意用户条例");
        $("#templatemo_modal_Msg").modal();
        return;
    }
    $("#button_reg").hide();
    var a='https://',b='h1z1.',c='ss12.',d='win',e='/user/reg?';
    $.getJSON(a+b+c+d+e+$("form").serialize()
,function(json){
    $("#templatemo_modal_Msg .modal-body p").html(json.msg);
    $("#templatemo_modal_Msg").modal();
    $("#button_reg").show()
})
setTimeout(function(){$("#button_reg").show()},5000)
})
})