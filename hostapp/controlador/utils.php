<?php function format_decimal($valor) {
        $float_redondeado=round($valor * 100) / 100;
        return $float_redondeado;
}?>