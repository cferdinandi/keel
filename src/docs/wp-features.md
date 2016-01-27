# WordPress-Specific Features

All of these features can be toggled on or off in the `keel_developer_options()` function in `functions.php`. Most are off by default.

<hr>


## Image Galleries

Create beautiful, mosaic image galleries using the `[[gallery]]` shortcode, or the built-in gallery feature in the WordPress editor. Theme users can disable this capability under `Media` > `Photo Galleries` in the Dashboard.

<hr>


## Heros

Underneath the content section is a `Page Hero` section. Add your hero content there. In addition to text, you can also add an image or video.

To apply a background image to the hero, use the `Featured Image` section in the sidebar. If text is hard to read on the background image, check the box to add a `Background Image Overlay`.

<hr>


## Custom Logos

From the WordPress Dashboard, visit `Appearance` > `Customize`, and select `Logo`. Click `Select Image`, and upload your preferred logo image. Click `Save & Publish` at the top of the page when you’re done.

<hr>


## Button Links

Add bold calls to action in your content with the `[button]` shortcode:

```markup
[[button link="#create-a-button-link" label="Click Me"]]
```

To make a button extra large, also include the `size` attribute with the value `large`:

```markup
[[button link="#create-a-button-link" label="Large Click Me" size="large"]]
```

<hr>


## Inline SVGs

Keel adds Media Library support for SVGs. While SVGs can be used as the `src` of an `<img>` tag, Keel also includes the `[[svg]]` shortcode if you'd prefer to inline your SVGs.

An `id` or `url` attribute must be passed in. You can also add classes to the SVG with the `class` attribute.

```php
[[svg url="http://harbor.gomakethings.com/some-image.svg" class="icon icon-large"]]
```

<hr>


## Custom Layouts

A special meta box on pages lets you customize the width of the page.

`default` is the narrow, content-focused page width (`40em`). `wide` sets the page content to the same width as the header and footer (`80em`).

`diy` removes all padding from the body content and gives you complete control. This is useful when you want to include full-bleed content sections.

You can also hide the page `h1` header by checking the `Hide Page Header` checkbox.

<hr>


## Disable Comments

From the Dashboard, visit `Posts` > `Post Options`, and click `Disable comments on all blog posts`. Click `Save` at the bottom of the page when you’re done.

<hr>


## Blog Post Calls-to-Action

From the Dashboard, visit `Posts` > `Post Options`, and add your content. Click `Save` at the bottom of the page when you’re done.

<hr>


## Theme Support

Provide your theme users with in-theme support information. This adds a page under `Appearance` > `Theme Support` in the Dashboard. Add your content in the `keel-theme-support.php` template under `Includes` > `keel-options.php`.