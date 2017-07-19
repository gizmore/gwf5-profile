<?php
final class Profile_View extends GWF_Method
{
	public function execute()
	{
		return $this->templateProfile(Common::getRequestString('id', GWF_User::current()->getID()));
	}
	
	public function templateProfile(string $userid)
	{
		$profileUser = GWF_User::table()->find($userid);
		return $this->templatePHP('profile.php', ['user' => $profileUser]);
	}
	
	public function onProfileView(GWF_User $profileUser)
	{
		$user = GWF_User::current();
		$userid = $profileUser->getID();
		# Increase views
		if (!$user->tempGet("profileview_$userid"))
		{
			$views = GWF_UserSetting::userInc($profileUser, 'profile_views');
			$user->tempSet("profileview_$userid", 1);
		}
		
	}
}
