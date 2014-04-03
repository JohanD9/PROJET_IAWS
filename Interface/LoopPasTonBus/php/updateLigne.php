<?php
exec ( "java -jar ./../jar/gestionBus.jar", $html );
foreach ( $html as $value )
	echo $value . " ";
?>