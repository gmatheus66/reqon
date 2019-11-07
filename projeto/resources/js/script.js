const $ =  require("jquery");

$(document).ready(function(){
    console.log('run');

    let btn1 = $("#btn1");
    let btn2 = $('#btn2');
    let aba = $(".abas");

    btn1.on("click", function(evt){
        evt.preventDefault();
        $('#form').attr('action','/login');

    });

    btn2.on("click", function(evt){
        evt.preventDefault();
        $('#form').attr('action','/login/admin');
    });


    aba.on("click", function(evt){
        evt.preventDefault();
            $('input:radio').prop("checked", false);
    });

})

$(document).ready(function(){
    setTimeout(function(){
        let msg = $("#sucessoReq");
        $( "#sucessoReq" ).fadeOut(500);
    },2000);
})
