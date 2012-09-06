<?php 
defined("C5_EXECUTE") or die(_("Access Denied."));
class TitansNewsController extends Controller
{
	const rssPagePath= 'tools/packages/titans_news/rss';
	const pkgHandle = 'titans_news';
	
    public function on_start()
    {
    }
	public static function getPackageUrl(){
		$pg = new Package();
		$pg = $pg->getByHandle(TitansNewsController::pkgHandle);
		$ci = Loader::helper('concrete/urls');
		$packageURL = $ci->getPackageURL($pg);
		return $packageURL;
	}
	public static function getRssPagePath(){
		return TitansNewsController::site('/'.TitansNewsController::rssPagePath);
	}
	public static function site($url){
		return BASE_URL.DIR_REL.'/index.php'.$url;
	}
}
