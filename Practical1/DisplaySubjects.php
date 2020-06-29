
<html>
    <head>
        <style>
            table, th, td {
  border: 1px solid black;
}
        </style>
    </head>
    <body>
        <?php
include 'DBUtil.php"';

echo DBUtil::getAllInTable("subjects");
?>
    </body>
</html>