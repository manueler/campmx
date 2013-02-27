/**
 * @file
 * JavaScript functions for the Client-side adaptive image module.
 */

(function ($) {
  Drupal.behaviors.csAdaptiveImage = {
    attach: function(context, settings) {
      /**
       * Retrieves an adapted image based element's data attributes
       * and the current client width.
       */
      var getAdaptedImage = function(element, excluded_breakpoint) {
        var selected_breakpoint = 'max';
        var breakpoints = $(element).attr('data-adaptive-image-breakpoints');
        if (breakpoints) {
          // Find applicable target resolution.
          $.each(breakpoints.split(' '), function(key, breakpoint) {
            if (document.documentElement.clientWidth <= Number(breakpoint) && (selected_breakpoint == 'max' || Number(breakpoint) < Number(selected_breakpoint))) {
              selected_breakpoint = breakpoint;
            }
          });
        }
        if (selected_breakpoint != excluded_breakpoint) {
          return $(element).attr('data-adaptive-image-' + selected_breakpoint + '-img');
        }
        else {
          return false;
        }
      };

      // Insert adapted images.
      $('noscript.adaptive-image').addClass('adaptive-image-processed').each(function(index) {
        var img = getAdaptedImage(this);
        $(this).after(img);
      });

      // Replace adapted images on window resize.
      $(window).resize(function() {
        $('noscript.adaptive-image-processed').each(function(index) {
          // Replace image if it does not match the same breakpoint.
          var excluded_breakpoint = $(this).next('img.adaptive-image').attr('data-adaptive-image-breakpoint');
          var img = getAdaptedImage(this, excluded_breakpoint);
          if (img) {
            $(this).next('img.adaptive-image').replaceWith(img);
          }
        });
      });
    }
  };
})(jQuery);