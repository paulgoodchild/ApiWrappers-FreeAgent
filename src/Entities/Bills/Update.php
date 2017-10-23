<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Update extends Create {

	const REQUEST_METHOD = 'put';

	/**
	 * @param array $aUpdateData
	 * @return BillVO|null
	 */
	public function update( $aUpdateData = array() ) {
		return $this->create( $aUpdateData );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "update" API request without an Entity ID' );
		}
	}
}