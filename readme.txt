=== LinkPreview ===
Contributors: filipstepanov
Donate link: 
Tags: wp,link,preview,linkpreview
Requires at least: 3.3
Tested up to: 4.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Preview basic link info before clicking it


== Description ==

**Tooltip**
This plugin hooks on content load and scans for possible link matches. It's adding temporary attributes to those links, so when you hover them, plugin connects to free web-service at http://www.linkpreview.net and retrieve basic link info. it's using plugin's JavaScript and WordPress Ajax to deliver content on demand.

**Shortcode**
When used through shortcodes it works the same way, just no hover needed but static content like Facebook's URL preview will be shown. Shortcode:

[link_preview]http://...[/link_preview}

All the link info retrieved can be stored in cache to avoid to avoid possible performance issues on high traffic sites. Aside other plugin's settings in dashboard, there is also Cache time so you can specify how long to keep URL's information for future use. By using cache, you avoid intense connecting to linkpreview.net API.


== Installation ==

1. Upload linkpreview plugin to you WordPress blog (in the `/wp-content/plugins/` directory)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use it as a tooltip feature, or through shortcodes


== Frequently asked questions ==
**Is this plugin using any external javascript?**
- You can choose between included WP jquery-ui Tooltip and Tooltipster JS that comes with a plugin


== Screenshots ==

1. http://www.filipstepanov.com/wp-content/uploads/2015/03/linkpreview-tooltip.jpg
2. http://www.filipstepanov.com/wp-content/uploads/2015/03/linkpreview-shortcode.jpg


== Changelog ==

= 1.0.0 =
* This is first release


== Upgrade notice ==
= 1.0.0 =
* none


