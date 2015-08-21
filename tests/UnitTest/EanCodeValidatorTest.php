<?php

namespace Bohemiasoft\EanCodeValidator;

/**
 * @author Jakub Fruhbauer <jakub.fruhbauer@bohemiasoft.com>
 * @copyright (c) 2015, Bohemiasoft s.r.o. 14.8.2015
 */
class EanCodeValidator extends \PHPUnit_Framework_TestCase
{

  public function getEan()
  {
    return array(
      array('73513537', TRUE, 8),
      array('BV513537', FALSE, 8),
      array('73BV3537', FALSE, 8),
      array('735135BV', FALSE, 8),
      array('1234567899874', FALSE, 13),
      array('ZA14636079170', FALSE, 13),
      array('84ZA636079170', FALSE, 13),
      array('84146360791ZA', FALSE, 13),
      array('8414636079170', TRUE, 13),
      array('0751747057474', TRUE, 13),
    );
  }

  /**
   * @covers \Bohemiasoft\EanCodeValidator\EanCodeValidator::isValid
   * @dataProvider getEan
   * @param string $ean
   * @param bool $isValid
   * @param int $type
   */
  public function testEan($ean, $isValid, $type)
  {
    $eanValidator = new \Bohemiasoft\EanCodeValidator\EanCodeValidator();

    $this->assertEquals( $isValid, $eanValidator->isValid( $ean, $type ) );
  }

}
