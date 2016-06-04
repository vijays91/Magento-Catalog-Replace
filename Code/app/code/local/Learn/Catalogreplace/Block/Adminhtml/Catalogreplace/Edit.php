<?php
class Learn_Catalogreplace_Block_Adminhtml_Catalogreplace_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();               
        $this->_objectId = 'id';
        $this->_blockGroup = 'qty';
        $this->_controller = 'adminhtml_catalogreplace'; 
		$this->_removeButton('delete');
		$this->_removeButton('reset');		
        $this->_updateButton('save', 'label', Mage::helper('catalogreplace')->__('Replace Text'));	
		$this->_removeButton('back');        
	}
 
    public function getHeaderText() {
		return Mage::helper('catalogreplace')->__('Catalog Replace');
    }
	
	protected function _prepareLayout()
	{
		/* echo $this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form'; */
		if ($this->_blockGroup && $this->_controller && $this->_mode) {
			$this->setChild('form', $this->getLayout()->createBlock('catalogreplace/adminhtml_catalogreplace_edit_form'));
		}
		return parent::_prepareLayout();
	}
}