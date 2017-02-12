<?php

namespace Negasus\NumeralSystem;

/**
 * Package NumeralSystem
 *
 * @category Package
 * @package  Negasus\NumeralSystem
 * @author   Negasus <negasus@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/negasus/NumeralSystem
 */
class NumeralSystem
{
    /**
     * Binary alphabet
     */
    const ALPHABET_BINARY = '01';
    /**
     * Decimal alphabet
     */
    const ALPHABET_DECIMAL = '0123456789';
    /**
     * HEX alphabet
     */
    const ALPHABET_HEX = '0123456789ABCDEF';
    /**
     * Digits and lowercase and uppercase symbols
     */
    const ALPHABET_FULL_TEXT = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    /**
     * Special symbols
     */
    const ALPHABET_SPECIAL = '!@#$%^&*()-=_+{}[]|<>,.?~:;';

    /**
     * Alphabet
     *
     * @var string
     */
    private $_alphabet;

    /**
     * NumeralSystem constructor.
     *
     * @param null $alphabet Alphabet
     */
    public function __construct($alphabet = null)
    {
        // Set default alphabet
        $this->_alphabet = (is_null($alphabet)) ? $this::ALPHABET_FULL_TEXT : $alphabet;
    }

    /**
     * Generate a given size alphabet from another alphabet
     *
     * @param int $size Size
     *
     * @return string New alphabet
     * @throws NumeralSystemException
     */
    public function generateAlphabet($size)
    {
        if ($size > strlen($this->_alphabet)) {
            throw new NumeralSystemException('Size generated alphabet must max: ' . strlen($this->_alphabet) . '. Got ' . $size);
        }
        $base = $this->_alphabet;
        $result = '';
        mt_srand();
        for ($i = 0; $i < $size; $i++) {
            $result .= $sym = $base[mt_rand(0, strlen($base) - 1)];
            $base = str_replace($sym, '', $base);
        }
        return $result;
    }

    /**
     * Check alphabet on duplicates symbols
     *
     * @param string $alphabet Alphabet
     *
     * @return bool
     */
    public function isAlphabetCorrect($alphabet)
    {
        $array = str_split($alphabet);
        return array_unique($array) === $array;
    }

    /**
     * Shuffle alphabet by given seed
     *
     * @param int $seed Seed for random generator
     *
     * @return string
     */
    public function shuffle($seed)
    {
        mt_srand($seed);
        $result = $this->_alphabet;
        for ($i = 0; $i < strlen($result); $i++) {
            $index = mt_rand(0, strlen($result) - 1);
            $a = $result[$index];
            $result[$index] = $result[$i];
            $result[$i] = $a;
        }
        return $result;
    }

    /**
     * Shuffle alphabet and set as current
     *
     * @param int $key Seed for random generator
     *
     * @return string
     */
    public function shuffleAndSet($key)
    {
        return $this->_alphabet = $this->shuffle($key);
    }

    /**
     * Get current alphabet
     *
     * @return string
     */
    public function getAlphabet()
    {
        return $this->_alphabet;
    }

    /**
     * Set current alphabet
     *
     * @param string $alphabet Alphabet
     *
     * @return string
     * @throws NumeralSystemException
     */
    public function setAlphabet($alphabet)
    {
        if (!$this->isAlphabetCorrect($alphabet)) {
            throw new NumeralSystemException('Alphabet has duplicates symbols');
        }
        return $this->_alphabet = $alphabet;
    }

    /**
     * Encode number with current alphabet
     *
     * @param int $value Value for encoding
     *
     * @return string
     */
    public function encode($value)
    {
        $size = strlen($this->_alphabet);

        $base = (int)floor($value / $size);
        $rest = $value % $size;

        if ($base == 0) {
            return $this->_alphabet[$rest];
        }

        if ($base >= $size) {
            return $this->encode($base) . $this->_alphabet[$rest];
        }

        return $this->_alphabet[$base] . $this->_alphabet[$rest];
    }

    /**
     * Decode value with current alphabet
     *
     * @param string $value Decoded value
     *
     * @return int
     */
    public function decode($value)
    {
        $value = strrev((string)$value);
        $result = 0;
        for ($i = 0; $i < strlen($value); $i++) {
            $result += pow(strlen($this->_alphabet), $i) * strpos($this->_alphabet, $value[$i]);
        }
        return $result;
    }

}
