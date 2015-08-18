<?php

namespace EanCodeValidator;

/**
 * @author Jakub Fruhbauer <jakub.fruhbauer@bohemiasoft.com>
 * @copyright (c) 2015, Bohemiasoft s.r.o. 14.8.2015
 */
class EanTest extends \PHPUnit_Framework_TestCase
{

  public function getEan()
  {
    return array(
      array('73513537', TRUE, 8),
      array('BV513537', FALSE, 8),
      array('1234567899874', FALSE, 13),
      array('ZA14636079170', FALSE, 13),
      array('8414636079170', TRUE, 13),
      array('0751747057474', TRUE, 13),
    );
  }

  /**
   * @covers \EanCodeValidator\Code::isValidEan
   * @dataProvider getEan
   * @param string $ean
   * @param bool $isValid
   * @param int $type
   */
  public function testEan($ean, $isValid, $type)
  {
    $eanValidator = new \EanCodeValidator\Code();

    $this->assertEquals( $isValid, $eanValidator->isValidEan( $ean, $type ) );
  }

}
