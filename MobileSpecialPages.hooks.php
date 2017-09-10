<?php

namespace MediaWiki\Extension\MobileSpecialPages;

use SpecialPage;
use MobileUI;

class Hooks {

	public static function onBeforePageDisplay( $out, $skin ) {
		$out->addModuleStyles( 'mobile.SpecialPages' );
	}

	public static function onMobileMenu( $menuSection, $menu ) {
		if ($menuSection === 'personal') {
			$menu->insertAfter( 'watchlist', 'recentchanges' )->addComponent(
				'Letze Änderungen',
				SpecialPage::getTitleFor('RecentChanges')->getLocalUrl(),
				MobileUI::iconClass( 'recentchanges', 'before' ),
				array( 'data-event-name' => 'recentchanges' )
			);

			$menu->insertAfter( 'watchlist', 'imagelist' )->addComponent(
				'Neueste Dateien',
				SpecialPage::getTitleFor('Imagelist')->getLocalUrl(),
				MobileUI::iconClass( 'imagelist', 'before' ),
				array( 'data-event-name' => 'imagelist' )
			);
		}
		return true;
	}
}
