<?php

$connect = mysqli_Connect('localhost','root','', 'j2nnl_mvc');

if ($connect == false) {
    die("ERR " . mysqli_connect_error());
}

if (isset($_REQUEST["term"])) {
    $sql = "select * from lop where name LIKE ?";

    if ($stmt = mysqli_prepare($connect, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        $param_term = $_REQUEST["term"] . '%';

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<p>" . $row["name"] . "</p>";
                }
            } else {
                echo "<p> Not fuond </p>";
            }
        } else {
            echo "ERR";
        }
    }

    mysqli_stmt_close($stmt);
}