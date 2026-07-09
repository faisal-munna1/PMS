<?php

class NumberToWord
{

    public static function convert($number = 0)
    {

        $number = trim(str_replace([",", " "], "", $number));


        if ($number === "" || !is_numeric($number)) {

            return "";

        }


        $number = (int)$number;


        if ($number == 0) {

            return "zero";

        }



        $ones = [

            "",
            "one",
            "two",
            "three",
            "four",
            "five",
            "six",
            "seven",
            "eight",
            "nine",
            "ten",
            "eleven",
            "twelve",
            "thirteen",
            "fourteen",
            "fifteen",
            "sixteen",
            "seventeen",
            "eighteen",
            "nineteen"

        ];



        $tens = [

            "",
            "",
            "twenty",
            "thirty",
            "forty",
            "fifty",
            "sixty",
            "seventy",
            "eighty",
            "ninety"

        ];



        $units = [

            "",
            "thousand",
            "million",
            "billion",
            "trillion"

        ];




        $convertGroup = function($num) use ($ones,$tens)
        {

            $word = "";


            if($num >= 100)
            {

                $word .= $ones[(int)($num / 100)] . " hundred ";

                $num %= 100;

            }


            if($num >= 20)
            {

                $word .= $tens[(int)($num / 10)] . " ";

                $num %= 10;

            }


            if($num > 0)
            {

                $word .= $ones[$num] . " ";

            }


            return trim($word);

        };




        $words = [];

        $level = 0;



        while($number > 0)
        {

            $group = $number % 1000;


            if($group != 0)
            {

                $word = $convertGroup($group);


                if(isset($units[$level]) && $units[$level] != "")
                {

                    $word .= " ".$units[$level];

                }


                array_unshift($words,$word);

            }


            $number = floor($number / 1000);

            $level++;

        }



        return implode(" ",$words);

    }

}