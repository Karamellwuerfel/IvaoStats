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

			$clients = str_replace("CONNECTED CLIENTS = ", "", $clients);
			$servers = str_replace("CONNECTED SERVERS = ", "", $servers);
			$airports = str_replace("CONNECTED AIRPORTS = ", "", $airports);


			
            $this->set('clients', $clients);
            $this->set('servers', $servers);
            $this->set('airports', $airports);
			
            $this->show('/ivaostats/ivaostats.php');
			
            
        }
}
?>