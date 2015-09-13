=== Easy Chitika ===
Contributors: manojtd
Donate link: http://buy.thulasidas.com/easy-chitika
Tags: chitika, ad, ads, advertising, income
Requires at least: 3.2
Tested up to: 4.3
Stable tag: 2.71
License: GPL2 or later

Easy Chitika showcases Chitika ads on your blog, with full customization.

== Description ==

*Easy Chitika* provides a streamlined interface to deploy Chitika ads on your blog. You can customize the colors and sizes of the ad blocks and activate them right from the plugin interface. If you don't have an Chitika account, [sign up here](http://chitika.com/publishers.php?refid=manojt "Create your Chitika account").

*Easy Chitika* is part of the *easy series* of advertising plugins comprising of Google AdSense, Easy Ads and Easy Chitika. If you plan to use more than one ad provider, you will find it more convenient to install [Easy Ads](http://buy.ads-ez.com/easy-ads "Manage multiple ad providers on your blog"), a premium plugin that combines all of them in a neatly tabbed, streamlined interface.

Note that the *easy series* of advertising plugins require PHPv5.3+. If they don't work on your blog host, please consider the amazing [Easy AdSense Pro](http://buy.ads-ez.com/easy-adsense "The most popular plugin to insert AdSense on your blog") for all your advertising needs. It can insert non-AdSense blocks as well.

= Features =
1. Tabbed and intuitive interface.
2. Rich display and alignment options.
3. Widgets for your sidebar.
4. Robust codebase and option/object models.
5. Control over the positioning and display of ad blocks in each post or page.
6. Customized Chitika interface with color pickers.

= Pro Version =

*Easy Chitika* is the freely distributed version of a premium plugin. The [Pro version](http://buy.thulasidas.com/easy-chitika "Pro version of the Easy Chitika plugin for $4.75") gives you even more features.

1. A filter to ensure that your ads show only on those pages that seem to comply with Easy Chitika (and other common provider) policies, which can be important since some comments may render your pages inconsistent with those policies.
2. It also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you.
3. Also in the works for the Pro version is a compatibility mode, which solves the issue of the ad insertion messing up your page appearances when using some  themes.

The Pro version costs $4.75 and can be [purchased online](http://buy.thulasidas.com/easy-chitika "Pro version of the Easy Chitika plugin for $4.75") with instant download link.

== Upgrade Notice ==

Major changes to fix HTML5 validation errors.

== Screenshots ==

1. *Easy Chitika* "Overview" tab.
2. Admin tab showing ad slot locations
3. How to set the options for Chitika.

== Installation ==

= Searching =

The easiest way to install this plugin is to use the WordPress Admin interface. Go to your admin dashboard, find the "Plugins" menu, and click on "Add New". Search for this plugin and click on "Install Now" and follow the WordPress instructions.

= Uploading =

If you want to download it and manually install, you can again use the WordPress dashboard interface. First download the plugin zip file to your local computer. Then go to your admin dashboard, find the "Plugins" menu, and click on "Add New". After clicking on the "Add New" menu item as above, click on "Upload" (below the title "Install Plugins" near the top). Browse for your downloaded zip file, upload it and activate the plugin.

= FTP =

If you want to manually upload it using your ftp program, unzip the downloaded zip file and,
1. Upload the *Easy Chitika* plugin (the whole folder) to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the Settings -> *Easy Chitika* and enter your user ID and other options.

== Frequently Asked Questions ==

= I get the error "Error locating or loading the defaults! Ensure 'defaults.php' exists, or reinstall the plugin." What to do? =

Please copy *all* the files in the zip archive to your plugin directory. You need all the files in the `easy-ads` directory. One of these files is the missing `defaults.php`.

= I activate the plugin, but nothing happens. I see some red error message stating something about PHP version. What gives? =

This plugin requires PHP version 5.3 or later. If it doesn't find the right version, it posts an error message in the plugins page, and does nothing. You will need to contact the system admin or support folks of your hosting service and request them to install PHP5.x for you. Usually, all it takes is just an email to get it sorted out.

Note that this plugin requires PHPv5.3+. If it does not work on your web host, please consider the amazing [Easy AdSense Pro](http://buy.ads-ez.com/easy-adsense "The most popular plugin to insert AdSense on your blog") for all your advertising needs. It can insert non-AdSense blocks as well.

= How can I control the appearance of the ad blocks using CSS? =

All `<div>`s that *Easy Chitika* creates have the class attribute `easy-ads`. Furthermore, they have class attributes like `easy-ads-chitika-top`, `easy-ads-chitika-bottom` etc., You can set the style for these classes in your theme `style.css` to control their appearance.


= Why does my code disappear when I switch to a new theme? =

*Easy Chitika* stores the ad code and options in your database indexed by the theme name, so that if you set up the options for a particular theme, they persist even when you switch to another theme. If you ever switch back to an old theme, all your options will be reused without your worrying about it.

But this unfortunately means that you do have to set the code *once* whenever you switch to a new theme.

= Can I control how the ad blocks are formatted in each page? =

Yes! In *Easy Chitika*, you have more options [through **custom fields**] to control ad blocks in individual posts/pages. Add custom fields with keys like **easy-chitika-top, easy-chitika-middle, easy-chitika-bottom** and with values like **left, right, center** or **no** to have control how the ad blocks show up in each post or page. The value "**no**" suppresses all the ad blocks in the post or page for that provider.

= How do I report a bug or ask a question? =

Please report any problems, and share your thoughts and comments [at the plugin forum at WordPress](http://wordpress.org/tags/easy-chitika-lite "Post comments/suggestions/bugs on the WordPress.org forum. [Requires login/registration]") Or [contact me](http://support.thulasidas.com/ "Contact Manoj").

**If you have a question or comment about the Pro version, please do not use the forum hosted at WordPress.org, but [contact the plugin author](http://support.thulasidas.com/ "Contact Manoj") using our support portal.**

== Change Log ==

* V2.71: Documentation changes. [Sep 13, 2015]
* V2.70: Major changes to fix HTML5 validation errors. [Sep 10, 2015]
* V2.60: Compatibility with WordPress 4.3. [Aug 10, 2015]
* V2.50: Compatibility with WordPress 4.2. [April 25, 2015]
* V2.40: Refactoring and documentation changes. [Apr 2, 2015]
* V2.20: Automatic options migration upon plugin activation. [Sep 26, 2014]
* V2.11: Minor change to the admin interface. [Sep 9, 2011]
* V2.10: Compatibility with WP4.0. [Sep 7, 2014]
* V2.01: Updating translations, minor bug fixes. [Jul 17, 2014]
* V2.00: Initial public release. Internationalization and compatibility with WP3.9. [May 7, 2014]
* V1.22: Changes to the informational messages on the admin interface. [Oct 23, 2011]
* V1.21: Simplifying `defaults.php`, coding improvements. [Oct 22, 2011]
* V1.20: Bug fixes, coding improvements. [Sep 9, 2011]
* V1.00: Initial release. [Nov 15, 2010]
