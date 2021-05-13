<?php


use PHPUnit\Framework\TestCase as TestCaseAlias;

class Indextest extends TestCaseAlias
{
    public function testHello()
    {
        $_GET['name'] = 'David';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello David', $content);
    }
}