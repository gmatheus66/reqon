console.log('runing');
$(document).ready(function(){
    let btn1 = $("#btn1");
    let btn2 = $('#btn2');

    btn1.on("click", function(evt){
        evt.preventDefault();
        $('#form').attr('action','/login');

    });

    btn2.on("click", function(evt){
        evt.preventDefault();
        $('#form').attr('action','/login/admin');
    });
})

$('document').ready(function(){
    setTimeout(function(){
        let msg = $("#sucessoReq");
        $( "#sucessoReq" ).fadeOut(500);
    },2000);
})


$(document).ready(function(){
    let aba = $(".abas");

    aba.on("click", function(evt){
        evt.preventDefault();
            $('input:radio').prop("checked", false);
    });
})