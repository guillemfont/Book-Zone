<?php
echo '
<main class="clientMain">

    <h3>Pedidos de <span class="clientName">' . $clientName . '</span></h3>
    <hr class="clientLine">
    <table class="clientTable">
        <tr>
            <th>Pedido</th>
            <th>Enviado</th>
            <th>Estado</th>
        </tr>';
if("1" == 1){

    echo '<tr>
    <td>"Pedido"</td>
    <td>"Enviado"</td>
    <td>"Estado"</td>
    </tr>';



} else {
    ?>
    
    
    <?php



}
echo '</table></main>';
?>