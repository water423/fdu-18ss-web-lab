<?php

function outputOrderRow($file, $title, $quantity, $price) {
    $amount = $price * $quantity;
    echo "<tr>";
    echo "<td>"."<img src=images/books/tinysquare/".$file.">"."</td>";
    echo "<td style='text-align: left'>".$title."</td>";
    echo "<td>".$quantity."</td>";
    echo "<td>$".$price.".00</td>";
    echo "<td>$".$amount.".00</td>";
    echo "</tr>";
}


?>
