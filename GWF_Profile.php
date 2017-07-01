<?php
final class GWF_Profile extends GDO
{
	use GWF_VotedObject;
	
	###########
	### GDO ###
	###########
	public function gdoColumns()
	{
		return array(
			GDO_User::make('profile_user')->primary(),
			GDO_Url::make('profile_url')->reachable(),
			
		);
	}
	
	public static function forUser(GWF_User $user)
	{
		if (!($profile = $user->tempGet('gwf_profile')))
		{
			if (!($profile = GWF_Profile::table()->getById($user->getID())))
			{
				$profile = self::blank(['profile_user'=>$user->getID()]);
			}
			$user->tempSet('gwf_profile', $profile);
			$user->recache();
		}
		return $profile;
	}
}
