<?php

require_once __DIR__ . "/../boot.php";

class QuestionTest extends PHPUnit_Framework_TestCase
{
    public function testModelLoaded()
    {
        $this->assertInstanceOf('\interview\Question', new \interview\Question(1, new \interview\Database));
    }
    //--------------------------------------------------------------------------


    public function testInstantiationById()
    {
        $question = new \interview\Question(1, new \interview\Database);

        $this->assertNotEmpty($question->name);
        $this->assertNotEmpty($question->text);
        $this->assertNotEmpty($question->answer);
        $this->assertNotEmpty($question->created);
    }
    //--------------------------------------------------------------------------


    public function testStaticGetNameById()
    {
        $this->assertNotEmpty(\interview\Question::getNameById(1, new \interview\Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetTextById()
    {
        $this->assertNotEmpty(\interview\Question::getTextById(1, new \interview\Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetAnswerById()
    {
        $this->assertNotEmpty(\interview\Question::getAnswerById(1, new \interview\Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetCreatedById()
    {
        $this->assertNotEmpty(\interview\Question::getCreatedById(1, new \interview\Database));
    }
    //--------------------------------------------------------------------------


    public function testQuestionsAnswered()
    {
        $this->assertNotEmpty(\interview\Question::getAnswerById(1, new \interview\Database));
        $this->assertNotEmpty(\interview\Question::getAnswerById(2, new \interview\Database));
        $this->assertNotEmpty(\interview\Question::getAnswerById(3, new \interview\Database));
    }
    //--------------------------------------------------------------------------
}
