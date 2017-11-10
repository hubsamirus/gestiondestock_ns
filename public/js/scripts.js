$('.panel-body').removeClass('jsOff').addClass('jsOn');

var accordion = $('.accordion');

accordion.find('dd').hide();

accordion.find('dt').on('click', function(){
    $(this).toggleClass('open').next('dd').slideToggle().siblings('dd:visible').slideUp().prev('dt').removeClass('open');
});
