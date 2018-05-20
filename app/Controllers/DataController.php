<?php 
namespace App\Controllers;

use App\Models\Persona;
use App\Controllers\Controller;
use App\Utils\ArrayToXML;


class DataController extends Controller {

	public function index($request, $response) {
		if ($this->jwt != null) {
			$auth = json_decode($this->jwt->sub);
			if ( (  ($auth->user == "admin") && ($auth->pass == "admin")  ) && in_array('read', $auth->roles)) {
				 $data = Persona::get();

				 $personas = array();
				 foreach ($data as $idx => $persona) {
				 	$registro = array();
				 	foreach ($persona->getAttributes() as $field => $value) {
				 		$registro[$field] = $value;		
				 	}	
				 	$personas[] = $registro;
				 }

				 $xml = ArrayToXML::toXML($personas, 'personas' );
				 return $response->withStatus(200)
				 					->withHeader('Access-Control-Allow-Origin', '*')
				 					->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE')
				 					->withHeader('Access-Control-Allow-Headers', '*')
				 					//->withHeader('Content-Type', 'application/json')
		        					->withHeader('Content-Type', 'application/xml')
		        					//->withJson($personas);
		        					->write($xml);
		    }
		}
		return $response->withStatus(401);        					
	} 
	
}



?>