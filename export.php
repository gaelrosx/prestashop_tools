<?php
	   ini_set('display_errors', '1');

	   error_reporting(E_ALL ^ E_NOTICE);
    

	//header('Content-type:application/xls');
	//header('Content-Disposition: attachment; filename=products_actives.xlsx');

	require_once('libs/query.php');
	//$conn=new Conexion();
	//$link = $conn->conectarse();

	//$query="select * from  view_metas_products_actives";
	//$result=mysqli_query($link, $query);
	$query = new Query();

	$result = $query->producs_actives();

?>

<table border="1">
	<tr style="background-color:red;">
		<th>ID</th>
		<th>Name</th>
		<th>Meta Title</th>
		<th>Meta Description</th>
		<th>Activo</th>
	</tr>
	<?php
	
		while ($row = $result->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['id_product']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['meta_title']; ?></td>
					<td><?php echo $row['meta_description']; ?></td>
					<td><?php echo $row['activo']; ?></td>
				</tr>	

			<?php
		} 

	?>
</table>