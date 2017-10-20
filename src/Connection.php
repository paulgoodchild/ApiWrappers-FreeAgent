<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider\Freeagent;
use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return 'https://api.freeagent.com/v2';
	}

	/**
	 * @return string
	 */
	public function getClientId() {
		return $this->getStringParam( 'client_id' );
	}

	/**
	 * @return string
	 */
	public function getClientSecret() {
		return $this->getStringParam( 'client_secret' );
	}

	/**
	 * @return string
	 */
	public function getExpiration() {
		return $this->getNumericParam( 'expiration' );
	}

	/**
	 * @return Freeagent
	 */
	public function getOAuthProvider() {
		$oProvider = $this->getParam( 'oauth_provider' );
		if ( empty( $oProvider ) ) {
			$oProvider = new Freeagent();
			$this->setParam( 'oauth_provider', $oProvider );
		}
		return $oProvider
			->setBaseUrl( $this->getBaseUrl() )
			->setIsSandbox( $this->isSandbox() );
	}

	/**
	 * @return string
	 */
	public function getUrlAccessToken() {
		return $this->getStringParam( 'uri_redirect' );
	}

	/**
	 * @return string
	 */
	public function getUrlAuthorize() {
		return $this->getStringParam( 'uri_redirect' );
	}

	/**
	 * @return string
	 */
	public function getUrlResourceDetails() {
		return $this->getStringParam( 'uri_resource' );
	}

	/**
	 * @return bool
	 */
	public function isSandbox() {
		return (bool)$this->getParam( 'sandbox' );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setClientId( $sVal ) {
		return $this->setParam( 'client_id', $sVal );
	}

	/**
	 * @param int $nVal
	 * @return $this
	 */
	public function setExpiration( $nVal ) {
		return $this->setParam( 'expiration', $nVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setClientSecret( $sVal ) {
		return $this->setParam( 'client_secret', $sVal );
	}

	/**
	 * @param bool $bIsSandbox
	 * @return $this
	 */
	public function setIsSandbox( $bIsSandbox ) {
		return $this->setParam( 'sandbox', $bIsSandbox );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlAccessToken( $sVal ) {
		return $this->setParam( 'uri_redirect', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlAuthorize( $sVal ) {
		return $this->setParam( 'uri_auth', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlResourceDetails( $sVal ) {
		return $this->setParam( 'uri_resource', $sVal );
	}
}
