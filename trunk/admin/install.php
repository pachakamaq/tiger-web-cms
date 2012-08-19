<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
	<?php 
	if (isset($_POST) && ($_POST != NULL)){
		
	}
	else{
		?>
	<form action="install.php" method="post">
		Site Name: <input type="text" name="site" /><br /> Site URL: <input
			type="text" name="url" /><br /> Username: <input type="text"
			name="uname" /><br /> Password: <input type="password" name="pass" /><br />
		Confirm Password: <input type="password" name="cpass" /><br /> <input
			type="submit" value="Submit" />
	</form>
	<?php 
	}
	?>
	<?php 
	/*
	 $employees = array();
	$employees [] = array(
			'name' => 'Albert',
			'age' => '34',
			'salary' => "$10000"
	);
	$employees [] = array(
			'name' => 'Claud',
			'age' => '20',
			'salary' => "$2000"
	);

	$doc = new DOMDocument();
	$doc->formatOutput = true;

	$r = $doc->createElement( "employees" );
	$doc->appendChild( $r );

	foreach( $employees as $employee )
	{
	$b = $doc->createElement( "employee" );

	$name = $doc->createElement( "name" );
	$name->appendChild(
			$doc->createTextNode( $employee['name'] )
	);
	$b->appendChild( $name );

	$age = $doc->createElement( "age" );
	$age->appendChild(
			$doc->createTextNode( $employee['age'] )
	);
	$b->appendChild( $age );

	$salary = $doc->createElement( "salary" );
	$salary->appendChild(
			$doc->createTextNode( $employee['salary'] )
	);
	$b->appendChild( $salary );

	$r->appendChild( $b );
	}

	echo $doc->saveXML();
	$doc->save("write.xml")
	*/
	?>
</body>

</html>
