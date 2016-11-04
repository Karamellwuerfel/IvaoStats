<?php
class IVAOStats extends CodonModule
{
	public function index() 
	   {

			$connected = "CONNECTED";
			$matches = array();

			$handle = @fopen("http://api.ivao.aero/getdata/whazzup/whazzup.txt", "r");
			if ($handle)
			{
				while (!feof($handle))
				{
					$buffer = fgets($handle);
					if(strpos($buffer, $connected) !== FALSE)
						$matches[] = $buffer;
				}
				fclose($handle);
			}

			$clients = $matches[0];
			$servers = $matches[1];
			$airports = $matches[2];

			//search for clients, servers and airports
			$clients = str_replace("CONNECTED CLIENTS = ", "", $clients);
			$servers = str_replace("CONNECTED SERVERS = ", "", $servers);
			$airports = str_replace("CONNECTED AIRPORTS = ", "", $airports);

			//search for observers
			$obs = array("observer");  
			$string = file_get_contents('http://api.ivao.aero/getdata/whazzup/whazzup.txt');
			 
			foreach($obs as $word)  
			{  
				$observers = substr_count(strtolower($string), $word);  
			}  
			
			//search for pilots
			$pilo = array("pilot");  
			foreach($pilo as $word)  
			{  
				$pilots = substr_count(strtolower($string), $word);  
			}
			
			//calculate controllers out of clients and pilots // ISSUE not right number! // 11/04/2016 Philipp Dalheimer
			$controllers = $clients - $pilots;
			

			$this->set('clients', $clients);
            $this->set('servers', $servers);
            $this->set('airports', $airports);
			$this->set('observers', $observers);
			$this->set('pilots', $pilots);
			$this->set('controllers', $controllers);
			
            $this->show('/ivaostats/ivaostats.php');
			
            
        }
}
?>