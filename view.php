<?php
require "db.php";

function caesarDecrypt($text, $shift = 3){
    $result = "";
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) {
            $code = ord($char);
            $base = ($code >= 97) ? 97 : 65;
            $char = chr((($code - $base - $shift + 26) % 26) + $base);
        }
        $result .= $char;
    }
    return $result;
}

$query = mysqli_query($connection, "SELECT * FROM patients");
?>

<h2>Decrypted Patient List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name (Decrypted)</th>
        <th>Age</th>
        <th>Disease (Decrypted)</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= caesarDecrypt($row['name']) ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= caesarDecrypt($row['disease']) ?></td>
        </tr>
    <?php } ?>
</table>
