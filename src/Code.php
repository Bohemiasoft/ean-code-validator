<?php

namespace EanCodeValidator;

/**
 * @author Jakub Fruhbauer <jakub.fruhbauer@bohemiasoft.com>
 * @copyright (c) 2015, Bohemiasoft s.r.o. 14.8.2015
 */
class Code {

    /**
     * @param string $code
     * @param int $numbers
     * @return boolean
     */
    public function isValidEan($code, $numbers) {
        $status = FALSE;

        if (strlen($code) === $numbers) {
            $modulo = $this->getModulo($code, $numbers);

            if ($code[$numbers - 1] === $modulo) {
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
    private function getModulo($code, $numbers) {
        $string = strrev(substr($code, 0, -1));
        $oddSum = 0;
        $evenSum = 0;

        for ($i = 0; $i < $numbers; $i++) {
            if ($i % 2 === 0) {
                $oddSum += $string[$i] * 3;
            } elseif ($i % 2 === 1) {
                $evenSum += $string[$i];
            }
        }

        $calculation = ($oddSum + $evenSum) % 10;
        $modulo = ($calculation === 0) ? 0 : 10 - $calculation;

        return $modulo;
    }

}
