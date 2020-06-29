<h1>MyDot Coffee</h1>
<form method="post">
    Number of bags:
    <input type="text" name="bagNo">
    <br>
    <input type="submit">
</form>
<?php
$bagNo = isset($_POST['bagNo']) ? $_POST['bagNo'] : 0;
$discount = 0;
//$discArray = array(300 => 0.3, 200 => 0.25, 150 => 0.2, 100 => 0.15, 50 => 0.1, 25 => 0.5, 0 => 0);
if($bagNo >= 300)
    $discount = 0.3;
else if($bagNo >= 200)
    $discount = 0.25;
else if($bagNo >= 150)
    $discount = 0.2;
else if($bagNo >= 100)
    $discount = 0.15;
else if($bagNo >= 50)
    $discount = 0.1;
else if($bagNo >= 25)
    $discount = 0.05;
else
    $discount = 0;
$totalCost = $bagNo * 5.5;
$discountedPrice = $totalCost * $discount;
$finalCost = $totalCost - $discountedPrice;
echo "Price for $bagNo bags = RM" . formatPrice($totalCost) . "<br>";
echo "Discount = RM" . formatPrice($discountedPrice) . "<br>";
echo "Total charge = RM" . formatPrice($finalCost) . "<br>";
echo $finalCost > 1000 ? "<b>You will get one free movie ticket :)" : "";

function formatPrice($number){
    return number_format((float)($number), 2, '.', ',');
}
?>

