<?php
// A company has three employees whose monthly income is given below:
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




$array =['']

foreach($array as $index){
    print($index['location']);
}
// Write a function that takes the gross month income for an employee and returns an array containing the following:
// -- the taxable income
// -- the tax due
// -- the net income
// -- the percentage of tax paid relative to the gross income

function calculateTax($grossMonthlyIncome) {
    // An employee's monthly income is taxed as follows:
    // -- no tax on all income below the low tax threshold
    // -- tax at low tax rate on income between the low and high tax thresholds
    // -- tax at high tax rate for all income above the high tax threshold
    $lowTaxRate = 0.2;
    $highTaxRate = 0.4;
    $lowTaxThreshold = 1000;
    $highTaxThreshold = 3000;

    return [
        'taxableIncome' => number_format($taxableIncome, 2),
        'taxDue' => number_format($taxDue, 2),
        'netIncome' => number_format($netIncome, 2),
        'percentageTaxPaid' => number_format($percentageTaxPaid, 2)
    ];
}

// For each employee, print the following information:
// -- the employee's name
// -- the employee's gross monthly income
// -- the taxable income
// -- the tax due
// -- the net income
// -- the percentage of tax paid relative to the gross income
foreach ($employees as $employee) {
}
?>