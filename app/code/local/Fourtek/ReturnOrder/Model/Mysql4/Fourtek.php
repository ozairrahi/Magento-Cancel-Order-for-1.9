<?php
class Fourtek_ReturnOrder_Model_Mysql4_Fourtek extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("returnorder/fourtek", "id");
    }
}