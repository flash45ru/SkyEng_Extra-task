<?php

class Count
{
    public $numericOne;
    public $numericTwo;

    /**
     * Вернет сумму чисел
     * @param string $numericOne
     * @param string $numericTwo
     * @return int
     */
    public static function getSum($numericOne, $numericTwo)
    {
        $count = self::getCount($numericOne, $numericTwo);

        //переворачиваем строки
        $turnOne = strrev($numericOne);
        $turnTwo = strrev($numericTwo);

        //подготавливаем смассивы
        $arrayOne = str_split($turnOne);
        $arrayTwo = str_split($turnTwo);

        for ($i = 0; $i < $count; $i++) {
            $one = array_shift($arrayOne);
            $two = array_shift($arrayTwo);

            if (!empty($one) && !empty($two)) {
                $summary = $one + $two;
            } else {
                if ($one) $summary = $one;
                if ($two) $summary = $two;
            }
            
            $result[] = $summary;
        }

        $resultArray = self::getResult($result);

        $array = '';
        foreach ($resultArray as $key => $value) {
            $array .= $value;
        }

        $numeric = strrev($array);

        return $numeric;

    }

    /**
     * Вернет итоговый массива
     * @param array $result
     * @return mixed
     */
    public static function getResult($result)
    {
        for ($i = 0; $i <= count($result); $i++) {
            if (isset($result[$i + 1])) {
                if ($result[$i] >= 10) {
                    $result[$i] = $result[$i] - 10;
                    $result[$i + 1] += 1;
                }
            }
        }

        return $result;
    }

    /**
     * Вернёт количество итераций для for
     * @param string $numericOne
     * @param string $numericTwo
     * @return int
     */
    public static function getCount($numericOne, $numericTwo)
    {
        if (mb_strlen($numericOne) > mb_strlen($numericTwo)) {
            $count = mb_strlen($numericOne);
        } else {
            $count = mb_strlen($numericTwo);
        }

        return $count;
    }
}
