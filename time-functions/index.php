<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dates</title>
</head>
<body>
    <h2>Date Change</h2>

    <?php

    $dateString = "10:35:25 pm 21 January 1904";
    $timestamp = strtotime($dateString);

    // Bulgarian month names
    $bulgarianMonths = [
        'January' => 'Януари',
        'February' => 'Февруари',
        'March' => 'Март',
        'April' => 'Април',
        'May' => 'Май',
        'June' => 'Юни',
        'July' => 'Юли',
        'August' => 'Август',
        'September' => 'Септември',
        'October' => 'Октомври',
        'November' => 'Ноември',
        'December' => 'Декември'
    ];

    $day = date("d", $timestamp);
    $monthEnglish = date("F", $timestamp);
    $monthBulgarian = $bulgarianMonths[$monthEnglish];
    $year = date("Y", $timestamp);
    $time = date("h:i:s a", $timestamp);

    echo "<p><strong>Result:</strong> $day $monthBulgarian $year, $time</p>";
    ?>
</body>
</html>
