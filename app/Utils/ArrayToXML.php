<?php 

namespace App\Utils;



class ArrayToXML
{
	public static function toXml($data, $rootNodeName = 'data',  $xml=null)
	{
		
		if (ini_get('zend.ze1_compatibility_mode') == 1)
		{
			ini_set ('zend.ze1_compatibility_mode', 0);
		}
		
		if ($xml == null)
		{
			$xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
		}
		
		
		foreach($data as $key => $value)
		{
			
			if (is_numeric($key))
			{
				
				$key = substr($rootNodeName,0,-1).'_'. (string) $key;
				$key = preg_replace('/[^a-z]/i', '', $key);
			}
			else {
				$separator = '_';
				$key = lcfirst(str_replace($separator, '', ucwords($key, $separator)));

			}
			
			
			if (is_array($value))
			{
				$node = $xml->addChild($key);
				
				ArrayToXML::toXml($value, $rootNodeName,  $node);
			}
			else 
			{
				
                $value = htmlentities($value);
				$xml->addChild($key,$value);
			}
			
		}
		
		return $xml->asXML();
	}
}
?>
