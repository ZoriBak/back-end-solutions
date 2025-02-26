<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day of the Week</title>
</head>
<body>
    <h2>Day of the Week Based on Number:</h2>

    <?php
        $number = 3;

        switch ($number) {
            case 1:
                echo "monday";
                break;
            case 2:
                echo "tuesday";
                break;
            case 3:
                echo "wednesday";
                break;
            case 4:
                echo "thursday";
                break;
            case 5:
                echo "friday";
                break;
            case 6:
                echo "saturday";
                break;
            case 7:
                echo "sunday";
                break;
            default:
                echo "Invalid number! Please enter a number between 1 and 7.";
        }
    ?>

</body>
</html>
