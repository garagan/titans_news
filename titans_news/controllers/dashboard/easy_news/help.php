<?php 
defined("C5_EXECUTE") or die(_("Access Denied."));

class DashboardTitansNewsHelpController extends TitansNewsDashboardController
{
    public function on_start() {
		$subnav = array(
			array(View::url('/dashboard/titans_news'),t('Titans News Manage')), 
			array(View::url('/dashboard/titans_news/help'),'Help', true)
		);
		$this->set('subnav', $subnav);
	}
}
