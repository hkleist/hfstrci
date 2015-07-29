<?php
class Housesm extends CI_Model {
	 function __construct()
    {
        $this->load->database();
    }

    	function verifysearch($value){
    		$this->db->select('*');
			$this->db->where('`search` =', $value);
			$query = $this->db->get('latlng', 1);

			if($res = $query->result())
				return array($res['0']["lat"], $res['0']["lng"]);
			else
				return false;
    	}
    	function insertlatlong($search, $lat, $lng){
    		$this->db->insert('latlng', array('search'=>$search,"lat"=>$lat,"lng"=>$lng)); 
    	}
    	function searchpropertylatlong($saletype,$lat,$long,$resultnumber,$pag=1,$filters=false){
    		
    		$query = $this->db->query("
				SELECT latitude_feed as latitude, longitude_feed as longitude, full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed SQRT(
			    POW(69.1 * (latitude - $lat), 2) +
			    POW(69.1 * ($lng - longitude) * COS(latitude / 57.3), 2)) AS distance
				FROM feed HAVING distance < 25 ORDER BY distance;
			");
    		return $query->result();
    	}
		function searchDB($saletype,$searchquery,$resultsnumber,$pag=1,$filters=false){
		 	$pag--;
		 	$startnum = $pag*$resultsnumber;
		 	$this->db->select('full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed');
			$this->db->where('listing_type_feed =', $saletype);
			if($filters){
				$this->db->where('price_feed >=', $filters["price1"]);
				$this->db->where('price_feed <=', $filters["price2"]);
				
				//$this->db->where('num_bedrooms_feed >=', $filters["bedrooms1"]);
				//$this->db->where('num_bedrooms_feed <=', $filters["bedrooms2"]);
			}
				
		 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
		 	$this->db->or_where("MATCH (postalcode_feed) AGAINST ('$searchquery')", NULL, FALSE);
		 	$query = $this->db->get('feed', $resultsnumber,$startnum);
			return $query->result();
       }

       function searchDBrows($saletype,$searchquery,$filters=false){
		 	$this->db->select('full_address_feed');
			$this->db->where('listing_type_feed =', $saletype);
			if($filters){
				$this->db->where('price_feed >=', $filters["price1"]);
				$this->db->where('price_feed <=', $filters["price2"]);
				
				//$this->db->where('num_bedrooms_feed >=', $filters["bedrooms1"]);
				//$this->db->where('num_bedrooms_feed <=', $filters["bedrooms2"]);
			}
		 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
		 	$this->db->or_where("MATCH (postalcode_feed) AGAINST ('$searchquery')", NULL, FALSE);
		 	$query = $this->db->get('feed', 500);
		 	
			return $query->num_rows();
		
       }
       
       function gettopandminprice($saletype,$searchquery){
       
       		$this->db->select('MAX(price_feed) as max, MIN(price_feed) as min');
			$this->db->where('listing_type_feed =', $saletype);
			$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
		 	$this->db->or_where("MATCH (postalcode_feed) AGAINST ('$searchquery')", NULL, FALSE);
		 	$query = $this->db->get('feed', 500);
	       
	       	return $query->result();
       }

        function getredirectUrl($key){
		 	$this->db->select('url_feed');
			$this->db->where('key_feed =', $key);
			$query = $this->db->get('feed', 1);
			
			$data = array(
			 'ip' => $_SERVER['REMOTE_ADDR'] ,
			 'fkey' => $key,
			);
			$this->db->insert('sends', $data); 
			
			return $query->result();
       }
       function savesearch($search,$style = "sale"){
       	
	       	$data = array(
			 'ipsearch' => $_SERVER['REMOTE_ADDR'] ,
			 'search' => $search,
			 'saleorrent' => $style,
			);
			$this->db->insert('search', $data); 
       	
       }
       function getcountrydist($country){
       		$this->db->select('district,iso');
			$this->db->where('country =', $country);
			$query = $this->db->get('district');
			return $query->result();
       }
       function getdistbyiso($iso){
       		$this->db->select('district');
			$this->db->where('iso =', $iso);
			$query = $this->db->get('district', 1);
			return $query->result();
       }
       function getdisttown($district){
       		$this->db->select('town,district');
			$this->db->where('district =', $district);
			$query = $this->db->get('town');
			return $query->result();
       }
       function gettownareas($town,$district){
       		$this->db->select('ward,town,district');
			$this->db->where('town =', $town);
			$this->db->where('district =', $district);
			$query = $this->db->get('ward');
			return $query->result();
       }
       function getareacode($town,$ward){
       		$this->db->select('TOWN,WARD,DISTRICT,POSTCODE,STREET');
			$this->db->where('TOWN =', $town);
			$this->db->where('WARD =', $ward);
			$query = $this->db->get('postcodes');
			return $query->result();
       }

       function getcodeinfo($postcode){
       		$this->db->select('price,date,proptype,PAON,street,locality,town,county');
			$this->db->where('postcod =', $postcode);
			$this->db->order_by("PAON", "asc");
			$query = $this->db->get('landregs');
			return $query->result();
       }
        function getisobydist($dist){
       		$this->db->select('iso');
			$this->db->where('district =', $dist);
			$query = $this->db->get('district', 1);
			return $query->result();
       }
}