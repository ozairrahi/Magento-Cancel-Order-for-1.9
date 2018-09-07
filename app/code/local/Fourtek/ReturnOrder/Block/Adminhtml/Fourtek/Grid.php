<?php

class Fourtek_ReturnOrder_Block_Adminhtml_Fourtek_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("fourtekGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("returnorder/fourtek")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("returnorder")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
				$this->addColumn("orderid", array(
				"header" => Mage::helper("returnorder")->__("Order Id"),
				"index" => "orderid",
				));
				$this->addColumn("customerid", array(
				"header" => Mage::helper("returnorder")->__("Customer Id"),
				"index" => "customerid",
				));
				$this->addColumn("listed_reasion", array(
				"header" => Mage::helper("returnorder")->__("Reason"),
				"index" => "listed_reasion",
				));
				$this->addColumn("comment", array(
				"header" => Mage::helper("returnorder")->__("comment"),
				"index" => "comment",
				));
                

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   //return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_fourtek', array(
					 'label'=> Mage::helper('returnorder')->__('Remove Fourtek'),
					 'url'  => $this->getUrl('*/adminhtml_fourtek/massRemove'),
					 'confirm' => Mage::helper('returnorder')->__('Are you sure?')
				));
			return $this;
		}
			

}