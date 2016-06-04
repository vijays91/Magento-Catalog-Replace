<?php
class Learn_Catalogreplace_Block_Adminhtml_Catalogreplace extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_catalogreplace';
        $this->_blockGroup = 'catalogreplace';
        $this->_headerText = Mage::helper('catalogreplace')->__('Catalog Replace');
        parent::__construct();
		$this->_removeButton('add');
    }

}