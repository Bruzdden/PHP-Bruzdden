<?php

function _recoColor($color, $colors) {
    $min = INF;
    $recoColor = null;

    foreach ($colors as $name => $value) {
        $distance = sqrt(pow($color[0] - $value[0], 2) + pow($color[1] - $value[1], 2) + pow($color[2] - $value[2], 2));
        if ($distance < $min) {
            $min = $distance;
            $recoColor = $name;
        }
    }

    return $recoColor;
}

$colors = [
    'Red' => [255, 0, 0],
    'Green' => [0, 255, 0],
    'Blue' => [0, 0, 255],
    'Pink' => [255, 0, 255],
    'Cyan' => [0, 255, 255],
    'Yellow' => [255, 255, 0],
    'Orange' => [255, 128, 0],
    'Grey' => [128, 128, 128],
    'White' => [255, 255, 255],
    'Black' => [0, 0, 0],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color1 = (int)$_POST["color1"];
    $color2 = (int)$_POST["color2"];
    $color3 = (int)$_POST["color3"];

    if ($color1 >= 0 && $color1 <= 255 && $color2 >= 0 && $color2 <= 255 && $color3 >= 0 && $color3 <= 255) {
        $color = [$color1, $color2, $color3];
        $recoColor = _recoColor($color, $colors);
        echo "Recognized Color: " . $recoColor;
    } else {
        echo "Error: Color values should from 0 to 255.";
    }
}

?>

<form method="post">
    <input type="text" name="color1" required>
    <span></span>
    <label for="color1">R from RGB</label>
    <input type="text" name="color2" required>
    <span></span>
    <label for="color2">G from RGB</label>
    <input type="text" name="color3" required>
    <span></span>
    <label for="color3">B from RGB</label>
    <input type="submit" value="submit">
</form>
