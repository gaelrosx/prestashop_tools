<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=products_inactives.xls');

	require_once('libs/conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="select * from  view_metas_products_inactives";
	$result=mysqli_query($link, $query);
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
		while ($row=mysqli_fetch_assoc($result)) {
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