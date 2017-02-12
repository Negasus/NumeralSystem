<?php

namespace Negasus\NumeralSystem;

class NumeralSystemTest extends \PHPUnit_Framework_TestCase
{
    public function testHaveFullTextAlphabetAfterConstruct()
    {
        $app = new NumeralSystem();
        $this->assertEquals($app->getAlphabet(), $app::ALPHABET_FULL_TEXT);
    }

    public function testIsAlphabetCorrect()
    {
        $app = new NumeralSystem();
        $correctAlphabet = '0123456789'; // Unique symbols
        $this->assertTrue($app->isAlphabetCorrect($correctAlphabet));
        $incorrectAlphabet = '01234567890'; // Alphabet with double '0'
        $this->assertFalse($app->isAlphabetCorrect($incorrectAlphabet));
    }

    public function testSetAndGetAlphabet()
    {
        $app = new NumeralSystem();
        $app->setAlphabet('QWERTY');
        $this->assertEquals('QWERTY', $app->getAlphabet());
    }

    public function testSetIncorrectAlphabet()
    {
        $app = new NumeralSystem();
        $this->expectException(NumeralSystemException::class);
        $this->expectExceptionMessage('Alphabet has duplicates symbols');
        $app->setAlphabet('01234567890');
    }

    public function testBadGenerateAlphabet()
    {
        $app = new NumeralSystem();
        $app->setAlphabet($app::ALPHABET_DECIMAL); // Size of alphabet == 10
        $this->expectException(NumeralSystemException::class);
        $this->expectExceptionMessage('Size generated alphabet must max: 10. Got 15');
        $app->generateAlphabet(15);
    }

    public function testGenerateAlphabet()
    {
        $app = new NumeralSystem();
        $app->setAlphabet($app::ALPHABET_DECIMAL);
        $newAlphabet = $app->generateAlphabet(strlen($app->getAlphabet()));
        $newAlphabetArray = str_split($newAlphabet);
        // New alphabet have all unique symbols from source
        $this->assertEquals($newAlphabetArray, array_unique($newAlphabetArray));

        $newAlphabet = $app->generateAlphabet(5);
        $this->assertEquals(5, strlen($newAlphabet));
    }

    public function testShuffle()
    {
        $app = new NumeralSystem();
        $newAlphabet = $app->shuffle(mt_rand());
        $this->assertNotEquals($app->getAlphabet(), $newAlphabet);

        $newAlphabet1 = $app->shuffle(1024);
        $newAlphabet2 = $app->shuffle(1024);
        $this->assertEquals($newAlphabet1, $newAlphabet2);
    }

    public function testShuffleAndSet()
    {
        $app = new NumeralSystem();
        $newAlphabet = $app->shuffleAndSet(mt_rand());
        $this->assertEquals($app->getAlphabet(), $newAlphabet);
    }

    public function testEncode()
    {
        $app = new NumeralSystem();

        $app->setAlphabet($app::ALPHABET_BINARY);
        $this->assertEquals('11110000', $app->encode(240));

        $app->setAlphabet($app::ALPHABET_DECIMAL);
        $this->assertEquals('100500', $app->encode(100500));

        $app->setAlphabet($app::ALPHABET_HEX);
        $this->assertEquals('10000', $app->encode(65536));

        $app->setAlphabet($app::ALPHABET_FULL_TEXT);
        $this->assertEquals('4OmW', $app->encode(1048576));

        $app->setAlphabet($app::ALPHABET_SPECIAL);
        $this->assertEquals('@-:', $app->encode(1024));

        // Test value < alphabet size
        $app->setAlphabet($app::ALPHABET_FULL_TEXT);
        $this->assertEquals(9, $app->encode(9));
    }

    public function testDecode()
    {
        $app = new NumeralSystem();

        $app->setAlphabet($app::ALPHABET_BINARY);
        $this->assertEquals(240, $app->decode('11110000'));

        $app->setAlphabet($app::ALPHABET_DECIMAL);
        $this->assertEquals(100500, $app->decode('100500'));

        $app->setAlphabet($app::ALPHABET_HEX);
        $this->assertEquals(65536, $app->decode('10000'));

        $app->setAlphabet($app::ALPHABET_FULL_TEXT);
        $this->assertEquals(1048576, $app->decode('4OmW'));

        $app->setAlphabet($app::ALPHABET_SPECIAL);
        $this->assertEquals(1024, $app->decode('@-:'));
    }


}
