<?php
Init::setMeta( __FILE__, [
	'order'       => 5,
	'name'        => 'Награды',
	'title'       => 'Награды утилиты Unlocker',
	'description' => 'Посмотрите награды утилиты Unlocker.',
] );
?>
<?php
$awards = [
	[
		'link'  => 'http://www.brothersoft.com/unlocker-60547.html',
		'image' => 'award-brothersoft.gif',
	],
	[
		'link'  => 'http://www.softpedia.com/get/System/System-Miscellaneous/Unlocker.shtml',
		'image' => 'award-softpedia-pick.gif',
	],
	[
		'link'  => 'http://www.freewarefiles.com/programs.php?categoryid=9&amp;subcategoryid=102&amp;ProgramID=13477',
		'image' => 'award-freewarefiles.gif',
	],
	[
		'link'  => 'http://www.freeware-archiv.de/Unlocker-System.htm',
		'image' => 'award-premium.gif',
	],
	[
		'link'  => 'http://toget.pchome.com.tw/intro/utility_file/utility_file_view/23922.html',
		'image' => 'award-toget.gif',
	],
	[
		'link'  => 'http://www.softodrom.ru/win/ap/p6411.shtml',
		'image' => 'award-softodrom2.gif',
	],
	[
		'link'  => 'http://www.freevistafiles.com/Cedrick-Collomb+Unlocker.html',
		'image' => 'award-freevistafiles.gif',
	],
	[
		'link'  => 'http://www.wintotal.de/softw/index.php?id=2783',
		'image' => 'award-wintotal.gif',
	],
	[
		'link'  => 'http://www.webtechgeek.com/WTG-Software-Review-274-Unlocker.htm',
		'image' => 'award-webtechgeek.gif',
	],
	[
		'link'  => 'http://punto-informatico.it/download/scheda.asp?i=809',
		'image' => 'award-puntoinformatico.gif',
	],
	[
		'link'  => 'http://www.paraisoft.com/programa.php?CodProg=37&amp;CodMenu=37;',
		'image' => 'award-paraisoft.gif',
	],
	[
		'link'  => 'http://www.01net.com/telecharger/windows/Utilitaire/manipulation_de_fichier/fiches/32585.html',
		'image' => 'award-01net.gif',
	],
	[
		'link'  => 'http://unlocker.uptodown.com/',
		'image' => 'award-uptodown.gif',
	],
	[
		'link'  => 'http://www.softodrom.ru/win/ap/p6411.shtml',
		'image' => 'award-softodrom.gif',
	],
	[
		'link'  => 'http://news.swzone.it/swznews-17096.php',
		'image' => 'award-swzone.gif',
	],
	[
		'link'  => 'http://www.pricelesswarehome.org/2006/PL2006FILEUTILITIES.php',
		'image' => 'award-pricelessware.gif',
	],
	[
		'link'  => 'http://www.freeware-guide.com/month/112005.html',
		'image' => 'award-freewareguide.gif',
	],
	[
		'link'  => 'http://telechargement.journaldunet.com/fiche/5846/2/unlocker/index.html#',
		'image' => 'award-jdn.gif',
	],
	[
		'link'  => 'http://www.zdnet.de/downloads/prg/0/9/de10389109-wc.html',
		'image' => 'award-zdnetde.gif',
	],
	[
		'link'  => 'http://sixfiles.com/dbase/files/cedrick-collomb-unlocker.html',
		'image' => 'award-sixfiles.gif',
	],
	[
		'link'  => 'http://www.dodownload.com/system+utilities/system+maintenance/unlocker.html',
		'image' => 'award-dodownload.png',
	],
	[
		'link'  => 'http://www.filecluster.com/System-Utilities/System-Maintenance/Download-Unlocker.html',
		'image' => 'award-filecluster.gif',
	],
	[
		'link'  => 'http://www.freewarearena.com/html/Downloads/details/id=1977.html',
		'image' => 'award-freewarearena.png',
	],
	[
		'link'  => 'http://www.forest.impress.co.jp/article/2005/05/10/unlocker.html',
		'image' => 'award-madomori.gif',
	],
	[
		'link'  => 'http://www.bestfreewaredownload.com/freeware/t-free-unlocker-freeware-rlopheif.html',
		'image' => 'award-bestfreeware.png',
	],
];

$list = [];
foreach ( $awards as $i => $item ) {

	list( $alt ) = explode( '.', $item['image'] );
	$alt = explode( '-', $alt );
	$alt = $alt[1] . ' ' . $alt[0];

	$list[] = '<div class="awards__cell">'
	          . '<a target="_blank" href="' . $item['link'] . '">'
	          . Init::getImage( $item['image'], $alt )
	          . '</a>'
	          . '</div>';

}
$list = '<div class="awards">' . join( '', $list ) . '</div>';
?>


<?php echo $list; ?>



