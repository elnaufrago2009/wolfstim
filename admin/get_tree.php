<?php 
	

	$id	=	$_GET['user_id'];

	// conexion
	include('../conn.php');

	//consulta
	$sql_tree = "
	select	
	case when (tu.dni != 0) then 'true' else 'false' end tu_estado, SUBSTR(tu.nombre,1,20) tu_nombre, tu.id tu_id, case when tu.activo=1 then 'Activo' when tu.activo=2 then 'Para Eliminar' else 'No Activo' end tu_activo,
	case when (hijo1.dni != 0) then 'true' else 'false' end hijo1_estado, SUBSTR(hijo1.nombre,1,13) hijo1_nombre, hijo1.id hijo1_id, case when hijo1.activo=1 then 'Activo' when hijo1.activo=2 then 'Para Eliminar' else 'No Activo' end hijo1_activo,
	case when (hijo2.dni != 0) then 'true' else 'false' end hijo2_estado, SUBSTR(hijo2.nombre,1,13) hijo2_nombre, hijo2.id hijo2_id, case when hijo2.activo=1 then 'Activo' when hijo2.activo=2 then 'Para Eliminar' else 'No Activo' end hijo2_activo,
	case when (hijo3.dni != 0) then 'true' else 'false' end hijo3_estado, SUBSTR(hijo3.nombre,1,13) hijo3_nombre, hijo3.id hijo3_id, case when hijo3.activo=1 then 'Activo' when hijo3.activo=2 then 'Para Eliminar' else 'No Activo' end hijo3_activo,
	case when (hijo4.dni != 0) then 'true' else 'false' end hijo4_estado, SUBSTR(hijo4.nombre,1,13) hijo4_nombre, hijo4.id hijo4_id, case when hijo4.activo=1 then 'Activo' when hijo4.activo=2 then 'Para Eliminar' else 'No Activo' end hijo4_activo
	from usuarios tu	
	left join usuarios hijo1 on hijo1.id = tu.arbol_hijo1
	left join usuarios hijo2 on hijo2.id = tu.arbol_hijo2
	left join usuarios hijo3 on hijo3.id = tu.arbol_hijo3
	left join usuarios hijo4 on hijo4.id = tu.arbol_hijo4
	where tu.id='$id'
	";
	$sql_tree = $conn->query($sql_tree)->fetch_array(MYSQLI_ASSOC);

	echo json_encode($sql_tree);
?>