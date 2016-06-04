<?php
class Learn_Catalogreplace_Helper_Data extends Mage_Core_Helper_Abstract 
{
    const XML_PATH_CR_TEXT    = 'catalogreplace_tab/catalogreplace_setting/catalogreplace_fields';
    
    public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }

	public function catalogreplace_values($store) {
        return $this->conf(self::XML_PATH_CR_TEXT, $store);
    }
}