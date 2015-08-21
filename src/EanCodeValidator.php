<?php

namespace Bohemiasoft\EanCodeValidator;

/**
 * @author Jakub Fruhbauer <jakub.fruhbauer@bohemiasoft.com>
 * @copyright (c) 2015, Bohemiasoft s.r.o. 14.8.2015
 */
class EanCodeValidator
{

  /**
   * @param string $code
   * @param int $numbers
   * @return boolean
   */
  public function isValid($code, $numbers)
  {
    $status = FALSE;

    if (preg_match( '/^\d{' . $numbers . '}$/', $code ))
    {
      $modulo = $this->getModulo( $code, $numbers );
      $index = $numbers - 1;
      $codeModulo = intval( $code[$index] );

      if ($codeModulo === $modulo)
      {
        $status = TRUE;
      }
    }

    return $status;
  }

  /**
   * @param string $code
   * @param int $numbers
   * @return int
   */
  private function getModulo($code, $numbers)
  {
    $string = strrev( substr( $code, 0, -1 ) );
    $oddSum = 0;
    $evenSum = 0;

    for ($i = 0; $i < $numbers - 1; $i++)
    {
      if ($i % 2 === 0)
      {
        $oddSum += $string[$i] * 3;
      }
      elseif ($i % 2 === 1)
      {
        $evenSum += $string[$i];
      }
    }

    $calculation = ($oddSum + $evenSum) % 10;
    $modulo = ($calculation === 0) ? 0 : 10 - $calculation;

    return $modulo;
  }

}
