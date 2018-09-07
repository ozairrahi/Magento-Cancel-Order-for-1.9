<?php
class Fourtek_ReturnOrder_Block_Adminhtml_Fourtek_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("returnorder_form", array("legend"=>Mage::helper("returnorder")->__("Item information")));

				

				if (Mage::getSingleton("adminhtml/session")->getFourtekData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getFourtekData());
					Mage::getSingleton("adminhtml/session")->setFourtekData(null);
				} 
				elseif(Mage::registry("fourtek_data")) {
				    $form->setValues(Mage::registry("fourtek_data")->getData());
				}
				return parent::_prepareForm();
		}
}
