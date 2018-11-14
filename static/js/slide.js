
$(function(){

    $('h5').on('click',function(){
        $(this).next().slideToggle();
        // alert();
    })
    $('h5').trigger('click');


})