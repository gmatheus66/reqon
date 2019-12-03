const $ =  require("jquery");

$(document).ready(function(){
    console.log('run');


    let btn1 = $("#btn1");
    let btn2 = $('#btn2');
    let aba = $(".abas");
    let btnres = $('.btn-responder');
    let btnenc = $('.btn-encaminhar');
    //let actenc = $('#action-encaminhar');
    //let actres = $('#action-responder');
    let icon = $('.icon');

    //icon.toggle(function(){ icon.text("-")},function(){icon.text("+")})
    //$('input[name="data_ini"]').daterangepicker();
    /*
    icon.click(function(evt){
        //console.log(icon);
        //console.log(this.textContent);
        //icon.toggle(function(){icon.text("-")});
        if(this.textContent == "+"){
            icon.text("-");
        }else{
            icon.text("+");
        }
    })
    */

    $('.btn-action').click(function(evt){
        evt.preventDefault();
        let formSel = $(this).data('form');
        $('.form-action').hide()
        $(formSel).toggle()
        //actres.toggle("slow")
    });
    $('.child .icon').click(function(evt) {
        let bodySel = $(this).data('body');
        $(bodySel).toggle()
        $(this).toggleClass('collapse')
        $(this).toggleClass('expand')
    })

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

    $('div[id=main]', 'div[class=showreq]',(evt) => {
        console.log(evt);
    });

})


$(document).ready(function(){
    setTimeout(function(){
        let msg = $("#sucessoReq");
        $( "#sucessoReq" ).fadeOut(500);
    },2000);
    setTimeout(function(){
        $( "#msgscs" ).fadeOut(500);
    },3000);
})
