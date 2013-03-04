
CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Installation


INTRODUCTION
------------

Current Maintainer: Long Nguyen <olragon@gmail.com>

Nivo formatter is an image field formatter that transform any image field 
to awesome <a href="http://nivo.dev7studios.com/">Nivo Slider</a> image gallery.

For user:
- Support image style.
- Support thumbnail.
- Support most settings of Nivo Slider, except advanced triggers callback
settings.

For developer, themer: nivo_formatter support to load your Nivo Slider theme. just drop it 
in nivo-slider/themes/your-themes/ and ensure your stylesheet is 
nivo-slider/themes/your-theme/your-theme.css

Currently, it is not working with Views, you may want to check this out module 
<a href="http://drupal.org/project/views_nivo_slider">Views Nivo Slider</a>

Please fix my typos if it's wrong! Thanks.


INSTALLATION
------------
1. Download & install libraries module.

2. Download & install jquery_update module.

3. Create directory sites/all/libraries.

4. Download <a href="http://nivo.dev7studios.com/">Nivo slider</a> and extract 
   to sites/all/libraries/nivo-slider.
   Ensure this path exists:
   sites/all/libraries/nivo-slider/jquery.nivo.slider.pack.js

5. Download and enable nivo_formatter module.

6. Add field image if not existed to your content type admin/structure/types
   Select more than one value for your image field.

7. At Content's Manage Display tab, field Image, select Nivo formatter as format.
   Tweak setting as you like. Update -> Save.

8. Create content, upload some image and see Nivo Slider in action.
