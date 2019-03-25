=== WP Disable Search ===
Contributors: webscripts
Tags: search, disable, WordPress-disable-search
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.6
Tested up to: 4.9
Stable tag: 1.0.0

Disable the WordPress Default search from front-end.


== Description ==

**WP Disable Search** Nothing required for this plugin, you just need to install and activate this plugin and check WordPress Default search is disabled.

Prevent WordPress from allowing and handling any search requests for the site. Specifically, this plugin:

* Prevents the search form from appearing if the theme uses the standard `get_search_form()` function to display the search form.
* Prevents the search form from appearing if the theme uses a searchform.php template
* Prevents the search item from appearing in the admin tool bar when shown on the front-end.
* Disables the search widget.
  * Removes the Search widget from the list of available widgets
  * Deactivates any search widgets currently in use in any sidebars 
* With or without the search form, the plugin prevents any direct or manual requests by visitors, via either GET or POST requests, from actually returning any search results.
* Submitted attempts at a search will be given a 404 File Not Found response, rendered by your site's 404.php template, if present.

The plugin only affects search on the front-end of the site. It does not disable searching in the admin section of the site.

= Download Plugin =

If you want to download any plugin from your wordpress admin panel's Plugins page, then use our other plugin - [Download Plugin](https://wordpress.org/plugins/wp-disable-search)

== Installation ==

1. Activate the plugin through the 'Plugins' menu in WordPress.
2. Extract the zipped file and upload the folder `wp-disable-search` to `/wp-content/plugins/` directory.

== Changelog ==

= 1.0 =
* Initial release.

== Frequently Asked Questions ==

You can submit it in support@webscripts.tech
