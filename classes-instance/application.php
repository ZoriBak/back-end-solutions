<?php
spl_autoload_register(function ($className) {
    include __DIR__ . '/classes/' . $className . '.php';
});
$percentInstance = new Percent(150, 100);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Percent Calculation</title>
    <style>
        table { border-collapse: collapse; width: 350px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>What percentage is 150 of 100?</h1>
    <table>
        <tr>
            <th>Type</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Absolute</td>
            <td><?= $percentInstance->absolute ?></td>
        </tr>
        <tr>
            <td>Relative</td>
            <td><?= $percentInstance->relative ?></td>
        </tr>
        <tr>
            <td>Whole number</td>
            <td><?= $percentInstance->hundred ?>%</td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td><?= $percentInstance->nominal ?></td>
        </tr>
    </table>
</body>
</html>
