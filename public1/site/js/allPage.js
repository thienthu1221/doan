function get_countdown(id_display, time_now, deadline) {
    var countDownDate = new Date(deadline).getTime();
    if (countDownDate > 0) {
        var x = setInterval(function () {
            // Get todays date and time
            var time_now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - time_now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            var text_day = days > 0 ? days + ":" : "";
            var hourglass='<i class="fa fa-hourglass-half" aria-hidden="true"></i>';
            document.getElementById(id_display).innerHTML = hourglass+" "+text_day + hours + ":"
                    + minutes + ":" + seconds;

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(id_display).innerHTML = "";
            }
        }, 1000);
    }
}

  