=== ManageWP Worker ===
Contributors: managewp,freediver
Donate link: https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=520781390
Tags: administration, admin, amazon, analytics, api, automate, automatic, backup, comments, clone, dashboard, database, debug, dropbox, duplicate, events, google analytics, google drive, google, integration, login, manage, managewp, migrate, multiple, multisite, mysql, page, performance, plugin, post, remote, s3, security, seo, spam, speed, stats
Requires at least: 3.1
Tested up to: 4.5.3
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/quick-guide-gplv3.html

ManageWP is the ultimate WordPress productivity tool, allowing you to efficiently manage your websites.

== Description ==

[ManageWP](https://managewp.com/ "Manage Multiple WordPress Websites") is a revolutionary service designed to automate most of your daily tasks when managing multiple WordPress websites, allowing you to use your time on more important matters.

= Everything in One Place =
Just the hassle of logging into each of your websites is enough to ruin your day. With ManageWP the data from all of your sites is compiled and shown on a single easy to use dashboard, allowing you to check up on your websites in a single glance.

= One-click Management =
With all the data on a single dashboard, all it takes is one click to perform plugin and theme updates on multiple websites. Got comments? Everything is on one single list. Or maybe you want to clean spam comments, table overhead or post revisions from all of your websites? It takes a single click.

= Backup & Restore =
Never leave home without a backup. With the scheduled backup tasks to remote destinations such as Amazon S3, Dropbox and Google Drive you will always have an up-to-date backup which you can use to restore your website if something happened to it (yeah, we know it was YOU who messed up the CSS!)

= Quick and Easy Migration =
Want to know how easy is to migrate a website with ManageWP? Pick a source website, pick a destination website, click Go. Yeah, it's that easy.

= Uptime Monitoring =
Be the first to know when your website is down with both email and SMS notifications, and get your website back online before anyone else notices.

= SEO & Keyword Ranking =
Be on top of your website rankings and figure out which keywords work best for you.

= Client Reports =
Keep track of what you're doing for your clients and dazzle them with a summary of your hard work.

= Is This All? =
No way! We've got a bunch of other awesome features, both free and premium, you can check out on our [ManageWP Features & Pricing Page](https://managewp.com/plans-and-pricing "ManageWP Plans & Pricing")

Check out the [ManageWP promo video](https://www.youtube.com/watch?v=C5nBQJQIfH4).

https://www.youtube.com/watch?v=C5nBQJQIfH4

ManageWP is also the creator of [ManageWP.org](https://managewp.org/ "WordPress news site"), community project capturing the pulse of the WordPress community.

== Changelog ==

= 4.2.1 =

- Improvement: Multisite support has been heavily improved and implemented in Orion.

= 4.2.0 =

- Improvement: Now the sync process is faster and more reliable.
- Improvement: Updating plugins/themes has also been enhanced.
- Improvement: The plugin is now able to self recover deleted files without failing any requests before that.
- Improvement: The incremental update feature has been improved.
- Fix: Better PHP7 support.
- Fix: The "nonce already used" error message is fixed in some cases where it was due to a plugin conflict.

= 4.1.33 =

- Improvement: Website wp-admin login is now faster,
- Fix: Certain cases where logging into an HTTP website with an HTTPS wp-admin did not log you in properly.
- Fix: Redeclare error that caused a plugin update to report a false negative.

= 4.1.32 =

- Improvement: With a few improvements we are fully compatible with Pantheon.
- Fix: Previous problems with the false-positive theme and plugin updates have been resolved. These updates will now be performed fully.
- Fix: You will no longer receive an unhandled exception error message regarding the unlink of a directory in the Worker plugin.

= 4.1.31 =

- Fix: Comments with non-UTF-8 characters no longer have issues with sync.

= 4.1.30 =

- Improvement: Hardened the ManageWP Worker recovery mode, which allows it to automatically resync to your ManageWP dashboard after a crash. That's one small step for mankind, one giant leap for Skynet.
- Improvement: Incorrect syntax used to define plugin and content directories no longer prevents ManageWP Orion from adding these directories to the backup archive.
- Fix: Updates not showing up on websites with WPMU DEV plugins. Well, technically it's a workaround and not a fix, since the previous fix didn't fix things, but nobody reads these changelogs anyway. Oh you do? Sorry about that, then. /highfive
- Fix: ManageWP Worker plugin losing the white label setting in certain specific scenarios.

= 4.1.29 =

- Improvement: Post revision cleanup is now faster & furiouser (is that even a word?)
- Improvement: Reduced the number of queries for non-ManageWP requests (e.g. frontpage load) by roughly 80%
- Fix: Compatibility issue with WPMU DEV plugins that prevented updates from showing up on the ManageWP dashboard
- Fix: Several connectivity issues caused by non-UTF-8 characters
- Fix: Admin login bug

= 4.1.28 =

- Fix: Compatibility issue with the wpShopGermany plugin. Ausgezeichnet!

= 4.1.27 =

- Improvement: Due to popular demand, a number of improvements have been made to the backup script, making it more stable.
- Fix: Plugin/theme updates double-crossing you with a false positive, even though the updates have not been performed.
- Fix: Database optimization not doing what it is told.
- Added: A sense of humor to an otherwise boring changelog.

= 4.1.26 =

- Fix: Bug fixes and performance improvements

= 4.1.25 =

- New: Added functionality for plugin/theme management
- Improvement: Improved Worker performance
- Fix: Improved the Orion incremental backup compatibility
- Fix: Improved the one-click login functionality to work with some special cases
- Fix: Improved the plugin/theme update functionality

= 4.1.24 =

- Fix: Incremental backup table dump improvement
- Fix: Incremental backup file listing improvements
- Fix: Better recovery system for the Worker
- Fix: Improved the incremental updating system of the Worker

= 4.1.23 =

- Fix: Improved compatibility with other plugins

= 4.1.22 =

- Fix: Some minor fixes.

= 4.1.21 =

- Fix: Improve compatibility with other plugins

= 4.1.20 =

- Fix: Improved one-click login

= 4.1.19 =

- Fix: Some minor fixes and improvements
- Fix: Improve compatibility with other plugins

= 4.1.18 =

- Fix: Improved the ManageWP incremental backup system

= 4.1.17 =

- Fix: Updated the ignore list for backups

= 4.1.16 =

- Fix: Some minor fixes and improvements.

= 4.1.15 =

- Fix: Fix an issue where the plugin would not work properly if the OpenSSL extension was corrupted

= 4.1.14 =

- New: Expired transient cleaner
- Fix: Improve compatibility with other plugins.
- Fix: Improve plugin installation

= 4.1.13 =

- Add translation domain for WordPress plugin repository.

= 4.1.12 =

- Fix: Improve support for non UTF8 encoded file names for [incremental backups](https://managewp.com/managewp-orion-developer-diary-3-bulletproof-backup-solution)
- Fix: Fix an issue where valid keys were rejected on some specific configurations.

= 4.1.11 =

- Fix: Fix issue where the plugin did not return error codes when the remote call is not authenticated, which resulted in techie-talk error messages.

= 4.1.10 =

- Fix: Improve available update detection when working with plugins that hook onto WordPress update API.

= 4.1.9 =

- Fix: Improve available update detection.
- Fix: Improve the incremental ManageWP Worker plugin updating system.

= 4.1.8 =

- Fix: Potential security issue patched.
- Fix: Optimize spam comment cleanup time.
- Fix: Numerous improvements for [incremental backup system](https://managewp.com/managewp-orion-developer-diary-3-bulletproof-backup-solution).
- Fix: Improve compatibility with other plugins.
- Fix: Improve available update detection.

= 4.1.7 =

- Fix: Optimize memory usage with incremental backups.
- Fix: Improve compatibility on sites with open_basedir restriction.
- Fix: Numerous other fixes and improvements.

= 4.1.6 =

- Fix: Improve [incremental database backup](https://managewp.com/managewp-orion-developer-diary-3-bulletproof-backup-solution) reliability.
- Fix: Improve automatic ManageWP Worker plugin recovery.

= 4.1.5 =

- New: Add automatic recovery process when the ManageWP Worker plugin update gets interrupted on some server setups.
- Fix: Fix maintenance mode on some WordPress setups.
- Fix: Fix issue when a wrong backup file was being deleted.
- Fix: Fix issues when sites got disconnected from [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement").

= 4.1.4 =

- Fix: Improve [incremental backup](https://managewp.com/managewp-orion-developer-diary-3-bulletproof-backup-solution) success rate.

= 4.1.3 =

- Fix: Fix database backup functionality on servers without mysqldump.
- Fix: Fix incremental backups on PHP 5.2.

= 4.1.2 =

- The following changelog is for [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement") only.
- Fix: Fix PHP database dumper fallback in incremental backups.
- Fix: Fix restore functionality on some server setups.

= 4.1.1 =

- Fix: Fix incremental backup issue when dealing with deep symlinks.
- Fix: Slightly increase memory limit if needed, after successfully adding a website.

= 4.1.0 =

- New: Incremental backup capability for [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement").

= 4.0.15 =

- Fix: Improve compatibility with some plugin updates in [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement").

= 4.0.14 =

- Fix: Show custom message when the plugin can not destroy active [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement") sessions when logging out.

= 4.0.13 =

- New: Destroy all admin sessions started from [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement") when a user logs out from the dashboard.
- Fix: Improve update detection.

= 4.0.12 =

- Fix: Improve white-labeling.
- Fix: Better compatibility with development builds of WordPress.
- Fix: Improve one-click restore functionality on non-English installations of WordPress.

= 4.0.11 =

- Fix: Better detect available updates
- Fix: Improve compatibility with other plugins

= 4.0.10 =

- Fix: Fix update functionality on some installations that use FTP credentials
- Fix: Fix Google Drive uploading on installations without cURL PHP extension

= 4.0.9 =

- New: Make the ManageWP Worker plugin upgradable through the dashboard widget
- Fix: Improve auto-connect functionality with [ManageWP Orion](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement")

= 4.0.8 =

- Fix: Fix single-click restore functionality

= 4.0.7 =

- Fix: Fix issues related to cloning and backup restoration
- Fix: Improve precision of the hit counter
- Fix: Improve compatibility with other plugins
- Fix: Numerous small improvements and fixes

= 4.0.5 =

- Fix: Misc bug fixes and performance improvements

= 4.0.1 =

- New: New features for the [ManageWP Orion release](http://managewp.com/managewp-orion-official-announcement "ManageWP Orion Official Announcement")
- Fix: Misc bug fixes and performance improvements

= 3.9.30 =

- New: Fully compatible with WordPress 4.0
- New: Adding websites to your ManageWP Dashboard is now easier than ever
- Fix: Backup tool improvements (especially for websites located on Rackspace)
- Fix: Various Clone/Migration tool improvements and fixes
- Fix: SEO PDF report visual enhancement
- Fix: Various interface improvements and fixes

= 3.9.29 =

- New: Worker plugin is now 36% faster and uses 83% less memory
- New: Backup no longer relies on WordPress cron
- New: New Server-Client communication fixing some of the previous issues
- New: Notes and Recent backups widgets
- New: Refreshed app interface :)

= 3.9.28 =
- New: Control WordPress Automatic Background Updates for plugins and themes!
- Fix: Tweaks to SFTP support for backups and clone
- Fix: Enhancements to Backup and Branding features


= 3.9.27 =
- New: SFTP support for backups and clone!
- Fix: Database dump for backup tasks with defined socket path or port number in wp-config.php
- Fix: Optimize WordPress tables before backup
- Fix: Compatibility with Better WP Security
- Fix: Not adding jQuery on front page while using branding option

= 3.9.26 =
- New: Improved branding feature
- New: Disable Plugin and Theme changes for your clients
- New: Support Page for non-Admin Users
- New: Manage biographical info of user
- Fix: Restore backup action keeps all backup tasks and backups
- Fix: Add/delete post action uses WordPress hook
- Fix: Delete user action was not functioning properly

= 3.9.25 =
- New: Improved Worker branding feature
- Fix: Traffic alerts feature was not functioning properly
- Fix: Backup information was sometimes incorrectly displayed
- Fix: DB Table overhead was not shown on the dashboard

= 3.9.24 =
- New: Better support for large database dumps
- Fix: PHP notice for WordPress 3.5
- Fix: Support for automatic backup reports
- Fix: Incorrect backup result message for S3 large files

= 3.9.23 =
- New: SEO reports can be branded and viewed by sharing an URL
- New: Set custom database prefix for new clone destination
- New: Automatic change all URL paths for new clone destination
- New: Success and fail email notifications for scheduled backup tasks
- Fix: Improved scheduled backups for limited server resources
- Fix: Improved backup to Dropbox (now supporting larger backup files)
- Fix: Handling of external images with bulk posting
- Fix: Display plugin versions on manage plugins
- Fix: Deprecated get_themes function
- Fix: Special characters support for notes

= 3.9.22 =
- New: Backup support for Google Drive
- New: Keyword tracking limit increased from 5 to 20 times the website limit (ie. with 25 website account you can now track the ranking for 500 keywords!)
- New: Support for Google Analytics API 3.0
- New: Website preview screenshot
- New: Ability to assign a newly added website to existing Backup tasks (under "advanced" in add website dialogue)
- Fix: Clone tool now supports special characters and localized WP installs
- Fix: Backup history preserved on website re-add

= 3.9.21 =
* New: Continuous updates! Read more at http://managewp.com/continuous-updates

= 3.9.20 =
* New: ManageWP iOS app compatibility
* New: Perform security and performance test as you add websites
* New: New comment handling screen

= 3.9.19 =
* New: Improved mechanism for refreshing website stats. You should have fresh information every 4 hours without refreshing now
* Fix: Categories now showing properly in Manage posts
* Fix: Website stats now ignore uptime monitoring pings

= 3.9.18 =
* New: Pagelines themes added to the list of partners
* New: Comprehensive website performance scan tool
* New: You can now bulk edit posts/pages (updating that contact info will become piece of cake)
* New: Upload and save your premium plugins/themes in your personal repository for quick installation
* New: Run code snippets now get a repository. Save your snippets and share them with other users
* New: SEO reports can now be sorted. Export as CSV and PDF reports.
* New: Manage Blogroll links
* New: Clean post revisions now has an option to save last x revisions when cleaning
* New: Bulk delete na posts/pages/links
* Fix: Amazon S3 backups failing

= 3.9.17 =
* New: Add your favorite sites to the Favorites  bar (just drag&drop them to the small heart on the top)
* New: Entirely new website menu loaded with features and tools
* New: Manage Posts and Pages across all sites in a more efficient way
* New: Support for all WPMU.org premium plugin updates
* New: Complete Dropbox integration through Oauth which allows us to restore/delete Dropbox backups directly
* New: We have the user guide as PDF now. [Download] (http://managewp.com/files/ManageWP_User_Guide.zip)


= 3.9.16 =
* New: Option to "Run now" backup tasks
* New: Traffic alerts functionality
* New: Support for Genesis premium theme updates
* Fix: In some circutmsances .htaccess was not correctly zipped in the backup archive

= 3.9.15 =
* New: Full range of SEO Statistics now trackable for your websites (Google Page Rank and Page Speed, Backlinks and 20+ more)
* New: Google keyword rank tracking with history
* New: Uptime monitoring (5 min interval with email/SMS notification)
* New: Insights into server PHP error logs right in your dashboard
* New: Remote maintenance mode for your websites
* Fix: A bug when a completed backup was reported as failed

= 3.9.14 =
* Two factor authentication
* Run code tool
* Quick access to security check and broken link tools
* More accurate pageview statistics
* You can now opt to completely hide the Worker plugin from the list of plugins (part of Worker branding features)
* We improved the backups for folks running Windows servers
* Amazon S3 directory name now "ManageWP" by default
* Read more on ManageWP.com http://managewp.com/update-two-factor-authentication-run-code-tool-sucuri-security-check-more-accurate-pageview-statistics

= 3.9.13 =
* Added bucket location for Amazon S3 backups
* Better backup feature for larger sites
* Added Disable compression to further help with larger sites
* Backing up wp-admin, wp-includes and wp-content by default now, other folders can be included manually

= 3.9.12 =
* Minor bug fixes
* Backup, clone, favorites functionality improved

= 3.9.10 =
* Supporting updates for more premium plugins/themes
* Backup notifications (users can now get notices when the backup succeeds or fails)
* Support for WordPress 3.3
* Worker Branding (useful for web agencies, add your own Name/Description)
* Manage Groups screen
* Specify wp-admin path if your site uses a custom one
* Amazon S3 backups support for mixed case bucket names
* Bulk Add Links has additional options
* Better Multisite support
* Option to set the number of items for Google Analytics
* ManageWP backup folder changed to wp-content/managewp/backups

= 3.9.9 =
* New widget on the dashboard - Backup status
* New screen for managing plugins and themes (activate, deactivate, delete, add to favorites, install) across all sites
* New screen for managing users (change role or password, delete user) across all sites
* Option to overwrite old plugins and themes during bulk installation
* Your website admin now loads faster in ManageWP
* Added API for premium theme and plugin updates

= 3.9.8 =
* Conversion goals integration
* Update notifications
* Enhanced security for your account
* Better backups
* Better update interface
* [Full changelog](http://managewp.com/update-goals-and-adsense-analytics-integration-update-notifications-login-by-ip-better-backups "Full changelog")

= 3.9.7 =
* Fixed problem with cron schedules

= 3.9.6 =
* Improved dashboard performance
* Fixed bug with W3TC, we hope it is fully comptabile now
* Improved backup feature
* Various other fixes and improvements

= 3.9.5 =
* Now supporting scheduled backups to Amazon S3 and Dropbox
* Revamped cloning procedure
* You can now have sites in different colors
* W3 Total Cache comptability improved

= 3.9.3 =
* Included support for WordPress 3.2 partial updates

= 3.9.2 =
* Fixed problem with full backups
* Fixed problem with wordpress dev version upgrades

= 3.9.1 =
* Support for sub-users (limited access users)
* Bulk add user
* 'Select all' feature for bulk posting
* Featured image support for bulk posting
* Reload button on the dashboard (on the top of the Right now widget) will now refresh information about available updates
* Fixed a problem with the import tool
* Fixed a problem when remote dashboard would not work for some servers

= 3.9.0 =
* New feature: Up to 50% faster dashboard loading
* New feature: You can now ignore WordPress/plugin/theme updates
* New feature: Setting 'Show favicon' for websites in the dashboad
* New feature: Full backups now include WordPress and other folders in the root of the site
* Fixed: Bug with W3 TotalCache object cache causing weird behaviour in the dashboard
* Fixed: All groups now show when adding a site

= 3.8.8 =
* New feature: Bulk add links to blogroll
* New feature: Manual backups to email address
* New feature: Backup requirements check (under Manage Backups)
* New feature: Popup menu for groups allowing to show dashboard for that group only
* New feature: Favorite list for plugins and themes for later quick installation to multiple blogs
* New feature: Invite friends
* Fixed: problem with backups and write permissions when upload dir was wrongly set
* Fixed: problem adding sites where WordPress is installed in a folder
* Fixed: 408 error message problem when adding site
* Fixed: site time out problems when adding site
* Fixed: problems with some WP plugins (WP Sentinel)
* Fixed: problems with upgrade notifications

= 3.8.7 =
* Fixed 408 error when adding sites
* Added support for IDN domains
* Fixed bug with WordPress updates
* Added comment moderation to the dashboard
* Added quick links for sites (menu appears on hover)


= 3.8.6 =
* Added seach websites feature
* Enhanced dashboard actions (spam comments, post revisions, table overhead)
* Added developer [API] (http://managewp.com/api "ManageWP API")
* Improved Migrate/Clone site feature

= 3.8.4 =
* Fixed remote dashboard problems for sites with redirects
* Fixed IE7 issues in the dashboard

= 3.8.3 =
* Fixed problem with capabilities

= 3.8.2 =
* New interface
* SSL security protocol
* No passwords required
* Improved clone/backup

= 3.6.3 =
* Initial public release

== Installation ==

1. Upload the plugin folder to your `/wp-content/plugins/` folder
2. Go to the Plugins page in your website's WP-admin area and activate ManageWP Worker
3. Visit [ManageWP.com](https://managewp.com/ "ManageWP")
4. Sign up and add your website

Alternatively

1. Visit [ManageWP.com](https://managewp.com/ "Manage Multiple WordPress Sites") and sign up
2. ManageWP will notify you the Worker plugin is not installed and offer a link for quick installation

For detailed instructions, you can read our [User Guide](http://managewp.com/user-guide/how-to-use-managewp/getting-started/adding-your-website-to-managewp/ "Add your website to ManageWP")

== Screenshots ==

1. ManageWP dashboard with available upgrades, site statistics and management functions.
2. Easily take a closer look to each of your websites.
3. No need for additional maintenance plugins.
4. Backup your website in couple of clicks. Choose one of the external locations or keep your backups on your server.
5. Choose between Database and Full backups of your website. Select how many backups you want to keep and exclude any folder you don't need backed up.
6. Clone your website using backup files generated by ManageWP. Feel free to use external locations, as well.
7. Clone over your existing website selected from the list.
8. Or, you can clone to any location using New website as your destination.
9. Manage your websites without your users even knowing you are using ManageWP. Experience our White label feature.

== Upgrade Notice ==

= 3.9.30 =
Worker plugin is now fully compatible with WordPress 4.0, adding websites is now easier and we have made fixes and improvements in Backup and Clone tools


= 3.9.29 =
Worker plugin is 36% faster and uses 83% less memory. Backup tool no longer relies on WordPress cron


= 3.9.28 =
It is now possible to control WordPress automatic background updates for plugins and themes!


= 3.9.27 =
We have added compatibility with Better WP Security. Also, it is now possible to backup and clone to SFTP


== License ==

This file is part of ManageWP Worker.

ManageWP Worker is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

ManageWP Worker is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with ManageWP Worker. If not, see <http://www.gnu.org/licenses/>.


== Frequently Asked Questions ==

= Is ManageWP secure? =

Yes. We invest heavilly in our security and in four years and serving over quarter a million websites we did not have a single security incident. Also we invest in a [white hat security program](https://managewp.com/white-hat-reward) with the purpose of preventing security issues.

= Will ManageWP work with sites spread on different hosting accounts? =

Yes.

= Does ManageWP work with WordPress.com sites? =

No. ManageWP works only with self-hosted WordPress sites.

= Can I try all features for free? =

Absolutely. We've got a no-strings-attached 14-day Trial.

= I have problems adding my site =

Make sure you use the latest version of the Worker plugin on the site you are trying to add. If you still have problems, check our dedicated [FAQ page](http://managewp.com/user-guide/faq/my-sites-fail-to-addload-to-managewp "Add site FAQ") or [contact us](http://managewp.com/contact "ManageWP Contact").

= How does ManageWP compare to backup plugins like BackupBuddy, Backwpup, UpdraftPlus, WP-DB-Backup ? =

There is a limit to what a PHP based backup can do (as are all these plugins) but we believe that our backup system is one of if not the most robust solution on the market.

= How does ManageWP compare with clone plugins like Duplicator, WP Migrate DB, All-in-One WP Migration, XCloner ? =

We are confident that our clone system is the most reliable one on the market featuring highly sophisticated technology allowing for the easiest and most efficient site clone/migration on the market.

= Does ManageWP work with caching plugins like W3 Total Cache or WP Super Cache =

Yes.

= Does ManageWP work with all popular plugins like WordPress SEO by Yoast, WPTouch, Google XML Sitemaps, NextGEN Gallery, Contact Form 7, WooCommerce, iThemes Security, WordPres importer, Wordfence Security and others? =

Yes. In most cases where there are conflicts we document them on our [known issues](https://managewp.com/user-guide/known-issues) page.

= How does ManageWP compare to services like InfiniteWP, MainWP, CMS Commander, IControlWP ? =

We believe that our product is technologically more advanced and more mature. In some cases ManageWP has been the inspiration for these services, and we continue to innovate. For more information please refer to [this comment](http://wpchat.com/t/security-and-centralized-wordpress-management-ie-managewp-jetpack-etc/505/6?u=vprelovac)
