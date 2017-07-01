<?php
final class Module_Profile extends GWF_Module
{
	public $module_priority = 45;
	
	public function getClasses() { return ['GWF_Profile', 'GWF_ProfileVote']; }
	
	public function getUserSettings()
	{
		return array(
			GDO_Int::make('profile_views')->unsigned()->initial('0'),
		);
	}
	
	public function getConfig()
	{
		return array();
	}
}