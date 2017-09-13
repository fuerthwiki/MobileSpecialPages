<?php

namespace MediaWiki\Extension\MobileSpecialPages;

use SpecialPage;
use MobileUI;

class Hooks {

	public static function onBeforePageDisplay( $out, $skin ) {
		$out->addModuleStyles( 'mobile.SpecialPages' );
	}

	public static function onMobileMenu( $menuSection, $menu ) {
		global $wgMobileSpecialPages;

		$entries = (isset($wgMobileSpecialPages[$menuSection]) && is_array($wgMobileSpecialPages[$menuSection])) ?
			$wgMobileSpecialPages[$menuSection] : [] ;

		foreach ($entries as $key => $data) {
			if ($key == 'RECENTCHANGES') {
				$data = array(
					isset($data[0]) ? $data[0] : 'Letzte Änderungen',
					isset($data[1]) ? $data[1] : SpecialPage::getTitleFor('RecentChanges')->getLocalUrl(),
					isset($data[2]) ? $data[2] : MobileUI::iconClass( 'recentchanges', 'before' ),
					array( 'data-event-name' => 'recentchanges' )
				);
			}

			if ($key == 'IMAGELIST') {
				$data = array(
					isset($data[0]) ? $data[0] : 'Neueste Dateien',
					isset($data[1]) ? $data[1] : SpecialPage::getTitleFor('Imagelist')->getLocalUrl(),
					isset($data[2]) ? $data[2] : MobileUI::iconClass( 'imagelist', 'before' ),
					array( 'data-event-name' => 'imagelist' )
				);
			}

			$key = strtolower($key);
			$menu->insert( $key )->addComponent(
				$data[0],
				$data[1],
				isset($data[2]) ? $data[2] : null,
				array( 'data-event-name' => $key )
			);
		}

		return true;
	}
}
