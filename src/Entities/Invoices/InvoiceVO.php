<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/invoices
 * Class InvoiceVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class InvoiceVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getContactId() {
		return basename( $this->getStringParam( 'contact' ) );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDatedOn() {
		return $this->getStringParam( 'dated_on' );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getPaidOn() {
		return $this->getStringParam( 'paid_on' );
	}

	/**
	 * @return string
	 */
	public function getEcStatus() {
		return $this->getStringParam( 'ec_status' );
	}

	/**
	 * @return array[]
	 */
	public function getLineItems() {
		return $this->getArrayParam( 'invoice_items' );
	}

	/**
	 * @return string
	 */
	public function getPlaceOfSupply() {
		return $this->getParam( 'place_of_supply' );
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return float
	 */
	public function getValueDue() {
		return $this->getParam( 'due_value' );
	}

	/**
	 * @return float
	 */
	public function getValuePaid() {
		return $this->getParam( 'paid_value' );
	}

	/**
	 * @return float
	 */
	public function getValueGross() {
		return $this->getParam( 'total_value' );
	}

	/**
	 * @return float
	 */
	public function getValueNet() {
		return $this->getParam( 'net_value' );
	}

	/**
	 * @return float
	 */
	public function getValueSalesTax() {
		return $this->getParam( 'sales_tax_value' );

	}

	/**
	 * @return bool
	 */
	public function isEcStatusUkNonEc() {
		return $this->isEcStatus( 'UK/Non-EC' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusGoods() {
		return $this->isEcStatus( 'EC Goods' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusServices() {
		return $this->isEcStatus( 'EC Services' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusVatMoss() {
		return $this->isEcStatus( 'EC VAT MOSS' );
	}

	/**
	 * @param string $sStatus - case insensitive status to compare
	 * @return bool
	 */
	public function isEcStatus( $sStatus ) {
		return ( strcasecmp( $this->getEcStatus(), $sStatus ) === 0 );
	}

	/**
	 * One of:
	 *	Draft
		Scheduled To Email
		Open
		Zero Value
		Overdue
		Paid
		Overpaid
		Refunded
		Written-off
		Part written-off
	 * @param string $sStatus - case insensitive status to compare
	 * @return bool
	 */
	public function isStatus( $sStatus ) {
		return ( strcasecmp( $this->getStatus(), $sStatus ) === 0 );
	}

	/**
	 * @return bool
	 */
	public function isStatusDraft() {
		return $this->isStatus( 'Draft' );
	}

	/**
	 * @return bool
	 */
	public function isStatusOpen() {
		return $this->isStatus( 'Open' );
	}

	/**
	 * @return bool
	 */
	public function isStatusPaid() {
		return $this->isStatus( 'Paid' );
	}
}