<?php

namespace Drupal\facebook_fetch_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Facebook\Facebook;

class FacebookController extends ControllerBase {

	private function _get_accesstoken(){

	}
    /**
    * Returns app_id from module settings.
    *
    * @return string
    *   Application ID defined in module settings.
    */
    private function getAppId() {
	    $app_id = $this->configFactory
	      ->get('facebook_fetch_custom.settings')
	      ->get('appId');
	    return $app_id;
    }

    /**
    * Returns app_secret from module settings.
    *
    * @return string
    *   Application secret defined in module settings.
    */
	private function getAppSecret() {
	    $app_secret = $this->configFactory
	      ->get('facebook_fetch_custom.settings')
	      ->get('secret');
	    return $app_secret;
	}
	public function fetchAll(){

		$response['data'] = 'Some test data to return';
    	$response['method'] = 'GET';

    	return new JsonResponse( $response );
	}

}