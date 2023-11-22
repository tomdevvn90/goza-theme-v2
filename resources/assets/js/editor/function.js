jQuery(window).on("load", function ($) {
    function beCountDown () {
        const $count_Down = jQuery('[data-count-down]');
        if ($count_Down.length === 0) return;

        $count_Down.each(function () {
            let $dataCountDown = jQuery(this).data('count-down')
            let $result = jQuery(this).find('#be-count-down--result')

            if ($dataCountDown.length > 0) {
                __renderCountDown($dataCountDown, $result)
            }
        })

        function __renderCountDown($dataCountDown, $result) {
            var countDownDate = new Date(`${$dataCountDown}`).getTime();

            var x = setInterval(function () {
                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $result.html("<div class='be-day'>" + days + "<span>Days</span>" + "</div>" + "<div class='be-hours'>" + hours + "<span>Hours</span>" + "</div>"
                    + "<div class='be-min'>" + minutes + "<span>Minutes</span>" + "</div>" + "<div class='be-sec'>" + seconds + "<span>Seconds</span>" + "</div>");

                if (distance < 0) {
                    clearInterval(x);
                    $result.html("<span>EXPIRED</span>");
                }

            }, 1000);
        }
    }

    beCountDown();
});


