<?php

namespace Drupal\facebook_fetch_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\facebook_fetch_custom\Facebook\Facebook;

class FacebookController extends ControllerBase {

	private function _get_accesstoken(){
		$app_id = $this->getAppId();
	    $app_secret = $this->getAppSecret();
	    $fb = new Facebook([
	      'app_id' => $app_id,
	      'app_secret' => $app_secret,
	    ]);
	    return $fb->getDefaultAccessToken();
	}
    /**
    * Returns app_id from module settings.
    *
    * @return string
    *   Application ID defined in module settings.
    */
    private function getAppId() {
    	$configFactory = \Drupal::configFactory()->getEditable('facebook_fetch_custom.settings');
	    $app_id = $configFactory
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
		$configFactory = \Drupal::configFactory()->getEditable('facebook_fetch_custom.settings');
	    $app_secret = $configFactory
	      ->get('secret');
	    return $app_secret;
	}
	public function fetchAll(){

		$response['access_token'] = $this->_get_accesstoken();
		$response['data'] = 'Some test data to return';
    	$response['method'] = 'GET';

    	return new JsonResponse( $response );
	}

}