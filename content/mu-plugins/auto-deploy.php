<?php

/**
 * Poor man's deployment mechanism
 */

if ( isset( $_GET['github-auto-deploy'] )
	&& defined( 'AUTO_DEPLOY_SECRET' )
	&& AUTO_DEPLOY_SECRET == $_GET['github-auto-deploy'] ) {

	$webroot = dirname( ABSPATH );

	shell_exec( "cd $webroot; git checkout -f master; git fetch origin --tags; git pull origin master; git submodule update --init --recursive" );
	
	echo 'Deployed';
	exit;
}