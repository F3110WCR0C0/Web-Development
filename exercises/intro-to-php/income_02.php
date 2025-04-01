<?php
// An employee's monthly income is taxed as follows:
// -- no tax on all income below the low tax threshold
// -- tax at low tax rate on income between the low and high tax thresholds
// -- tax at high tax rate for all income above the high tax threshold
$lowTaxRate = 0.2;
$highTaxRate = 0.4;
$lowTaxThreshold = 1000;
$highTaxThreshold = 3000;

// An employee's monthly income is given below:
$grossMonthlyIncome = 4500;
// This employee has worked for twelve months (Jan 2024-Dec 2024).
// print a table with the following columns:


$monthList = ["January ", "Febuary ", "March ", "April ", "May ", "June ", "July ", "August ", "September ", "October ", "November ", "December "];
$lowTaxable = 2000;
$highTaxable = 1500;
$lowTax = $lowTaxable * $lowTaxRate;
$highTax = $highTaxable * $highTaxRate;
$taxDue = $lowTax + $highTax;
$netIncome = $grossMonthlyIncome - $taxDue;
$yearTax = $taxDue * 11;
$netYearIncome = $netIncome * 11;



/*
if ($grossMonthlyIncome > $lowTaxThreshold && $grossMonthlyIncome <= $highTaxThreshold{

}

*/




// -- month 
foreach($monthList as $month) {
    print($month);
}
// -- gross income for the month
print("<p>Gross income in Jan: $$grossMonthlyIncome </p>");
// -- taxable income for the month
print("<p>Taxable income: Low Tax treshold- $$lowTaxable, High Tax Threshold- $$highTaxable </p>");
// -- tax due for the month
print("<p>Tax due for the month: $$taxDue </p>");
// -- cumulative tax for the year so far
print("<p>Cumulative tax for the year so far: $$yearTax </p>");
// -- net income for the month
print("<p>Net Income for the month so far: $$netIncome </p>");
// -- cumulative net income for the year so far
print("<p>Net Income for the year so far: $$netYearIncome </p>");
?>



