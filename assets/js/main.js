function toggleDark(){
   const html = document.querySelector("html");
   html.classList.toggle("dark");

   const sun = document.querySelector("#toggledark .sun");
   sun.classList.toggle("blck");

   const moon = document.querySelector("#toggledark .moon");
   moon.classList.toggle("nne");
}

$(document).ready(function(){
   $('.latest-news-slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive:[
         {
            breakpoint: 768,
            settings:{
               slidesToShow: 1,
            }
         }
      ]
   });
   $('.latest-news-slider .slick-list .slick-track').addClass('flex flex-row space-x-0 md:space-x-4');

   // Ajax filter posting terbaru - Start
   $('.cat-list_item').on('click', function() {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');

      $.ajax({
         type: 'POST',
         url: '../../../../../wp-admin/admin-ajax.php',
         dataType: 'html',
         data: {
            action: 'filter_latest_posts',
            category: $(this).data('slug'),
         },
         success: function(res) {
            $('.latest-post-with-filter').html(res);
         }
      })
   });
   // Ajax filter posting terbaru - End
   // Ajax filter posting Lainnya - Start
   $('.cat-list_item').on('click', function() {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');

      $.ajax({
         type: 'POST',
         url: '../../../../../wp-admin/admin-ajax.php',
         dataType: 'html',
         data: {
            action: 'filter_posts_lainnya',
            category: $(this).data('slug'),
         },
         success: function(res) {
            $('.post-lainnya-with-filter').html(res);
         }
      })
   });
   // Ajax filter posting Lainnya - End
});
// jQuery End