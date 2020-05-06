$qer = "";	
	
	if (isset($_GET['license_no']))
	{
		$qer = "license_number=".$_GET['license_no'];
	}
	if (isset($_GET['driver_name'])) 
	{
		$qer = '$q='.$_GET['driver_name'];
	}
	
	if (isset($_GET['license_no']) || isset($_GET['driver_name']))
	{
		$URL_all = 'https://data.cityofnewyork.us/resource/xjfq-wh2d.json?$$app_token=I8kITaSjGnjvxJBmt6zwfI66C&'.$qer;
		
		$URL_med = 'https://data.cityofnewyork.us/resource/jb3k-j3gp.json?$$app_token=I8kITaSjGnjvxJBmt6zwfI66C&'.$qer;
	
		$URL_shl = 'https://data.cityofnewyork.us/resource/5tub-eh45.json?$$app_token=I8kITaSjGnjvxJBmt6zwfI66C&'.$qer;
	
		//FHV Driver License Data
		
		echo "<h2>FHV Driver License Data</h2>";
		$ch = curl_init($URL_all);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		//curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		$array = json_decode($output, TRUE);
		
		$i = 0;
		
		echo "<table id=\"customers\"><tr><th>License No.</th><th>Driver's Name</th><th>Type</th><th>Expiration Date</th><th>Wheelchair Accessible Trained</th><th>Last Updated on </th></tr>";
		
		foreach ($array as $list)
		{
			echo "<tr><td>".$list['license_number']."</td><td>".$list['name']."</td><td>".$list['type']."</td><td>".substr($list['expiration_date'],0,10)."</td><td>".$list['wheelchair_accessible_trained']."</td><td>".substr($list['last_date_updated'],0,10)."</td></tr>";
		}
		echo "</table>";
		if (count($array) < 1)
			echo "<p>No Record Found</p>";
		//Medallion Driver License Data
		echo "<h2>Medallion Driver License Data</h2>";
		$ch = curl_init($URL_med);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		//curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		$array = json_decode($output, TRUE);
		
		$i = 0;
		
		echo "<table id=\"customers\"><tr><th>License No.</th><th>Driver's Name</th><th>Type</th><th>Expiration Date</th><th>Last Updated on </th></tr>";
		
		foreach ($array as $list)
		{
			echo "<tr><td>".$list['license_number']."</td><td>".$list['name']."</td><td>".$list['type']."</td><td>".substr($list['expiration_date'],0,10)."</td><td>".substr($list['last_updated_date'],0,10)."</td></tr>";
		}
		echo "</table>";
		if (count($array) < 1)
			echo "<p>No Record Found</p>";
		
		
		//SHL Driver License Data
		echo "<h2>SHL Driver License Data</h2>";
		$ch = curl_init($URL_shl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		//curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		$array = json_decode($output, TRUE);
		
		$i = 0;
		
		echo "<table id=\"customers\"><tr><th>License No.</th><th>Driver's Name</th><th>Type</th><th>Expiration Date</th><th>Last Updated on </th></tr>";
		
		foreach ($array as $list)
		{
			echo "<tr><td>".$list['license_number']."</td><td>".$list['name']."</td><td>".$list['status_description']."</td><td>".substr($list['expiration_date'],0,10)."</td><td>".substr($list['last_update_date'],0,10)."</td></tr>";
		}
		echo "</table>";
		if (count($array) < 1)
			echo "<p>No Record Found</p>";
	}
	?>
