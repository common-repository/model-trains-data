=== Model Trains Data ===
Contributors: madsphi
Tags: model train, model railway
Requires at least: 4.7
Tested up to: 6.0
Stable tag: 1.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Access to the Model Train Prices API. Display model train prices using Wordpress shortcodes.

== Description ==

This plugin connects to the Model Prices API, so you can display model train prices using Wordpress shortcodes.

To use the plugin, you need a Model Prices API key. [Get that here](https://www.modelprices.com/api/).

When you got your API key, you can use the plugin like this:

`[model_trains_data_min_price brand='marklin' model='30000' currency='EUR' api-key='API-KEY']`

If you want to style the link with a CSS class, you can add the parameter 'css-class'. Like this:

`[model_trains_data_min_price brand='marklin' model='30000' currency='EUR' api-key='API-KEY' css-class='fh-underline-link']`

== Changelog ==

= 1.0 =
First public version.