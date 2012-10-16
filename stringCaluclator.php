<?php

class Calculator {

    public function calc($string) {
        $delim = array("\n");
        if(substr($string, 0, 2) == '//') {
            $delim[] =substr($string, 2, 1);
            $string = trim(substr($string, 3));
        }

        $sol = 0;
        $string = str_replace($delim, ',', $string);
        $string = str_replace(',', '+', $string);

        foreach(explode('+', $string) as $number) {
            $sol +=$number;
        }

        return $sol;
    }
}

class Test extends PHPUnit_Framework_TestCase {

    /**
     * @param $string string
     * @param $solution int
     * @return void
     * @dataProvider provider
     */
    public function testStringCalculcation($string, $solution) {
        $calc = new Calculator();
        $this->assertEquals($calc->calc($string), $solution);
    }


    public function provider() {
        return array(
            array('1,2,3', 6),
            array("1,3\n5", 9),
            array("//;\n2;4;8", 14)
        );
    }
}