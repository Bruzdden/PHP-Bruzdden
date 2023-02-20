<?php

class DataTypes {

private $attributes = [];

public function setDataType($name, $value) {
  if ($name == 'intDataType' && !is_int($value)) {
    echo "Error: intDataType should be of type int.<br />";
  } elseif ($name == 'floatDataType' && !is_float($value)) {
    echo "Error: floatDataType should be of type float.<br />";
  } elseif ($name == 'stringDataType' && !is_string($value)) {
    echo "Error: stringDataType should be of type string.<br />";
  } elseif ($name == 'objectDataType' && !is_object($value)) {
    echo "Error: objectDataType should be of type object.<br />";
  } elseif ($name == 'arrayDataType' && !is_array($value)) {
    echo "Error: arrayDataType should be of type array.<br />";
  } elseif ($name == 'booleanDataType' && !is_bool($value)) {
    echo "Error: booleanDataType should be of type boolean.<br />";
  } else {
    $this->attributes[$name] = $value;
  }
}

public function __get($name) {
  return $this->attributes[$name] ?? null;
}
}

$dt = new DataTypes();

$dt->setDataType('intDataType', 143.5);
$dt->setDataType('floatDataType', 456.789);
$dt->setDataType('stringDataType', true);
$dt->setDataType('objectDataType', (object) ['name' => 'John Doe']);
$dt->setDataType('arrayDataType', [1, 2, 3, 4, 5]);
$dt->setDataType('booleanDataType', true);

echo "Int: " . $dt->intDataType . "<br />";
echo "Float: " . $dt->floatDataType . "<br />";
echo "String: " . $dt->stringDataType . "<br />";
echo "Object: " . var_export($dt->objectDataType, true) . "<br />";
echo "Array: " . var_export($dt->arrayDataType, true) . "<br />";
echo "Boolean: " . var_export($dt->booleanDataType, true) . "<br /><br />";

?>
