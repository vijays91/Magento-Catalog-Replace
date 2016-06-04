<?php
class Learn_Catalogreplace_Model_Dropdown_Fields extends Mage_Core_Model_Abstract 
{
    public function toOptionArray()
	{
        return array (
            /*
            array(
                "value" => "name",
                "label" => "Name"
            ),
            array(
                "value" => "sku",
                "label" => "SKU"
            ),
            */
            array(
                "value" => "description",
                "label" => "Description"
            ),
            array(
                "value" => "short_description",
                "label" => "Short Description"
            ),
        );
	} 


}