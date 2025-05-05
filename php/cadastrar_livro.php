<?php 
$capa_nome = $_FILES['capa']['name'];
move_uploaded_file($_FILES['capa']['tmp_name'], "../img/" . $capa_nome);

?>