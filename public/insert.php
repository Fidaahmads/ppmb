<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        // $conn = mysqli_connect("localhost", "root", "", "idbc");

        include 'connect.php';
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $namapertama =  $_POST['namapertama'];
        $namaterakhir = $_POST['namaterakhir'];
        $tanggallahir =  $_POST['tanggallahir'];
        $nomorhp = $_POST['nomorhp'];
        $alamatemail = $_POST['alamatemail'];
		$lulusan = $_POST['lulusan'];
		$motivasi = $_POST['motivasi'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO `mitq` (`id`, `namapertama`, `namaterakhir`, `tanggallahir`, `nomorhp`, `alamatemail`, `lulusan`, `motivasi`) VALUES (NULL, '$namapertama', '$namaterakhir', '$tanggallahir', '$nomorhp', '$alamatemail', '$lulusan', '$motivasi')";
         
		 $conn->query($sql);
        
         header ('location:contact.php')
        // Close connection
     
        ?>
</body>
 
</html>