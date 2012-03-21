$Id: README.txt,v 1.1.2.2.2.4 2009/10/27 00:21:49 psynaptic Exp $

AUTHOR/MAINTAINERS
------------------

Clean theme was created and is maintained by Richard Burford, aka, psynaptic of
Freestyle Systems:

http://freestylesystems.co.uk/
http://drupalcontrib.org/

DESCRIPTION
-----------

The idea behind this theme was to make a clean, versatile theme that has just
enough styling to be usable right out of the box but rather than trying to be
everything to everyone, it is more of a base theme. The theme has been built to
speed up your workflow and is (probably) the fastest possible route to creating
your own custom theme.

Features:

- Lean, mean base theme
- Fully XHTML 1.0 Strict and CSS 2.1 valid
- Thorough use of CSS inheritance
- 3 column collapsible layout
- Relative font sizes
- Large base font size
- Fancy blog and comment submission dates

IMPORTANT
---------

When working with Clean theme it is important not to hack the "core" files
(just like working with Drupal core itself). In the case of Clean these core
files are all the CSS files in the css/ folder apart from custom.css.

If you wish to benefit from updates to Clean theme (and you should), don't edit
the CSS rules in these files but rather place all CSS for your theme in the
custom.css file. This means you will be able to download the latest version of
Clean and replace these files in your installation.

USAGE
-----

Clean theme's CSS rules have been split into multiple files to facilitate
hot-swapping.

There is an extra/ folder in the theme where you will find additional CSS
files which you can use to easily apply a different base style to the site you
are working on. Clean theme was designed in this way to help developers get
closer to the finishing line before they have to get their hands dirty.

To switch to using one of the other themes just edit the stylesheets[] in the
info file. For example, the lightondark CSS folder has 2 files, color.css and
navigation.css. To use the lightondark theme as a foundation for a new site
simply prefix the existing paths for those 2 files with "extra/lightondark/":

stylesheets[all][] = extra/lightondark/css/color.css
stylesheets[all][] = extra/lightondark/css/navigation.css

Then visit the themes admin page (admin/build/themes) to refresh the info file
cache.

Different themes may contain different files so check which files you need to
edit the paths for and add the prefix.

CONTRIBUTE
----------

More CSS files will be added in the future but contributions are more than
welcome.

The most obvious files for which replacements could be created are:

layout.css      - Controls the layout.

color.css       - Holds most of the color rules except for primary/secondary
                  menus and tabs.

navigation.css  - Controls the style of the primary/secondary menus and the
                  tabs.

typography.css  - Controls the style of the text (sizes, spacing, font
                  family, etc.).
