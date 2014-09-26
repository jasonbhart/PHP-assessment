<?php

require_once __DIR__ . "/../boot.php";

class QuestionTest extends PHPUnit_Framework_TestCase
{
    public function testModelLoaded()
    {
        $this->assertInstanceOf('Question', new Question(1, new Database));
    }
    //--------------------------------------------------------------------------


    public function testInstantiationById()
    {
        $question = new Question(1, new Database);

        $this->assertNotEmpty($question->name);
        $this->assertNotEmpty($question->text);
        $this->assertNotEmpty($question->answer);
        $this->assertNotEmpty($question->created);
    }
    //--------------------------------------------------------------------------


    public function testStaticGetNameById()
    {
        $this->assertNotEmpty(Question::getNameById(1, new Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetTextById()
    {
        $this->assertNotEmpty(Question::getTextById(1, new Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetAnswerById()
    {
        $this->assertNotEmpty(Question::getAnswerById(1, new Database));
    }
    //--------------------------------------------------------------------------


    public function testStaticGetCreatedById()
    {
        $this->assertNotEmpty(Question::getCreatedById(1, new Database));
    }
    //--------------------------------------------------------------------------


    public function testQuestionsAnswered()
    {
        $this->assertNotEmpty(Question::getAnswerById(1, new Database));
        $this->assertNotEmpty(Question::getAnswerById(2, new Database));
        $this->assertNotEmpty(Question::getAnswerById(3, new Database));
    }
    //--------------------------------------------------------------------------
}
