<?php
class Fourtek_ReturnOrder_IndexController extends Mage_Core_Controller_Front_Action{
    public function returnOrderAction()
    {
        $post = $this->getRequest()->getPost();

        $order = Mage::getModel("sales/order")->loadByIncrementId($post['orderid']);
        $status = $order->getStatus();

        if($status == 'return'){
          Mage::getSingleton('core/session')->addError(Mage::helper('contacts')->__('You have already return this order'));
        }else if($status == 'complete' || $status == 'shipped'){

        $order->setStatus("return");
        try{
        $order->save();
        $comment = $post['listed_reasion'];
        $order->sendOrderUpdateEmail(true, $comment);
        }catch(Exception $e){
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__($e));
        }
        $model = Mage::getModel('returnorder/fourtek');
        $model->setOrderid($post['orderid']);
        $model->setComment($post['comment']);
        $model->setCustomerid($post['customerid']);
        $model->setCurrentdate($post['currentdate']);
        $model->setListedReasion($post['listed_reasion']);
        try{
          $model->save();
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__('Your order return request is successfully saved. Our customer support will contact you soon...'));
           
        }catch(Exception $e){
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__('There has been error'));
        }
        }else{
          $order->setStatus("canceled");
        try{
        $order->save();
        $comment = $post['listed_reasion'];
        $order->sendOrderUpdateEmail(true, $comment);
        }catch(Exception $e){
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__($e));
        }
        $model = Mage::getModel('returnorder/fourtek');
        $model->setOrderid($post['orderid']);
        $model->setComment($post['comment']);
        $model->setCustomerid($post['customerid']);
        $model->setCurrentdate($post['currentdate']);
        $model->setListedReasion($post['listed_reasion']);
        try{
          $model->save();
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__('Your order return request is successfully saved. Our customer support will contact you soon...'));
           
        }catch(Exception $e){
          Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__('There has been error'));
        }
      }
        $this->_redirectReferer(); 
    }
}