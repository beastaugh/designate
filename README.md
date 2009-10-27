Designate
=========

[Designate][1] is a [WordPress][2] plugin by [Benedict Eastaugh][3] that allows
users to designate stylesheets to customise the appearance of their posts and
pages.


Using Designate to style your posts
-----------------------------------

There are two ways to use Designate: write stylesheets with names that
correspond to the posts they're associated with, or choose a particular name by
adding a custom field to your post or page.


### Where do they go?

Post stylesheets should be placed in the `post-styles` subdirectory of your
`WP_CONTENT_DIR` directory. Unless you have specified an alternative location
for your WordPress content directory, this will be
`wordpress/wp-content/post-styles`. All custom stylesheets must end in the
`.css` file extension.


### Post slugs, post `ID`s

By default Designate uses the permalink slug of a post to generate the name of
its custom stylesheet. For example, if a post has a permalink slug of
`godels-incompleteness-theorems`, the generated path will be

    wordpress/wp-content/post-styles/godels-incompleteness-theorems.css

If you have several posts with the same permalink slug, you'll want to use post
`ID`s instead of permalink slugs to ensure that each post gets a unique
stylesheet name. To enable this option, change the `DESIGNATE_USE_POST_SLUGS`
constant in the plugin file from `true` to `false`.

This will give you stylesheets with names like the following (if e.g. the post
`ID` is 27)

    wordpress/wp-content/post-styles/post-style-27.css


### Overriding stylesheet names with custom fields

You can override either of these options at any time on an individual post or
page by adding a custom field to that post or page. The field should have a
name of `stylesheet`, and a value of the filename you wish to use. For example,
if you wanted to use a stylesheet called `blue.css`, you'd put `blue.css` as
the value of the custom field. Just `blue` would be fine too--the plugin will
sort out the file extension for you.


  [1]: http://github.com/ionfish/designate
  [2]: http://wordpress.org/
  [3]: http://extralogical.net/
