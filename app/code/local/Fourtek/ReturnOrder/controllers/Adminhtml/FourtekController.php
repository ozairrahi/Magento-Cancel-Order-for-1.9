<?php

class Fourtek_ReturnOrder_Adminhtml_FourtekController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('returnorder/fourtek');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("returnorder/fourtek")->_addBreadcrumb(Mage::helper("adminhtml")->__("Fourtek  Manager"),Mage::helper("adminhtml")->__("Fourtek Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("ReturnOrder"));
			    $this->_title($this->__("Manager Fourtek"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("ReturnOrder"));
				$this->_title($this->__("Fourtek"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("returnorder/fourtek")->load($id);
				if ($model->getId()) {
					Mage::register("fourtek_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("returnorder/fourtek");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Fourtek Manager"), Mage::helper("adminhtml")->__("Fourtek Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Fourtek Description"), Mage::helper("adminhtml")->__("Fourtek Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("returnorder/adminhtml_fourtek_edit"))->_addLeft($this->getLayout()->createBlock("returnorder/adminhtml_fourtek_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("returnorder")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("ReturnOrder"));
		$this->_title($this->__("Fourtek"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("returnorder/fourtek")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("fourtek_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("returnorder/fourtek");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Fourtek Manager"), Mage::helper("adminhtml")->__("Fourtek Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Fourtek Description"), Mage::helper("adminhtml")->__("Fourtek Description"));


		$this->_addContent($this->getLayout()->createBlock("returnorder/adminhtml_fourtek_edit"))->_addLeft($this->getLayout()->createBlock("returnorder/adminhtml_fourtek_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("returnorder/fourtek")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Fourtek was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setFourtekData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setFourtekData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("returnorder/fourtek");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("returnorder/fourtek");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
}
