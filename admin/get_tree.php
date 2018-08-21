<?php 
	

	$id	=	$_GET['user_id'];

	// conexion
	include('../conn.php');

	//consulta
	$sql_tree = "
	select 
	case when (padre.dni = 0) then 'false' else 'true' end padre_estado, padre.nombre padre_nombre,
	case when (tu.dni = 0) then 'false' else 'true' end tu_estado, tu.nombre tu_nombre,
	case when (hijo1.dni = 0) then 'false' else 'true' end hijo1_estado, hijo1.nombre hijo1_nombre,
	case when (hijo2.dni = 0) then 'true' else 'false' end hijo2_estado, hijo2.nombre hijo2_nombre,
	case when (hijo3.dni = 0) then 'true' else 'false' end hijo3_estado, hijo3.nombre hijo3_nombre,
	case when (hijo4.dni = 0) then 'true' else 'false' end hijo4_estado, hijo4.nombre hijo4_nombre	
	from usuarios tu
	left join usuarios padre on padre.dni = tu.arbol_padre
	left join usuarios hijo1 on hijo1.dni = tu.arbol_hijo1
	left join usuarios hijo2 on hijo2.dni = tu.arbol_hijo2
	left join usuarios hijo3 on hijo3.dni = tu.arbol_hijo3
	left join usuarios hijo4 on hijo4.dni = tu.arbol_hijo4
	where tu.id='$id'
	";
	$sql_tree = $conn->query($sql_tree)->fetch_array(MYSQLI_ASSOC);

	echo json_encode($sql_tree);
?>