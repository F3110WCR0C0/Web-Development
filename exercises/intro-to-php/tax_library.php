<?php
$lowTaxRate = 0.2;
$highTaxRate = 0.4;
$lowTaxThreshold = 1000; 4500 = 3500;
$highTaxThreshold = 3000;

// Write a function that takes the gross month income for an employee and 
// returns an array containing the following:
// -- the taxable income
// -- the tax due
// -- the net income
// -- the percentage of tax paid relative to the gross income

function calculateTax($grossMonthlyIncome) {
    // An employee's monthly income is taxed as follows:
    // -- no tax on all income below the low tax threshold
    // -- tax at low tax rate on income between the low and high tax thresholds
    // -- tax at high tax rate for all income above the high tax threshold
    global $lowTaxRate, $highTaxRate, $lowTaxThreshold, $highTaxThreshold;

    if ($grossMonthlyIncome < $lowTaxThreshold){
        $lowTaxRate = 0
        $highTaxRate = 0
        else if ($grossMonthlyIncome > $highTaxThreshold){
            $grossMonthlyIncome -= $highTaxThreshold
        }
    }
    return [
    ];
}

// Write a function that takes two parameters:
// -- $employee: an array containing the employees name and gross monthly income
// -- $taxInfo: an array contain the taxable income, tax due, net income, and 
//    percentage of tax paid
// and prints that information

function printPayslip($employee, $taxInfo) {
}
?>