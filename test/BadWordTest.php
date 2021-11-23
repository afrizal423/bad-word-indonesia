<?php

use afrizalmy\BWI\BadWord;
use PHPUnit\Framework\TestCase;

class BadWordTest extends TestCase
{
    public function testNormalWordsCek()
    {
        $str = 'bad word test by afrizalmy';
        $t = BadWord::cek($str);
        $this->assertEquals(false, $t); 
    }
    public function testNormalWordsMasking()
    {
        $str = 'bad word test by afrizalmy';
        $t = BadWord::masking($str);
        $this->assertEquals($str, $t); 
    }
    public function testFailurelWordsCek()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::cek($str);
        $this->assertEquals(true, $t); 
    }
    public function testFailureWordsMasking()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::masking($str);
        $this->assertEquals('dasar, kamu b*j*ng*n ya!', $t); 
    }
    public function testFailureWordsMaskingCustom()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::masking($str,'#');
        $this->assertEquals('dasar, kamu b#j#ng#n ya!', $t); 
    }
}
