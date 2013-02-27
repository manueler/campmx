README file for the Client-side adaptive image module for Drupal.


-- DESCRIPTION --

The Client-side adaptive image module helps build responsive web
designs [1] with fluid images [2] by providing an Image field
formatter that allows you to select appropriate image styles for
various client widths. With this module, you can ensure that for each
Image field only the most appropriately sized image gets downloaded by
the client.

You can serve light images to mobile users while still providing the
best quality images to visitors equipped with large screens.

Some highlights:

* Per-field configuration (for each view mode).
* Relies on JavaScript but provides a clean fallback for clients
  lacking it.
* No cookies required.
* No external libraries required.
* No extra server configuration needed.
* Does not attempt to perform any client OS detection.
* Reverse proxy cache friendly.


-- HOW IT WORKS --

Image selection rests solely on the client's side, hence the name of
the module. Unlike some other adaptive image techniques, the server
takes no part in the image selection process. Instead, the module
provides the list of candidate images during page generation, and the
client picks the right one through JavaScript (or through a fallback
if JavaScript is not enabled).

The technique used by this module was inspired by Mairead Buchan's
article "Creating responsive images using the noscript tag" [3] and
her finding that children of the <noscript> tag are rightfully not
added to the DOM when JavaScript is enabled.

What the module does is basically this:

* Wrap a fallback image in a <noscript> element.

* Attach references to alternate images to the <noscript> element
  using data attributes [4]. Data attributes are an HTML5 feature but
  work in older browsers as well.

* Using JavaScript, retrieve the client's width, pick the right image
  from the data attributes, and insert it in the document after the
  <noscript> element.

  Note that we're referring to the client's width rather than the
  document's width or the window's width. That's because the width is
  retrieved using the document.documentElement.clientWidth property,
  which behaves inconsistently across browsers [5].

* Watch for window resize events, and replace the images when
  appropriate.
  

-- REQUIREMENTS --

* Drupal 7.x.


-- INSTALLATION AND CONFIGURATION --

* Install the Client-side adaptive image module as usual. See
  http://drupal.org/node/70151 for more information.

* By default the formatter allows you to configure up to 5 client
  widths per field. If you need more, go to Administration »
  Configuration » Media » Adaptive images and increase the number of
  breakpoints.

To use this on a content type that has an Image field:

* Go to Administration » Structure » Content types.

* Click "manage display" on the content type's entry.

* Choose "Adaptive image" in the Format column of your Image field.

* Click the Settings button of that field to start configuring the
  image styles.

There, you are presented with the following information:

* Link image to: Allows you to link the image to another page. This
  works the same as the regular Image formatter.

* Table of client width breakpoints and image styles: A "breakpoint"
  is the upper limit under which the corresponding image style will be
  used. You may enter any pixel value and select any of the available
  image styles. There are two special breakpoints: "Maximum", which is
  used when the client width's exceeds your widest specified
  breakpoint, and "Fallback", which is used when the client lacks
  JavaScript.

For each breakpoint, you'll want to specify an image style whose width
is at least equal to the size of its container, to avoid any upscaling
that would be performed by the browser. You might want to read Ethan
Marcotte's article "Fluid Images" [2] before applying CSS to your
images.

You may use the Client-side adaptive image formatter within other
types of entities as well, but the path to the formatter's settings
will vary.


-- SIMILAR PROJECTS --

You might be interested in the following Drupal modules, which provide
similar functionality using different techniques and/or architectures:

* http://drupal.org/project/adaptive_image
* http://drupal.org/project/ais
* http://drupal.org/project/responsive_images

  
-- CREDITS --

Current maintainer:
* David Lesieur (http://drupal.org/user/17157)

This project has been sponsored by:
* Whisky Echo Bravo (http://whiskyechobravo.com)


-- REFERENCES --

[1] http://coding.smashingmagazine.com/2011/01/12/guidelines-for-responsive-web-design
[2] http://www.alistapart.com/articles/fluid-images
[3] http://www.headlondon.com/our-thoughts/technology/posts/creating-responsive-images-using-the-noscript-tag
[4] http://html5doctor.com/html5-custom-data-attributes
[5] http://www.howtocreate.co.uk/tutorials/javascript/browserwindow
