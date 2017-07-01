<?php
final class GWF_ProfileVote extends GWF_VoteTable
{
	public function gdoVoteObjectTable() { return GWF_Profile::table(); }
}
