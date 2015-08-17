<?php

namespace EanCodeValidator;

/**
 * @author Jakub Fruhbauer <jakub.fruhbauer@bohemiasoft.com>
 * @copyright (c) 2015, Bohemiasoft s.r.o. 14.8.2015
 */
class EanTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers \EanCodeValidator\Code::isValidEan
     */
    public function testEan8() {
        $testList = array(
            '123456789' => FALSE,
        );

        $eanValidator = new \EanCodeValidator\Code();

        foreach ($testList as $argument => $result) {
            $this->assertEquals($result, $eanValidator->isValidEan($argument, 8));
        }
    }

    /**
     * @covers \EanCodeValidator\Code::isValidEan
     */
    public function testEan13() {
        $testList = array(
            '8414636079170' => TRUE,
        );

        $eanValidator = new \EanCodeValidator\Code();

        foreach ($testList as $argument => $result) {
            $this->assertEquals($result, $eanValidator->isValidEan($argument, 13));
        }
    }

}
