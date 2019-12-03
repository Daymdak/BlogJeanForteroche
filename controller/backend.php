<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function controlPanel()
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$reportedComments = $commentManager->getReportedComments();

	require('view/backend/adminView.php');
}
