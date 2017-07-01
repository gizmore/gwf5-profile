<?php
final class Profile_View extends GWF_Method
{
	public function execute()
	{
		return $this->templateProfile(Common::getRequestString('id', GWF_User::current()->getID()));
	}
	
	public function templateProfile(string $userid)
	{
		$user = GWF_User::current();
		
		$profileUser = GWF_User::table()->find($userid);
// 		$profile = GWF_Profile::forUser($profileUser);
		
		# Increase views
		if (!$user->tempGet("profileview_$userid"))
		{
			$views = GWF_UserSetting::moduleUserInc($this->module->getID(), $profileUser, 'profile_views');
			$user->tempSet("profileview_$userid", 1);
		}
		
		return $this->templatePHP('profile.php', ['user' => $profileUser]);
	}
}
