<?php
error_reporting( E_ALL );
ini_set( 'error_reporting', E_ALL );

class Init {
	static $mode = 'dev'; // dev/prod
	static $prodDomain = '';
	static $menu = [];
	static $page = [];
	static $meta = [];

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
		$i = 0;
		foreach ( self::$meta as $name => $item ) {
			$p = empty( $_GET['p'] ) ? 'main' : $_GET['p'];

			if ( $p == $item['p'] ) {
				foreach ( $item as $key => $value ) {
					self::$page[ $key ] = $value;
				}
				self::$page['active'] = true;
			}
			else {
				self::$page['active'] = false;
			}

			if ( $item['p'] == 'main' ) {
				$p = '';
			}
			else {
				$p = $item['p'];
			}
			self::$page['file'] = $p;
			if ( ! empty( self::$page['active'] ) ) {
				self::$page['active'] = self::$page['file'];
			}

			$class = 'navigation__item';
			$class = empty( self::$page['active'] ) ? $class : $class . ' ' . $class . '_active';
			$class .= ' js-menu';

			$order    = empty( $item['order'] ) ? 1000 + $i : $item['order'] * 20;
			$data     = [
				'class'   => 'navigation__link',
				'p'       => $item['p'],
			];
			$menuItem = '<li class="' . $class . '">' . self::getPageLink( $data ) . '</li>';

			self::$page['menu'][ $order ] = $menuItem;
			$i ++;
		}
		ksort(self::$page['menu']);
		self::$page['menu'] = implode( '', self::$page['menu'] );
		self::$page['menu'] = '<ul class="navigation__list js-menu">'
		                      . self::$page['menu']
		                      . '<li class="navigation__item navigation__item_bars js-menu">'
		                      . '<a class="navigation__link" href="#" onclick="javascript:toggleMenu();return false"><i class="fa fa-bars"></i></a>'
		                      . '</li>'
		                      . '</ul>';
	}

	static function getPageLink( $data ) {

		if ( 'prod' == self::$mode ) {
			$prefix  = '';
			$postfix = $data['p'] != 'main' ? '.html' : '';
		}
		else {
			$prefix  = $data['p'] != 'main' ? '?p=' : '';
			$postfix = '';
		}

		$file = 'main' == $data['p'] ? '' : $data['p'];

		$data['class'] = empty( self::$page['active'] ) ? $data['class'] : $data['class'] . ' ' . $data['class'] . '_active';

		$caption = empty( $data['caption'] ) ? self::$meta[ $data['p'] ]['name'] : $data['caption'];

		return '<a class="' . $data['class'] . '" href="' . self::getStartUrl() . '/' . $prefix . $file . $postfix . '">' . $caption . '</a>';
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
		self::getMeta();
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

	static function setMeta( $name, $meta ) {
		$name                = explode( '/', explode( '.', $name )[0] );
		$name                = end( $name );
		$meta['p']           = $name;
		self::$meta[ $name ] = $meta;
	}

	static function getMeta() {

		$files = self::getPagesNames();
		foreach ( $files as $file ) {
//			print_r($file);
			ob_start();
			require './content/' . $file;
			ob_clean();
//			print_r(self::$meta);
		}
	}

	static function getPagesNames() {
		$files = scandir( './content' );
		$files = array_values( array_filter( $files, function ( $item ) {
			if ( '.' != $item && '..' != $item ) {
				return $item;
			}

			return '';
		} ) );

		return $files;
	}

}


require 'config.php';
Init::set();
include 'header.php';
include Init::getPage() . '.php';
include 'footer.php';
