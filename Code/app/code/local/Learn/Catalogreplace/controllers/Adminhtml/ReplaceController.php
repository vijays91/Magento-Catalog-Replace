<?php
class Learn_Catalogreplace_Adminhtml_ReplaceController extends Mage_Adminhtml_Controller_Action 
{
    protected function _initAction()
    {
        $this->_title($this->__('Catalog Replace'))->_title($this->__('Catalog Replace'));		
        $this->_setActiveMenu('catalogreplace/items')->_addBreadcrumb(
            Mage::helper('adminhtml')->__('Catalog Replace'),
            Mage::helper('adminhtml')->__('Catalog Replace')
        );
		return $this;
    }  

    public function indexAction() 
	{
		$this->loadLayout();
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('catalogreplace/adminhtml_catalogreplace_edit'));
        $this->renderLayout();
    }
    
    public function replaceAction() {
		ini_set('memory_limit', '2048M');
		ini_set('max_execution_time', 0);
        
        /*- Init Helper-*/
        $helper = Mage::helper('catalogreplace');        
        $attributes = explode(",", $helper->catalogreplace_values());
        
        /*- Get Post Values-*/
		$search  = $this->getRequest()->getParam('search_text');
        $search  = trim($search);
		$replace = $this->getRequest()->getParam('replace_text');
        $replace  = trim($replace);
        
        /*- load products -*/
		$product    = Mage::getModel('catalog/product');
		$collection = $product->getCollection();
        
        foreach ($collection as $product)
        {
            $productIds[] = $product->getId();
        }
	
        $product_ids = array();	
		foreach ($productIds as $productId)
		{
			$changedAttributes = array();	
			$_product = Mage::getModel('catalog/product')->load($productId);
			
			foreach($attributes as $attribute) {
				$count = 0;
				
				$newValue = str_replace($search, $replace,  $_product->getData($attribute), $count);
				
				//If $count >  0 that means we replaced |$count| times search string
				if($count > 0) {
					$changedAttributes[] = $attribute;
					$product_ids[] = $productId;
					$_product->setData($attribute, $newValue);
				}
			}
			
			foreach($changedAttributes as $attr) {
				$_product->getResource()->saveAttribute($_product, $attr);				
			}
		}
        $product_ids = array_unique($product_ids);
        $count_changes = count($product_ids);        
        Mage::getSingleton('adminhtml/session')->addSuccess(
            Mage::helper('catalogreplace')->__('Search text  :  <b> %s </b> <br />', $search).
            Mage::helper('catalogreplace')->__('Replace text :  <b> %s </b> <br />', $replace).
            Mage::helper('catalogreplace')->__('<br /> Totally %s product(s) attibute value(s) updated successfully', $count_changes)
        );        
        $this->_redirect('*/*/index');
	}
}