<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HostApp</title>
    <link rel="stylesheet" type="text/css" href="<?php print HTTP; ?>vista/css/style.css">
    <style>
    /*
 Estilos globales
 */

  /*  * {
        margin: 0;
        padding: 0;
        border: 0;
    }

    .fieldsForm {
        height: 35px;
    }

    .aviso {
        height: 35px;
        padding-bottom: 3%;
        color: red;
    }

    /*
Estilo para elemento html
*/

    /*html {
        background-image: linear-gradient(#f5fafaf8, #f7ebeb);
    }

    .tabla {
        width: 100%;
        border: 1px solid black;
    }

    .btn {
        background-color: rgb(75, 129, 245);
        color: black;
        padding: 10px 20px;
        display: inline-block;
        text-decoration: none;
    }

    .btn:hover {
        background-color: rgb(110, 148, 230);
        color: white;
    }

    .main-nav a label {
        margin: 10px;
        border-radius: 5px;
        height: 10%;
        display: block;
        padding: 1%;
        text-decoration: none;
    }

    /*
Estilo para elemento body
*/

    /*body {
        font-family: Verdana, Geneva, sans-serif;
        font-weight: bold;
        border-radius: 10px;
        color: rgb(46, 42, 42);
    }

    /*
Estilo para elemento header
*/

    /*.principal {
        display: flex;
        flex-direction: column;
        width: 50%;
    }

    header {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: stretch;
        color: rgb(46, 42, 42);
        width: 98%;
        height: 0%;
        border-radius: 10px;
        margin: 1%;
    }

    .wraper {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        margin: 1%;
    }

    .wraper_reserva {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
        padding: 10px;
        margin: 1%;
    }

    .formSinLogin {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 98%;
        height: 20%;
        margin-top: 10px;
        color: rgb(46, 42, 42);
        border-radius: 10px;
        margin: 1%;
    }

    .wraper_modificar {
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 10px;
        margin: 1%;
    }

    .wraper_form {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        margin: 1%;
        width: 100%;
    }

    section {
        float: left;
        width: 98%;
        height: 30%;
        padding: 10px;
        margin-top: 10px;
        color: rgb(46, 42, 42);
        border-radius: 10px;
        margin: 1%;
    }

    .section_controles {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 98%;
        height: 20%;
        margin-top: 10px;
        color: rgb(46, 42, 42);
        border-radius: 10px;
        margin: 1%;
    }

    /*
Estilo para elemento footer
*/

   /* footer {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-top: 1%;
        width: 98%;
        clear: both;
        border-radius: 10px;
        margin: 1%;
    }

    #submit {
        font-weight: bold;
        cursor: pointer;
        padding: 5px;
        margin: 0 10px 20px 0;
        border: 1px solid #ccc;
        background: #eee;
        border-radius: 8px 8px 8px 8px;
    }

    #submit_a {
        font-weight: bold;
        cursor: pointer;
        padding: 5px;
        margin: 0 10px 20px 0;
        border: 1px solid #ccc;
        background: 41, 243, 14;
        border-radius: 8px 8px 8px 8px;
    }

    #submit:hover {
        background-color: rgb(71, 140, 219);
        color: white;
    }

    .main-nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 15%;
    }

    table {
        width: 100%;
        border: 1px solid #000;
    }

    th,
    td {
        width: 25%;
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        border-spacing: 0;
        background-color: rgb(19, 193, 38);
        ;
    }

    h1,
    h2,
    h3 {
        width: 100%;
        text-align: center;
    }

    aside {
        position: relative;
        height: 80%;
        width: 30%;
        float: left;
        border-radius: 10px;
        margin: 1%;
    }

    .productosAside {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 50%;
    }

    .form1 {
        display: flex;
        flex-direction: column;
        padding: 10%;
        width: 80%;
        height: 100%;
    }

    .formLogin {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 35%;
        height: 70%;
        padding: 1%;
    }

    .formLogin2 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 60%;
        height: 70%;
        padding: 2%;
    }

    .formLoginModificar {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 60%;
        height: 70%;
        padding: 1%;
    }

    .controles {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 40%;
        height: 70%;
    }

    .formRegistrate {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
        height: 100%;
    }

    /*header {
        flex-direction: column;
        height: 15%;
    }*/

   /* .control_central {
        float: right;
        display: flex;
        flex-direction: column;
        height: 50%;
        width: 65%;
    }

    .muestraReservas {
        width: 80%;
    }

    .contenedorReservas {
        display: flex;
        justify-content: center;
    }

    .menuNav {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: end;
        width: 100%;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    /**CARTA */
      /*FRestaurante*/
    
    /*.wrap {
        max-width: 100%;
        margin: 0 auto;
    }
    
    .column-2.carta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 1rem;
        row-gap: 1rem;
    }
    
    .plato-carta {
        display: flex;
        align-items: center;
        width: 100%;
        border: 1px solid #e5e5e5;
        border-radius: 6px;
    }
    
    .img-plato-carta {
        display: flex;
        flex-basis: 25%;
        justify-content: center;
    }
    
    .img-plato-carta img {
        max-width: 100px;
        max-height: 75px;
    }
    
    .title-plato-carta {
        border: 1px solid #e5e5e5;
        border-bottom: none;
        border-top: none;
        flex-basis: 60%;
        padding: 0 1rem;
    }
    
    .precio-plato-carta {
        display: flex;
        flex-basis: 15%;
        justify-content: center;
        font-weight: bold;
    }
    
    /*
Estilo e imagen para elemento con class seccion1
*/
/*.parallax {
    background: #fff fixed no-repeat 50% 50%;
    background-size: cover;
}
#section1 {
    background-image: url('./vista/res/img_1.jpg');

 
}

    @media (max-width:680px) {
        .column-2.carta {
            grid-template-columns: repeat(1, 1fr);
        }
    }*/
    </style>
</head>

<body>


    <!--<section>
        <div class="wraper">
            <div class="avisos">
                <h3>Lunes</h3>
                <br>
                <ul>
                    <li>Primero
                        <ul>
                            <li>Primero Uno</li>
                        </ul>
                    <li>Segundo
                        <ul>
                            <li>Segundo Uno</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="avisos">
                <h3>Martes</h3>
                <br>
                <ul>
                    <li>Primero
                        <ul>
                            <li>Primero Uno</li>
                        </ul>
                    <li>Segundo
                        <ul>
                            <li>Segundo Uno</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="avisos">
                <h3>Miercoles</h3>
                <br>
                <ul>
                    <li>Primero
                        <ul>
                            <li>Primero Uno</li>
                        </ul>
                    <li>Segundo
                        <ul>
                            <li>Segundo Uno</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="avisos">
                <h3>Jueves</h3>
                <br>
                <ul>
                    <li>Primero
                        <ul>
                            <li>Primero Uno</li>
                        </ul>
                    <li>Segundo
                        <ul>
                            <li>Segundo Uno</li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <div class="avisos">
                <h3>Viernes</h3>
                <br>
                <ul>
                    <li>Primero
                        <ul>
                            <li>Primero Uno</li>
                        </ul>
                    <li>Segundo
                        <ul>
                            <li>Segundo Uno</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>-->