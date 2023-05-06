<?php function format_decimal($valor)
{
        $float_redondeado = round($valor * 100) / 100;
        return $float_redondeado;
}

/*https://fernando-gaitan.com.ar/aprendiendo-php-parte-18-validar-formularios/*/
function validaEmail($valor)
{
        if (filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE) {
                return false;
        } else {
                return true;
        }
}

/**https://es.stackoverflow.com/questions/453683
 *
 / = Delimitador de la expresión regular, define el inicio y el fin.
[] = Definición de una clase, el carácter puede ser cualquiera de los valores que se encuentran definidos dentro de la clase.
a-z = Rango de letras desde la a hasta la z, seria lo mismo que escribir abcdefg...
A-Z = Rango de letras desde la A hasta la Z, lo mismo que antes pero en mayusculas
\s = El equivalente a un carácter de tipo espacio
ñáéíóúÁÉÍÓÚ = caracteres que no están incluidos en a-z y A-Z, para que la expresión coincida cuando estén estos caracteres.
^ = Define que la expresión debe aplicar desde el comienzo de la cadena
$ = Define que la expresión debe aplicar hasta el final de la cadena
+ = repetirá la clase de caracteres para buscar coincidencias UNA o más veces, si quieres considerar cadenas vacías como validas puedes cambiar el + por un *.
{5,} requiere de una cadena de al menos 5 caracteres
 */
function isValidText($text)
{
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]{4,}$/";
        return preg_match($pattern, trim($text));
}

function isValidPass($password)
{       $valid = true;
        if(!isset($password)  || strlen($password) < 4){
                $valid = false;
        }
       return $valid;
}

/**
 * Funcion para validar el dni
 * Origen de información:
 * https://www.jose-aguilar.com/blog/validar-dni-php/
 */
function validateDni($dni)
{
        //validar longitug  && validar que la 9 posicion es -
        if (strlen($dni) == 10 && strpos($dni, '-') !== false) {

                $arNumLetras = explode('-', $dni);
                $numeros = $arNumLetras[0]; //nos quedamos con los numeros del dni
                $letra = strtoupper($arNumLetras[1]); //nos quedamos con la letra del dni
                //formula para encontrar la letra
                //resto de los numeros del dni / 23 tiene que ser el numero de la letra final del dni
                if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra) {
                        return true;
                } else {
                        return false;
                }
        } else {
                return false;
        }
}

/**
 * Funcion para validar datos del formulario de registro
 */
function validateRegistro($nombre, $apellido, $dni, $correo, $password)
{
        $errores = null;
        if (!validaEmail($correo)) {
                $errores = "Correo electrónico incorrecto <br>";
        }
        if (!isValidText($nombre)) {
                $errores = $errores . " Nombre incorrecto  <br>";
        }
        if (!isValidText($apellido)) {
                $errores = $errores . " Apellido incorrecto  <br>";
        }
        if (!validateDni($dni)) {
                $errores = $errores . " DNI incorrecto utilice formato: 00000000-X <br>";
        }        
        if (!isValidPass($password)) {
                $errores = $errores . " Password incorrecto mínimo 4 caracteres <br>";
        }
        return $errores;
}

/*function validateLogin($dni,$password){
        $errores = "";
        if (!validateDni($dni)) {
                $errores = $errores . " DNI incorrecto utilice formato: 00000000-X  <br>";
        }        
        if (!isValidPass($password)) {
                $errores = $errores . " Password incorrecto  <br>";
        }
        return $errores;
}*/
