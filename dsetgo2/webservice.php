<?php


if(isset($_GET['phonenumber']) && intval($_GET['phonenumber'])) {

	/* soak in the passed variable or set our own */
	$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$PhoneNumber = intval($_GET['phonenumber']); //no default


  $servername = "localhost";
  $dbusername = "dsetgo321";
  $dbpassword = "dsetgo321";
  $dbname = "dsetgo";
  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
  $result = $conn->query($sql2);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $posts = array();
             $posts[] = array('customerdetail'=>$row);
                    }
                    } else {
                      $customerfound="false";
                      $posts[] = array('customerdetail'=>"0");
                    }

	/* output in necessary format */
	if($format == 'json') {
		header('Content-type: application/json');
		echo json_encode(array('customerdetails'=>$posts));
	}
	else {
		header('Content-type: text/xml');
		echo '<customerdetails>';
		foreach($posts as $index => $post) {
			if(is_array($post)) {
				foreach($post as $key => $value) {
					echo '<',$key,'>';
					if(is_array($value)) {
						foreach($value as $tag => $val) {
							echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
						}
					}
					echo '</',$key,'>';
				}
			}
		}
		echo '</customerdetails>';
	}

	/* disconnect from the db */
//	@mysql_close($link);
$conn->close();
}
?>