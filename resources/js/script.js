const $ =  require("jquery");

$(document).ready(function(){
    console.log('run');


    let btn1 = $("#btn1");
    let btn2 = $('#btn2');
    let aba = $(".abas");
    let btnres = $('#btn-responder');
    let btnenc = $('#btn-encaminhar');
    let actenc = $('#action-encaminhar');
    let actres = $('#action-responder');


    btnres.click(function(evt){
        evt.preventDefault();
        actres.toggle("slow")
    });
    btnenc.click(function(evt){
        evt.preventDefault();
        actenc.toggle("slow")
    });

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

    btnres.on("click", function(evt){
        evt.preventDefault();
        $("#action-encaminhar").css('display', 'none');
        $("#action-responder").css('display', 'block');
    })

    btnenc.on('click', function(evt){
        evt.preventDefault();
        $("#action-encaminhar").css('display', 'block');
        $("#action-responder").css('display', 'none');
    })



})

$(document).ready(function(){
    setTimeout(function(){
        let msg = $("#sucessoReq");
        $( "#sucessoReq" ).fadeOut(500);
    },2000);
})
