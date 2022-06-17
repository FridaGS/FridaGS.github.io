<?php

    function hashPassword($password){
        $hash = sha1($password);
        return $hash;
    }

    function registraAlumno($nombre, $mail, $telefono, $boleta, $pass_hash){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO usuario (nombre, email, telefono, boleta, password) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $nombre, $mail, $telefono, $boleta, $pass_hash);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
    }

    function registraDocente($nombre, $mail, $telefono, $matricula, $pass_hash){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO maestros (nombredoc, emaildoc, telefonodoc, matriculadoc, passworddoc) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiis", $nombre, $mail, $telefono, $matricula, $pass_hash);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
    }

    function registraProtocolo($titulo, $resumen, $semestre, $alum, $est){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO protocolos (titulo, resumen, semestre, id_alumno1, id_estatus1) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii", $titulo, $resumen, $semestre, $alum, $est);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function registraIntegrante($nombrei, $emaili, $boletai){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO integrantes (nombreint, emailint, boletaint) VALUES (?,?,?)");
        $stmt->bind_param("sss", $nombrei, $emaili, $boletai);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function registraEmociones($user, $namor, $nmiedo, $nenojo, $ntristeza, $nfelicidad, $nsorpresa, $nrepugnancia){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO emociones (id_usuario2, id_amor1, id_miedo1, id_enojo1, id_tristeza1, id_felicidad1, id_sorpresa1, id_repugnancia1) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iiiiiiii", $user, $namor, $nmiedo, $nenojo, $ntristeza, $nfelicidad, $nsorpresa, $nrepugnancia);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function registraAdmin($nombrea, $matriculaa, $pass_hash){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO administradores (nombreadmin, matriculaadmin, passadmin) VALUES (?,?,?)");
        $stmt->bind_param("sis", $nombrea, $matriculaa, $pass_hash);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function asignaDoc($titulopr, $nombredoc, $rango){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO prodoc (id_protocolo1, id_maestro2, tipodoc) VALUES (?,?,?)");
        $stmt->bind_param("iis", $titulopr, $nombredoc, $rango);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function asignaTut($nomalutut, $nomdoctut){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO aludoc (id_alumno2, id_maestro1) VALUES (?,?)");
        $stmt->bind_param("ii", $nomalutut, $nomdoctut);

        if($stmt->execute()){
            return $mysqli->insert_id;
        } else {
            return 0;
        }
        
    }

    function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

    function isNullLogin($boleta, $password){
		if(strlen(trim($boleta)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}


?>