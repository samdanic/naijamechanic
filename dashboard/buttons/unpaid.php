<?php
?>
<script>alert("hey")</script>
<?php
	include '../../database.php';
    $db = new DBController();

// get value of row to activate
if(isset($_GET['pay']))
{
	// get details
	$pay = $_GET['pay'];

	// execute command
	$query = $db->conn->prepare("UPDATE member_register SET payment_check='PAID' WHERE id=:pay");
	// bind parameters
	$query->bindParam(":pay", $pay);
	// finally execute command
	$query->execute();

	// return to page if query executed correctly
	if($query)
	{
		header('location: ../allmembers.php');
	}
}
?>
