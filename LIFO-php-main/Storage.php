<?php

class Element{
    private static $count = 0;
    public int $id;
    public string $value;

    public function __construct($value){
        $this->id = ++self::$count;
        $this->setValue($value);
    }

    public function setValue(string $value): self {
        $this->value = $value;
        return $this;
    }

    public function getValue(): string{
        return $this->value;
    }

    public function getId(): int{
        return $this->id;
    }

    public static function getCount(): int{
        return self::$count;
    }
}

abstract class MyStorage {
    protected array $data;

    public function __construct($data) {
        $this->clear();
    }

    public function clear(): MyStorage{
        $this->data = [];
        return $this;
    }
    abstract public function store(Element $element): MyStorage;
    abstract public function load(): Element;
}

class LIFO extends MyStorage {

    public function store(Element $element): MyStorage{
        $this->data[] = $element;
        return $this;
    }

    public function load(): Element {
        $element = array_pop($this->data);
        if (!$element) {
            throw new Exception('LIFO is empty');
        }
        return $element;
    }

}
