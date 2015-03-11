=== LinkPreview ===
Contributors: filipstepanov
Donate link: 
Tags: url,link,preview,linkpreview,tooltip
Requires at least: 3.3
Tested up to: 4.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Preview basic SEO link info before clicking it


== Description ==

This is simple and lightweight plugin for WP. It works similar to Facebook's url preview and it's very easy to use. You can choose tooltips or shortcode feature depending on your needs.

**Tooltip**

Tooltip feature hooks on content load and scans for possible link matches. It's adding temporary attributes to those links, so when you hover them, plugin connects to free web-service at http://www.linkpreview.net and retrieve basic link info. it's using plugin's JavaScript and WordPress Ajax to deliver content on demand.

**Shortcode**

When used through shortcodes it works the same way, just no hover needed but static content like Facebook's URL preview will be shown. Shortcode:

[link_preview]http://...[/link_preview]

All the link info retrieved can be stored in cache to avoid possible performance issues on high traffic websites. Aside other plugin's settings in dashboard, there is Cache time setting where you can specify how long to keep URL's information for future use. By using cache, you avoid intense connecting to linkpreview.net API.


== Installation ==

1. Upload linkpreview plugin to you WordPress blog (in the `/wp-content/plugins/` directory)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use it as a tooltip feature, or through shortcodes
4. Rate it if you like it :)


== Frequently asked questions ==
**Is this plugin using any external javascript?**

- You can choose between included WP jquery-ui Tooltip and Tooltipster JS that comes with a plugin


== Screenshots ==
1. Shortcode screenshot
2. Tooltips screenshot

== Changelog ==

= 1.0.0 =
* This is first release


== Upgrade notice ==
= 1.0.0 =
* none


