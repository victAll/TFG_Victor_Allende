<?php 
/**
 * formatea valores en decimal
 */
/*function format_decimal($valor)
{
        $float_redondeado = round($valor * 100) / 100;
        return $float_redondeado;
}*/

/*https://fernando-gaitan.com.ar/aprendiendo-php-parte-18-validar-formularios/
  Valida el campo email
*/
function validaEmail($valor)
{       //FILTER_VALIDATE_EMAIL Constante de PHP
        if (filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE) {
                return false;
        } else {
                return true;
        }
}

/*
Valida caracteres en texto
*https://es.stackoverflow.com/questions/453683
 *
 / = Delimitador de la expresión regular, define el inicio y el fin.
[] = Definición de una clase, el carácter puede ser cualquiera de los valores que se encuentran definidos dentro de la clase.
a-z = Rango de letras desde la a hasta la z, seria lo mismo que escribir abcdefg...
A-Z = Rango de letras desde la A hasta la Z, lo mismo que antes pero en mayusculas
\s = El equivalente a un carácter de tipo espacio
ñáéíóúÁÉÍÓÚ = caracteres que no están incluidos en a-z y A-Z, para que la expresión coincida cuando estén estos caracteres.
^ = Define que la expresión debe aplicar desde el comienzo de la cadena
$ = Define que la expresión debe aplicar hasta el final de la cadena
{4,} requiere de una cadena de al menos 4 caracteres
 */
function isValidText($text)
{
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]{4,}$/";
        return preg_match($pattern, trim($text));
}

/**
 * Valida password vacío o longitud < 4
 */
function isSetText($password)
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
 * Calcular modulo online
 * https://miniwebtool.com/es/modulo-calculator/
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
                //EJEMPLO DE USO substr
                //substr(string $string, int $offset, ?int $length):
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
        if (!isSetText($password)) {
                $errores = $errores . " Password incorrecto mínimo 4 caracteres <br>";
        }
        return $errores;
}

/**
 * Funcion para validar una reserva
 */
function validateReserva($nombre, $apellido, $email){
        $errores = null;
        if (!validaEmail($email)) {
                $errores = "Correo electrónico incorrecto <br>";
        }
        if (!isValidText($nombre)) {
                $errores = $errores . " Nombre incorrecto  ";
        }
        if (!isValidText($apellido)) {
                $errores = $errores . " Apellido incorrecto  <br>";
        }
        return $errores;
}

/**
 * Funcion para validar una actualización reserva
 */
function validateUpdateReserva($nombre, $email){
        $errores = null;
        if (!validaEmail($email)) {
                $errores = "Correo electrónico incorrecto <br>";
        }
        if (!isValidText($nombre)) {
                $errores = $errores . " Nombre incorrecto  ";
        }
        
        return $errores;
}

/**
 * Funcion para validar una actualización reserva
 */
function validateMenu($nombre, $entrante, $principal, $precio){
        $errores = null;
        if (!isSetText($nombre)) {
                $errores = $errores . " Nombre incorrecto  ";
        }
        if (!isSetText($entrante)) {
                $errores = $errores . " Entrante incorrecto  ";
        }
        if (!isSetText($principal)) {
                $errores = $errores . " Principal incorrecto  ";
        }
        
        return $errores;
}


