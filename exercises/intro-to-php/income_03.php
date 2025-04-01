<?php
// An employee's monthly income is taxed as follows:
// -- no tax on all income below the low tax threshold
// -- tax at low tax rate on income between the low and high tax thresholds
// -- tax at high tax rate for all income above the high tax threshold
$lowTaxRate = 0.2;
$highTaxRate = 0.4;
$lowTaxThreshold = 1000;
$highTaxThreshold = 3000;

// A company has three employees whose monthly income is given below:
// Alice
$aliceGrossMonthlyIncome = 4500; 
$aliceLowAmount = 2000;
$aliceHighAmount = 1500;
$aliceLowTax = $aliceLowAmount * $lowTaxRate;
$aliceHighTax = $aliceHighAmount * $highTaxRate;
$aliceTaxDue = $aliceLowTax + $aliceHighTax;
$aliceNetIncome = $aliceGrossMonthlyIncome - $aliceTaxDue;
$alicePercentageTaxPaid = $aliceTaxDue / $aliceGrossMonthlyIncome * 100;

// Bob
$bobGrossMonthlyIncome = 2500; 
$bobLowAmount = 1500;
$bobLowTax = $bobLowAmount * $lowTaxRate;
$bobTaxDue = $aliceLowTax;
$bobNetIncome = $bobGrossMonthlyIncome - $bobTaxDue;
$bobPercentageTaxPaid = $bobTaxDue / $bobGrossMonthlyIncome * 100;
// Charlie

$charlieGrossMonthlyIncome = 3500; 
$charlieLowAmount = 2000;
$charlieHighAmount = 500;
$charlieLowTax = $charlieLowAmount * $lowTaxRate;
$charlieHighTax = $charlieHighAmount * $highTaxRate;
$charlieTaxDue = $charlieLowTax + $charlieHighTax;
$charlieNetIncome = $charlieGrossMonthlyIncome - $charlieTaxDue;
$charliePercentageTaxPaid = $charlieTaxDue / $charlieGrossMonthlyIncome * 100;


$employees = [
    [
        'name' => 'Alice',
        'grossMonthlyIncome' => 4500
    ],
    [
        'name' => 'Bob',
        'grossMonthlyIncome' => 2500
    ],
    [
        'name' => 'Charlie',
        'grossMonthlyIncome' => 3500
    ]
];




// For each employee, print the following information:
// -- the employee's name
foreach($employees as $employee){
    $name = $employee['name'];
    print("<p>$name<br></p>");
    
}
// -- the employee's gross monthly income
print("<p> Alice's gross monthly income: $$aliceGrossMonthlyIncome </p>");
print("<p> Bob's gross monthly income: $$bobGrossMonthlyIncome </p>");
print("<p> Charlie's gross monthly income: $$charlieGrossMonthlyIncome </p>");
// -- the taxable income
print("<p> Alice's taxable income: $$aliceLowAmount and $$aliceHighAmount</p>");
print("<p> Bob's taxable income: $$bobLowAmount</p>");
print("<p> Charlie's taxable income: $$charlieLowAmount and $$charlieHighAmount</p>");
// -- the tax due
print("<p> Alice's tax due: $$aliceTaxDue </p>");
print("<p> Bob's tax due: $$bobTaxDue </p>");
print("<p> Charlie's tax due: $$charlieTaxDue </p>");
// -- the net income
print("<p> Alices's net income: $$aliceNetIncome </p>");
print("<p> Bob's net income: $$bobNetIncome </p>");
print("<p> Charlie's net income: $$charlieNetIncome </p>");
// -- the percentage of tax paid relative to the gross income
print("<p> Alice's percentage of tax paid relative to gross income: $alicePercentageTaxPaid %</p>");
print("<p> Bob's percentage of tax paid relative to gross income: $bobPercentageTaxPaid %</p>");
print("<p> Charlie's percentage of tax paid relative to gross income: $charliePercentageTaxPaid %</p>");

?>