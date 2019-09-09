<?php

class Count
{
    public $stringOne;
    public $stringTwo;

    /**
     * Возвращает сумму чисел
     * @param $stringOne
     * @param $stringTwo
     * @return integer
     */
    public static function getSum($stringOne, $stringTwo)
    {
        $stringOne = self::checkString($stringOne);
        $stringTwo = self::checkString($stringTwo);

        $count = self::getCountIteration($stringOne, $stringTwo);

        $arrayOne = self::revertStringAndGetArray($stringOne);
        $arrayTwo = self::revertStringAndGetArray($stringTwo);

        for ($i = 0; $i < $count; $i++) {
            $array[] = (isset($arrayOne[$i]) ? $arrayOne[$i] : 0) + (isset($arrayTwo[$i]) ? $arrayTwo[$i] : 0);
        }

        $preparedArray = self::getPreparedArray($array);

        $resultString = '';
        foreach ($preparedArray as $key => $value) {
            $resultString .= $value;
        }

        $numeric = (count($arrayOne) < 1 && count($arrayTwo) < 1) ? strrev($resultString) : $stringOne + $stringTwo;

        return $numeric;

    }

    /**
     * Оставит в строке только цифры
     * @param $string
     * @return false|int
     */
    public function checkString($string)
    {
        return preg_replace('~\D+~', '', $string);
    }

    /**
     * Возвращает количество итераций для for
     * @param string $stringOne
     * @param string $stringTwo
     * @return int
     */
    public static function getCountIteration($stringOne, $stringTwo)
    {
        if (mb_strlen($stringOne) > mb_strlen($stringTwo)) {
            $count = mb_strlen($stringOne);
        } else {
            $count = mb_strlen($stringTwo);
        }

        return $count;
    }

    /**
     * Reverse a string and Convert a string to an array
     * @param $string
     * @return array
     */
    public function revertStringAndGetArray($string)
    {
        $revert = strrev($string);
        $array = str_split($revert);

        return $array;
    }

    /**
     * Возвращает подготовленный массив
     * @param $array
     * @return array
     */
    public static function getPreparedArray($array)
    {
        for ($i = 0; $i <= count($array); $i++) {
            if (isset($array[$i + 1])) {
                if ($array[$i] >= 10) {
                    $array[$i] = $array[$i] - 10;
                    $array[$i + 1] += 1;
                }
            }
        }

        return $array;
    }
}
