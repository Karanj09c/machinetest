<?php
$bookingDetails = \App\Models\BookingDetail::getBookingDetails();
// echo "<pre>"; print_r(); die;
?>
<footer class="footer_sec">
    <div class="footer_top">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-12">
                        <div class="footer_widget">
                            <a href="{{ url('/') }}" class="footer_logo">
                                <img src="{{ asset('public/web/images/logo.png') }}" alt="logo">
                            </a>
                            <div class="footer_social">
                                <ul class="social_item text-right">
                                    <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="javascript:;#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <p class="footer_para mt-4 mb-4"> © 2024 All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
    	slidesPerView: 1,
	effect: 'fade',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev"
	},
	pagination: {
		el: ".swiper-pagination"
	},
	loop: true,
	autoplay: {
		delay: 2000,
	 },
	speed: 5000
    });
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
    var sections = $('section')
  , nav = $('.navbar-nav')
  , nav_height = nav.outerHeight();

$(window).on('scroll', function () {
  var cur_pos = $(this).scrollTop();
  
  sections.each(function() {
    var top = $(this).offset().top - 100,
        bottom = top + $(this).outerHeight();
    
    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('li').removeClass('active');
      sections.removeClass('active');
      
      $(this).addClass('active');
      nav.find('a[href="#'+$(this).attr('id')+'"]').parent().addClass('active');
    }
  });
});

nav.find('a').on('click', function () {
  var $el = $(this)
    , id = $el.attr('href');
  
  $('html, body').animate({
    scrollTop: $(id).offset().top - 100
  }, 0);
  
  return false;
});
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.6.0/main.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.6.0/main.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
//suppose this is array
var data = @json($bookingDetails);
arrays = data.map((value,index)=>{
  return {'title' : value.name,'start':value.date, 'color': "#3a87ad"}
})
// console.log(arrays)

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev',
      center: 'title',
      right: 'next'
    },
    // initialDate: '2021-04-25',
    navLinks: true, 
    selectable: true,
    selectMirror: true,
    eventDidMount: function(view) {
      $(arrays).each(function(i, val) {
        
        //find td->check if the title has same value-> get closest daygird ..change color there
        $("td[data-date=" + moment(val.start).format("YYYY-MM-DD") + "] .fc-event-title:contains(" + val.title + ")").closest(".fc-daygrid-event-harness").css("background-color", val.color);
      })
    },
    select: function(arg) {
      $('#createEventModal #startTime').val(arg.start);
      $('#createEventModal #endTime').val(arg.end);
      $('#createEventModal #when').text(arg.start);
      $('#createEventModal').modal('toggle');
    },
    eventClick:  function(arg) {
                $('#title').html(arg.event.title);
                $('#modalWhen').text(arg.event.start);
                $('#eventID').val(arg.event.id);
                $('#calendarModal').modal();
            },
    editable: true,
    dayMaxEvents: true,
    events: arrays //pass array here
  });

  calendar.render();
});
</script>
  </body>
</html>