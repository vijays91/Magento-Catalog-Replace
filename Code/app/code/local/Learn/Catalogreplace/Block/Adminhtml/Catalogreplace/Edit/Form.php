<?php
class Learn_Catalogreplace_Block_Adminhtml_Catalogreplace_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct() {
        parent::__construct();
    }
		
    protected function _prepareForm()
    {
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/replace'),
			'method' => 'post',
			'enctype'=> "multipart/form-data",
			)
		); 
        $form->setUseContainer(true);
        $this->setForm($form);		
		
        $fieldset = $form->addFieldset('catalogreplace_form',
						array('legend'=>Mage::helper('catalogreplace')->__('Catalog Replace'))
					);
		$fieldset->addField('search_text', 'text', array(
			'name'          =>'search_text',
			'label'         => Mage::helper('catalogreplace')->__('Search Text'),
			'value'         => '',
			'required'		=> true,
			'tabindex' 		=> 1,
			'maxlength'		=> 20,
            'class' 		=> " ",
		));
        
		$fieldset->addField('replace_text', 'text', array(
			'name'          =>'replace_text',
			'label'         => Mage::helper('catalogreplace')->__('Replace Text'),
			'value'         => '',
			'required'		=> true,
            'maxlength'		=> 20,
			'class' 		=> " ",
		));
		
        return parent::_prepareForm();
    }
}