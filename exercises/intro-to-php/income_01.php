<?php
// Employees are taxed as follows:
// -- no tax on all income below the tax threshold
// -- tax at tax rate on income above the tax threshold
$grossIncome = 100000; #100,000
$taxRate = 0.2;
$taxThreshold = 20000; # 20,000



// Calculate the taxable income
$aboveThreshold = $grossIncome - $taxThreshold;
// Calculate the tax due
$taxDue = $aboveThreshold * $taxRate;
// Calculate the net income
$netIncome = $grossIncome - $taxDue;
// Calculate the percentage of tax paid relative to the gross income
$percentage = $grossIncome / $taxDue;
// Print the results
print("<p>Taxable income: $$aboveThreshold </p>");
print("<p>Tax Due: $$taxDue </p>");
print("<p>Net Income: $$netIncome </p>");
print("<p>Precentage of Tax paid: %$percentage </p>")
?>
