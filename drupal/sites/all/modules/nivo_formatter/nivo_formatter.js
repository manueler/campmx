(function ($) {
  Drupal.behaviors.myModuleBehavior = {
    attach: function (context, settings) {
      var nf_setting = settings.nivo_formatter;
      $(window).load(function() {
        for (var field_name in nf_setting) {
          $("#slider-" + field_name).nivoSlider(nf_setting[field_name]);
        }
        // support old config.
        if($('#slider').length) {
          $('#slider').nivoSlider(nf_setting);
        }
      });
    }
  };
}(jQuery));
