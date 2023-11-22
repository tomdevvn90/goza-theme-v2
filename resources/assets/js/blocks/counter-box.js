import counterUp from 'counterup2';
const beCounterBox = () => {
    const $isCounterBox = document.querySelectorAll('.be-counter-up .counter-up');
    if ($isCounterBox.length === 0) return;

    const callback = entries => {
        entries.forEach(entry => {

            const el = entry.target
            if (entry.isIntersecting && !el.classList.contains('is-visible')) {
                let $duration = $(el).data('duration') ? $(el).data('duration') : 1000
                let $delay = $(el).data('delay') ? $(el).data('delay') : 60

                counterUp(el, {
                    duration: $duration,
                    delay: $delay,
                })

                el.classList.add('is-visible')
            }
        })
    }

    const IO = new IntersectionObserver(callback, { threshold: 1 })

    $isCounterBox.forEach(function ($value, index) {
        IO.observe($value)
    });

}

$(document).ready(function () {
    beCounterBox();
})