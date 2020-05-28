<?php
error_reporting( E_ALL );
ini_set( 'error_reporting', E_ALL );

class Init {
	static $mode = 'dev'; // dev/prod
	static $prodDomain = '';
	static $menu = [];
	static $page = [];

	static function getDomain() {
		if ( 'prod' != self::$mode ) {
			return $_SERVER['HTTP_HOST'] != self::$prodDomain ? $_SERVER['HTTP_HOST'] . str_replace( $_SERVER["DOCUMENT_ROOT"], '', dirname( __FILE__ ) ) : $_SERVER['HTTP_HOST'];
		}

		return self::$prodDomain;
	}

	static function getUrl() {
		return self::$page['protocol'] . '://' . self::getDomain();
	}

	static function getProtocol() {
		if ( 'prod' == self::$mode ) {
			if ( ! empty( $_GET['protocol'] ) ) {
				return $_GET['protocol'];
			}
		}

		return ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) ? 'https' : 'http';
	}

	static function getStartUrl() {
		return 'prod' != self::$mode ? '.' : self::$page['url'];
	}

	static function setMenu() {
		foreach ( self::$menu as $i => $item ) {
			$p = empty( $_GET['p'] ) ? 'main' : $_GET['p'];

			if ( $p == $item['p'] ) {
				foreach ( $item as $key => $value ) {
					self::$page[ $key ] = $value;
				}
				$active = true;
			}
			else {
				$active = false;
			}

			if ( $item['p'] == 'main' ) {
				$p = '';
			}
			else {
				$p = $item['p'];
			}
			self::$page['file'] = $p;
			if ( ! empty( $active ) ) {
				self::$page['active'] = self::$page['file'];
			}

			if ( 'prod' == self::$mode ) {
				$prefix  = '';
				$postfix = $item['p'] != 'main' ? '.html' : '';
			}
			else {
				$prefix  = $item['p'] != 'main' ? '?p=' : '';
				$postfix = '';
			}
			$class                    = 'navigation__item';
			$class                    = empty( $active ) ? $class : $class . ' ' . $class . '_active';
			$class                    .= ' js-menu';
			self::$page['menu'][ $i ] = '<li class="' . $class . '">';

			$class                    = 'navigation__link';
			$class                    = empty( $active ) ? $class : $class . ' ' . $class . '_active';
			self::$page['menu'][ $i ] .= '<a class="' . $class . '" href="' . self::getStartUrl() . '/' . $prefix . self::$page['file'] . $postfix . '">' . $item['name'] . '</a>';
			self::$page['menu'][ $i ] .= '</li>';
		}
		self::$page['menu'] = implode( '', self::$page['menu'] );
		self::$page['menu'] = '<ul class="navigation__list js-menu">'
		                      . self::$page['menu']
		                      . '<li class="navigation__item navigation__item_bars js-menu">'
		                      . '<a class="navigation__link" href="#" onclick="javascript:toggleMenu();return false"><i class="fa fa-bars"></i></a>'
		                      . '</li>'
		                      . '</ul>';
	}


	static function set() {
		if ( ! empty( $_GET['mode'] ) ) {
			self::$mode = $_GET['mode'];
		}

		if ( 'prod' == self::$mode && empty( self::$prodDomain ) ) {
			if ( empty( $_GET['prodDomain'] ) ) {
				die( '$prodDomain is empty!' );
			}
			else {
				self::$prodDomain = $_GET['prodDomain'];
			}
		}

		if ( empty( self::$page['lang'] ) ) {
			self::$page['lang'] = 'ru';
		}

		self::$page['protocol']    = self::getProtocol();
		self::$page['domain']      = self::getDomain();
		self::$page['url']         = self::getUrl();
		self::$page['imagesUrl']   = self::getUrl() . '/assets/images';
		self::$page['projectPath'] = dirname( __FILE__ );
		self::$page['imagesPath']  = self::$page['projectPath'] . '/assets/images';
		self::setMenu();
	}

	static function getPage() {
		$path = 'content/';
		$file = empty( $_GET['p'] ) ? 'main' : $_GET['p'];

		return $path . $file;
	}

	static function getImage( $srcName, $alt, $class = '' ) {
		list( $width, $height ) = getimagesize( Init::$page['imagesPath'] . '/' . $srcName );
		$src   = Init::$page['imagesUrl'] . '/' . $srcName;
		$class = ! empty( $class ) ? ' class="' . $class . '"' : '';

		return '<img alt="' . $alt . '" width="' . $width . '" height="' . $height . '" src="' . $src . '"' . $class . '/>';
	}
}

require 'config.php';
Init::set();
include 'header.php';
include Init::getPage() . '.php';
include 'footer.php';
