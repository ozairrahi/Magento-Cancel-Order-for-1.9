<?php
class Fourtek_ReturnOrder_Block_Adminhtml_Fourtek_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("fourtek_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("returnorder")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("returnorder")->__("Item Information"),
				"title" => Mage::helper("returnorder")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("returnorder/adminhtml_fourtek_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
