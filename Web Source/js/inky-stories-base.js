  var last_known_scroll_position = 0;
  var ticking = false;

  window.addEventListener('scroll', function(e) {

    last_known_scroll_position = window.scrollY;

    if (!ticking) {

      window.requestAnimationFrame(function() {
        if (last_known_scroll_position > (window.innerHeight * 0.75)) {
          addclass(document.querySelector('.button-backtotop'), 'active');
          if ((window.innerHeight/document.querySelector('.button-backtotop').clientHeight) < 6) {
            // If the back to top button is higher than 20% of the available viewport size, add a inline class
            addclass(document.querySelector('.button-backtotop'), 'inline');
          } else {
            remclass(document.querySelector('.button-backtotop'), 'inline');
          }
        } else {
          if (last_known_scroll_position < 1) {
            remclass(document.querySelector('.button-backtotop'), 'active');
          }
        }
        ticking = false;
      });

      ticking = true;

    }
  });

