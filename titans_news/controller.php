<?php  

defined('C5_EXECUTE') or die(_("Access Denied."));

class TitansNewsPackage extends Package {

	protected $pkgHandle = 'titans_news';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '0.1';
	
	function __construct(){
		Loader::library('controller',$this->pkgHandle); //Used by controllers
		Loader::library('dashboardcontroller',$this->pkgHandle); //Used by controllers
	}
	
	public function getPackageDescription() {
		return t('Add news posting area to your site with facebook cross-posting.');
	}
	
	public function getPackageName() {
		return t('Titans News');
	}
	
	public function install() {
		$pkg = parent::install();
		Loader::model('single_page');
		Loader::model('attribute/categories/collection');
		
		// install attributes
		$cab1 = CollectionAttributeKey::add('BOOLEAN',array('akHandle' => 'titansnews_section', 'akName' => t('NEWS Section'), 'akIsSearchable' => true), $pkg);

		//install pages
		$def = SinglePage::add('/dashboard/titans_news', $pkg);
		$def->update(array('cName'=>'Titans News', 'cDescription'=>t('Manage site news.')));
		$def = SinglePage::add('/dashboard/titans_news/help', $pkg);
		$def->update(array('cName'=>'Titans News Help', 'cDescription'=>t('Titans News help.')));
		
		//install block
		BlockType::installBlockTypeFromPackage('titansnews_list', $pkg); 

	}
}