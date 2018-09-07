<?php   
class Fourtek_ReturnOrder_Block_Index extends Mage_Core_Block_Template{   
	public function getOrder()
	    {
	        return Mage::registry('current_order');
	    }
	public function getCollection($customer_id)
	    {
	    	$model = Mage::getModel('returnorder/fourtek')->getCollection();
	    	$result = $model->addFieldToFilter('customerid', $customer_id);
	    	return $result;



	    }




}