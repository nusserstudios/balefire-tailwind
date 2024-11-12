## DEV PREREQUISITES

1. Install MAMP Pro (https://www.mamp.info/en/mamp-pro/) or XAMP on Windows (https://www.apachefriends.org/download.html)
	- This is for offline, local development
	- make sure the server is setup to run PHP 7
2. I recommend Sublime Text 3 as a code editor
3. I recommend FileZilla as an FTP client

## LOCAL DEV SETUP

1. Download WordPress into a project folder
2. Add Base theme to theme folder, remove stock themes
3. In MAMP/XAMPP, create a new host for client.test and point it to the client-www folder
4. In phpMyAdmin, create a database, user, and connect user to the database
	- db = utf8_unicode_ci
	- user = grant all privileges
	- Go ahead and create the database and user on the staging/live server with matching credentials
5. Rename WordPress' "wp-config-sample.php" to "wp-config.php"
6. Fill in database, user, password, and salts
7. Change the default "wp_" database prefix to something unique
8. Open project in a browser (http://clientdomain.test) and install WordPress
9. Activate theme and core plugins

## THEME NOTES

### CORE PLUGINS
1. Advanced Custom Fields
2. Classic Editor
3. Gravity Forms
4. Social Warfare
5. Wordfence (at launch)
6. Yoast (or RankMath)
7. Migrate DB 
8. Hummingbird (pre-launch)
9. Schema pro
10. Smush Pro
11. WPBakery (optional)


## CSS/JS
1. Change info at the top of style.css as needed
2. Core CSS includes Reset, slider, and mobile menu
3. Core JS includes slider, mobile menu, and functions

##FUCTIONS.PHP
1. Core functions are located in the "functions" folder
2. Includes code cleaning and removing unnecessary WordPress features
3. Includes commented out tools such as dequeueing, deregistering, and script handle finder 
4. custom-post-type.php for adding custom post types. (optional)
5. gf-blacklist.php for keeping human spam out of form submissions

## THEME FEATURES

1. Blank theme for custom development
2. Default junk code removed from WordPress
3. Mobile menu pre-installed and minified, ready to use
4. NOT READY YET: Home banner custom post type that uses slider carousel
5. An advanced custom post type if needed (Banners)
6. Hidden form in header.php to catch bot spam
7. Gravity Forms with a custom blacklist to catch human spam
8. Advanced Custom Fields for making custom dev easy
9. DNS prefetching for 3rd party scripts
10. Favicons and mobile icons setup
11. 301 redirect syntax in .htaccess