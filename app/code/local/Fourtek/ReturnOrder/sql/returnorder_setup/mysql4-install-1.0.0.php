<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
CREATE TABLE returnorder (
    id int NOT NULL AUTO_INCREMENT,
    orderid varchar(255) NOT NULL,
    comment varchar(255),
    listed_reasion varchar(255),
    customerid varchar(255),
    status varchar(255),
    currentdate varchar(155),
    PRIMARY KEY (id)
);
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 