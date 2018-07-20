# MobileSpecialPages
Extension for mediawiki's MobileFrontend to add special pages like "Recent changes" or "NewFiles" to the mobile discovery menu.

Beispiel zur Verwendung in der `LocalSettings.php`:
```php
## custom extension to add special-pages to the mobile menu
## see https://github.com/mojoaxel/MobileSpecialPages
wfLoadExtension( 'MobileSpecialPages' );
$wgMobileSpecialPages['discovery'] = array(
	// Add "In der Nähe" entry using the css-classes from the original nearby entry.
	'nearme' => array(
		'In der Nähe',
		'/wiki/index.php/FürthWiki:In_der_Nähe',
		'mw-ui-icon mw-ui-icon-before mw-ui-icon-nearby nearme'
	),
	// Add link to all maps
	'maps' => array(
		'Karten',
		'/wiki/index.php/FürthWiki:Maps',
		'mw-ui-icon mw-ui-icon-before mw-ui-icon-maps maps'
	),
	// Enable the custom entry "Spezial:Letzte_Änderungen"
	'RECENTCHANGES' => array(),
	// Enable the custom entry "Spezial:Dateien"
	'IMAGELIST' => array()
);
$wgMobileSpecialPages['sitelinks'] = array(
	'verein' => array('Förderverein', '/verein/'),
	'contact' => array('Kontakt', 'mailto:vorstand@mywiki.de')
);
```
