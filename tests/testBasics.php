<?php

require_once __DIR__ . "/../boot.php";

class BasicTest extends PHPUnit_Framework_TestCase
{
    public function testConfigLoaded()
    {
        $this->assertClassHasAttribute('credentials', 'Config_Database');
    }
    //--------------------------------------------------------------------------


    public function testLoggingLoaded()
    {
        $this->assertInstanceOf('Logging', new Logging);
    }
    //--------------------------------------------------------------------------


    public function testDatabaseLoaded()
    {
        $this->assertInstanceOf('Database', new Database);
    }
    //--------------------------------------------------------------------------
}
