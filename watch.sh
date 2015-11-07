#!/bin/sh

# Change `style.css` or `style.min.css` to whatever you would like your compiled
# stylesheet to be called. Do not rename `style.scss` or alter references to it.

# -- style option : expanded (human) or compressed (machine)

sass --watch css/style.scss:style.min.css --style compressed

exit 0
