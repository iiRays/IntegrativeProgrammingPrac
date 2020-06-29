<?php
include 'Classes.php"';


$foodArray = array(new Food("F001", "Haiwaiian pizza", 50.00, 1), new Food("F002", "Cheeseburger", 20.00, 5),  new Food("F005", "Apple pie", 60.00, 2));
$stationeryArray = array(new Stationery("S001", "Pencil", 6.00, 7), new Stationery("S002", "Staple", 10.00, 12),  new Stationery("S003", "Eraser", 60.00, 4));
// print table
echo "<table><h3>Food</h3>";
foreach($foodArray as $food){
    echo "<tr>";
    echo "<td>" . $food->getItemCode() ."<td>" . "<td>" . $food->getDescription() ."<td>" . "<td> RM" . formatPrice($food->getPrice()) ."<td>". "<td>" . $food->getUnit() ." units<td>";
    echo "</tr>";
}
echo "</table'>";

echo "<table><h3>Stationery</h3>";
foreach($stationeryArray as $stationery){
    echo "<tr>";
    echo "<td>" . $stationery->getItemCode() ."<td>" . "<td>" . $stationery->getDescription() ."<td>" . "<td> RM" . formatPrice($stationery->getPrice()) ."<td>". "<td>" . $stationery->getWeight() ." grams<td>";
    echo "</tr>";
}
echo "</table'>";

function formatPrice($number){
    return number_format((float)($number), 2, '.', ',');
}