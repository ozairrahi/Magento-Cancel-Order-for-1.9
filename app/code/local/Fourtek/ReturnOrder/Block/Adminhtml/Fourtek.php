<?php


class Fourtek_ReturnOrder_Block_Adminhtml_Fourtek extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_fourtek";
	$this->_blockGroup = "returnorder";
	$this->_headerText = Mage::helper("returnorder")->__("Fourtek Manager");
	$this->_addButtonLabel = Mage::helper("returnorder")->__("Add New Item");
	parent::__construct();
	
	}

}