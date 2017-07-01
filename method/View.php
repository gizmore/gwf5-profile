<?php
final class Profile_View extends GWF_Method
{
	public function execute()
	{
		$views = GWF_UserSetting::get('profile_views');
		GWF_UserSetting::set('profile_views', $views+1);
		return $this->templatePHP('profile.php', ['user' => GWF_User::current()]);
	}
}
