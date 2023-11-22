(function ($) {
  "use strict";

  const beProgressbarBlock = () => {
      const $progressbar = $('.be-progressbar-block');
      if ($progressbar.length === 0) return;
      let ProgressBar = require('progressbar.js');
      $progressbar.each(function () {
          const $idProgressbar = $(this).find('.be-progressbar-block-warp').attr('id'),
                $shape         = $(this).data('shape'),
                $value         = $(this).data('value') / 100,
                $height        = $(this).data('height'),
                $strokeColor   = $(this).data('stroke-color'),
                $trailColor    = $(this).data('trail-color'),
                $duration      = $(this).data('duration');
          if ($value > 0) {
              let progressbar;
              if ($shape === 'circle') {
                  progressbar = new ProgressBar.Circle(`#${$idProgressbar}`, {
                      strokeWidth: $height,
                      easing: 'easeInOut',
                      duration: $duration,
                      color: $strokeColor,
                      trailColor: $trailColor,
                      trailWidth: $height,
                      svgStyle: null
                  });
              } else {
                  progressbar = new ProgressBar.Line(`#${$idProgressbar}`, {
                      easing: 'easeInOut',
                      duration: $duration,
                      color: `${$strokeColor}`,
                      trailColor: `${$trailColor}`,
                  });

                  $(this).find('.be-progressbar-block-warp svg').css("height", $height);
              }

              const waypoint = new Waypoint({
                  element: this,
                  handler: function (direction) {
                      if (direction === 'down' && !progressbar.path.classList.contains('in-view')) {
                          progressbar.animate($value);
                          progressbar.path.classList.add('in-view');
                      }
                  },
                  offset: '80%'
              });
          }
      });
  }

  $(window).on("load", function () {
      beProgressbarBlock();
  });

})(jQuery);