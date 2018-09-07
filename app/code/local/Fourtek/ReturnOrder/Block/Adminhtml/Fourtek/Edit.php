<?php
	
class Fourtek_ReturnOrder_Block_Adminhtml_Fourtek_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "returnorder";
				$this->_controller = "adminhtml_fourtek";
				$this->_updateButton("save", "label", Mage::helper("returnorder")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("returnorder")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("returnorder")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("fourtek_data") && Mage::registry("fourtek_data")->getId() ){

				    return Mage::helper("returnorder")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("fourtek_data")->getId()));

				} 
				else{

				     return Mage::helper("returnorder")->__("Add Item");

				}
		}
}