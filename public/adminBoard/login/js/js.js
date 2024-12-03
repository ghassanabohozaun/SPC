if($('.timer').length)
{
    $('.timer').countTo();
}
$(document).on('click','.link-to-video',function(){
    $(this).hide();
});

$('.slider-cat').slick({
    centerPadding: '60px',
    slidesToShow: 8,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 1,
        }
      }
    ]
  });
