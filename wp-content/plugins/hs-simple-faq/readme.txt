=== HS Responsive category FAQ ===
Contributors: heliossolutions
Tags: best FAQ plugin,free FAQ plugin, wordpress FAQ, frequently asked question, category, shortcode ,custom CSS Add, Ask, questions, answers, category faq, wordpress faq , responsive faq,responsive faq plugin, jquery accordian faq , css3 accordian faq
Requires at least: 3.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
Tested up to: 3.9.1
Stable tag: 3.0.4

Simple and responsive faq plugin.

== Description ==

Numerous CMS website require a segment for FAQ’s. HS Responsive Category FAQ Plugin permits you to include, inspect and show FAQ on your website.

HS Responsive Category FAQ Plugin appends a FAQ page in your website with jQuery accordian like effect using CSS3, and does not require jQuery. Thus, loading is faster as compared to similar other plugins. You can also add your own custom CSS from backend to change the front view of the HS Responsive Category FAQ Plugin.

HS Responsive Category FAQ Plugin lets you to reduce the user queries by its elegant-design.  

We are the dedicated group of WordPress authors focused on developing finest WordPress themes and plugins. 
To know more about our work and projects, visit: <http://www.heliossolutions.in>


= Features =

- Add multiple Category.
- Shortcode for Individual Category.
- Accordian Effect using CSS3.
- Responsive Faq.
- Add Your own custom css.


== Installation ==

1. Upload the plugin folder `HS Simple  Faq` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the "Plugins -> Installed 
plugins -> Activate HS Simple Faq" menu in WordPress.
3. Find HS Simple Faq Plugin in -> Admin Menu.
4. For settings "FAQ's" -> "Settings".

= How to use? =
To display all FAQs on a page. Create a page and add Following Shortcode to your page.

`[hs-faq limit="-1"]`

Where limit specifies the number of posts to display. -1 will display all the posts.
So if you want to display only 5 FAQs. Then use following shortcode.

`[hs-faq limit="5"]`

To display  FAQs of a specific category on a page. Add Following Shortcode to your page.

`[hs-faq-cat id="14"]`

Where 14 is the category ID.

You can also use the shortcode outside the post editor on a custom template.

`echo do_shortcode('[hs-faq limit="-1"]');`


== Frequently Asked Questions ==
= How to use? =
To display all FAQs on a page. Create a page and add Following Shortcode to your page.

`[hs-faq limit="-1"]`

Where limit specifies the number of posts to display. -1 will display all the posts.
So if you want to display only 5 FAQs. Then use following shortcode.

`[hs-faq limit="5"]`

To display  FAQs of a specific category on a page. Add Following Shortcode to your page.

`[hs-faq-cat id="14"]`

Where 14 is the category ID.

You can also use the shortcode outside the post editor on a custom template.

`echo do_shortcode('[hs-faq limit="-1"]');`




== Screenshots ==

1. Add new FAQ
2. Add new FAQ Category
3. Admin settings Page
4. Front side view

== Changelog ==

= 3.0.4 =
* Bug Fix : Changed Conflicting class name with font-awesome icons and other small css changes.

= 3.0.3 =
* Enhancement: Proper Mobile View.
* All Accordions will be colsed initially.
* Bug Fix : Missing Font Family.

= 3.0.2 =
* Enhancement: Wp Query Change
* Updated the wp query for proper display of all FAQs category wise

= 3.0.1 =
* Enhancement: New Design
* Now you can display FAQ without assigning category.

= 2.0.1 =
* Bug Fix: Changed confliting css/html with wordpress twentyfourteen theme
* Enhancement: Updated the taxonomy query for proper display of all FAQs
* Added support wordpress 3.8 and twentyforteen theme

= 1.0 =
* Initial launch of the plugin

== Upgrade Notice ==

= 3.0.4 =
* Bug fix for conflicting class name with font-awesome icons

= 3.0.3 =
* Proper mobile view and bug fix for font missing.

= 3.0.2 =
* Fully compatible with wordpress 3.9 and small bug fix.

= 3.0.1 =
* New Design introduce.

= 2.0.1 =
* Fully compatible with wordpress 3.8 and small bug fixes.

= 1.0 =
  This is the first version of the plugin.