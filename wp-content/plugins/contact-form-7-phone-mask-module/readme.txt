=== Contact Form 7 Phone Module ===
Contributors: Gabriel Reguly
Donate link: http://omniwp.com.br/donate/
Tags: Contact Form 7, form, forms, contactform7, contact form, phone field, phone, telephone field, telephone, cf7, cforms ii, cforms, Contact Forms 7, Contact Forms, contacted, contacts
Requires at least:3.5 
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds phone module to the Contact Form 7 plugin

== Description ==

### Add Telephone Field to Contact Form 7

This plugin adds telephone field to Contact Form 7 along with masking options.

Please notice that Contact Form 7 must be installed and active.

Masking options are accessible via tag generator panel.

== Installation ==

1. Upload plugin files to your plugins folder, or install using WordPress' built-in Add New Plugin installer
1. Activate the plugin
1. Edit a form in Contact Form 7
1. Use [phone your-phone mask:(999)999-9999] or [phone* your-phone mask:(999)999-9999] to add a telephone field
1. Use [your-phone] at mail to get the content of telephone field
1. Notice that if you add more than one phone field, only the last masking options would be effective

== Screenshots ==

1. screenshot-1.png 

== Frequently Asked Questions == 

= What is the plugin license? =

* This plugin is released under a GPL license.

= How many phone masks is possible to have? =

* Even thought one can set several phone fields with different masks, only the last mask will be used. 

= What is the alternate mask? =

* In Brazil, mobile telephone numbers for São Paulo have 9 digits instead 8 digits as the rest of the country, so this is an option to have more than one mask depending of the area code. 

== Changelog ==
= 2.3.4.1 =
* Added 'wpcf7-form-control' to phone class as reported by http://wordpress.org/support/profile/bdeleasa
= 2.3.4 =
* Fixed fatal error: "Fatal error: Call to undefined function wpcf7_add_tag_generator()" 
= 2.0.1 =
* Fixed issue where [phone*] made all subsequent fields be treated as required. (Thanks to insertcoinforjoy for reporting it.)
= 2.0 =
* Added a tag generator panel where users can select their mask. Default mask now is (999)999-9999
= 1.0.4 =
* Fixed missing code for validation, all users that use validation must upgrade. (Thanks to biswajeet for reporting it.)
= 1.0.3.1 =
* Fixed wrong path to js, all users must upgrade. 
= 1.0.3 =
* Improved initialization, thus removing need of test and error messages.
= 1.0.2 =
* Fixed displaying of error message and behaviour after error if Contact Form 7 is not present and active.
= 1.0.1 =
* Added a test to check if Contact Form 7 plugin is active.
= 1.0 =
* Initial plugin release.

== Upgrade Notice ==

= 2.3.4.1 =
* Fixed issue with validation. Thanks to bdeleasa. Upgrade is strongly recommended.
= 2.3.4 =
* Fixed fatal error. All users must upgrade. 
= 2.0.1 =
* Fixed issue with validation. Upgrade is strongly recommended.
= 2.0 =
* Added new feature, tag generator. Upgrade is recommended.
= 1.0.4 =
* All users that use validation must upgrade. 
= 1.0.3.1 =
* All users must upgrade. 
= 1.0.3 =
* All users must to upgrade.
= 1.0.2 =
* Users of version 1.0.1 are advised to upgrade. Users of version 1.0, see below.
= 1.0.1 =
* If the plugin is working for you, then there is no need to upgrade.
= 1.0 = 
* Enjoy it.