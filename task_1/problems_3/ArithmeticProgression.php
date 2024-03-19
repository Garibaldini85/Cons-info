<?php

class ArithmeticProgression
{
    private $d;
    private $a_n = 0;
    private $iterator = 0;

    public function __construct($d)
    {
        $this->d = $d;
    }

    public function next()
    {
        $this->a_n += $this->d;
        $this->iterator += 1;
        return $this->a_n;
    }

    public function getIterator()
    {
        return $this->iterator;
    }

    public function setIterator($value)
    {
        $this->iterator = $value;
        $this->a_n = $this->d * $value;
    }

    public function getValue()
    {
        return $this->a_n;
    }

    public function setValue($value)
    {
        if ($value < $this->d) {
            $this->setIterator(0);
        } else if ($value === $this->d) {
            $this->setIterator(1);
        } else {
            $this->setIterator($this->tryGetIteratorPrevValue($value));
        }
    }

    public function tryGetPrevValue($limit)
    {
        $counter = $limit - 1;

        while ($counter >= $limit - $this->d) {
            if ($counter % $this->d === 0)
                return $counter;
            $counter -= 1;
        }

        return null;
    }

    public function tryGetIteratorPrevValue($limit)
    {
        $value = $this->tryGetPrevValue($limit);

        if ($value === null)
            return null;

        return $value / $this->d;
    }

    public function tryGetSumPrevValue($limit)
    {
        $iterator_n = $this->tryGetIteratorPrevValue($limit);

        if ($iterator_n === null)
            return null;

        return ($iterator_n + 1) * $this->d * $iterator_n / 2;
    }
}
