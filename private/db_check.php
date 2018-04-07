<?php
function db_check()
{
	$servername = "localhost";
	$username = "root";
	$password = "ShopShop";
	$db_name = "rush";
	// Create connection

	// $conn = mysqli_connect($servername, $username, $password, $db_name);
	// if (!$conn) {
		// mysqli_close($conn);
    	$conn = mysqli_connect($servername, $username, $password);
		if ($conn) {
			if (!mysqli_select_db($conn,"rush"))
			{
			$sql = "CREATE DATABASE rush";
			if (mysqli_query($conn, $sql))
			{
	//			mysqli_close($conn);
				// $conn = mysqli_connect($servername, $username, $password, $db_name);
				mysqli_select_db($conn,"rush");
				// if (!$conn) {
				//     die("Connection failed: " . mysqli_connect_error());
				// }
	    		$sql = "create table user (
					id smallint not null auto_increment,
					login char(255) not null,
					passwd char(255) not null,
					rights smallint not null,
					primary key (id))engine=innodb;";
				if (!mysqli_query($conn, $sql))
				{
    				echo "Error creating table: " . mysqli_error($conn);
				}
				$sql = "create table products (
					id smallint not null auto_increment,
					name char(255) not null,
					cat char(255) not null,
					cat2 char(255) not null,
					prix char(255) not null,
					img char(255) not null,
					label text(500) not null,
					stock smallint not null,
					primary key (id))engine=innodb;";
				if (!mysqli_query($conn, $sql))
				{
    				echo "Error creating table: " . mysqli_error($conn);
				}
				$sql = "create table cmd (
					id smallint not null auto_increment,
					item text(4096) not null,
					orderdate timestamp,
					orderwho char(255) not null,
					primary key (id))engine=innodb;";
				if (!mysqli_query($conn, $sql))
				{
    				echo "Error creating table: " . mysqli_error($conn);
				}
				$sql = "create table cat (
					id smallint not null auto_increment,
					name char(255) not null,number char(1) not null,
					primary key (id))engine=innodb;";
				if (!mysqli_query($conn, $sql))
				{
    				echo "Error creating table: " . mysqli_error($conn);
				}
				$sql = "INSERT INTO `user` (`login`, `passwd`, `rights`) VALUES
					('admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 2),
			 		('jbulant', '6a4a35c72439cd36684fdcd17fd9660ad5ea9478fa0b6917da47066b5736f59f3ae2ac34c12b6147725e0738c8f9ee596fcb6847fb22a9831f1027bed49bde9b', 0);";
				if (!mysqli_query($conn, $sql)) {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = $sql = "INSERT INTO `products` (`name`, `cat`, `cat2`, `prix`, `img`, `label`, `stock`) VALUES
					('Petit caillou', 'Petit', 'Caillou', '22', 'petitcaillou.jpg', 'Magnifique caillou', 5),
					('Moyen caillou', 'Moyen', 'Caillou', '2', 'moyen_caillou.jpg', 'Caillou de taille moyenne', 7),
					('Gros caillou', 'Gros', 'Caillou', '55', 'gros_caillou.jpg', 'MAgnifique Gros caillou', 1),
					('Enorme caillou', 'Enorme', 'Caillou', '500', 'enorme_caillou.jpg', 'Magnifique caillou', 2),
					('petit gravier', 'Petit', 'Gravier', '45', 'petit_gravier.jpg', 'Gravier, il est petit', 7),
					('Moyen gravier', 'Moyen', 'Gravier', '5', 'gros_gravier.png', 'Le gravier est gros !', 3);";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO `cmd` (`item`, `orderdate`, `orderwho`) VALUES
					('a:3:{i:0;a:3:{s:7:\"article\";s:12:\"Gros caillou\";s:3:\"qty\";i:2;s:4:\"prix\";i:55;}i:1;a:3:{s:7:\"article\";s:13:\"Moyen caillou\";s:3:\"qty\";i:2;s:4:\"prix\";i:2;}i:2;a:3:{s:7:\"article\";s:14:\"Enorme caillou\";s:3:\"qty\";i:7;s:4:\"prix\";i:500;}}', '2018-04-01 19:12:29', 'vguerand');";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				$sql = "INSERT INTO `cat` (`name`, `number`) VALUES
					('Galet noir', '2'),
					('Caillou', '2'),
					('Gravier', '2'),
					('Petit', '1'),
					('Moyen', '1'),
					('Gros', '1'),
					('Enorme', '1');";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	mysqli_close($conn);
}
?>
