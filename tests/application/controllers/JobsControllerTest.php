<?php
class JobsControllerTest extends ControllerTestCase
{
	public function testIndexShouldBeSucess()
	{
		$this->dispatch('/jobs');
		$this->assertController("jobs");
		$this->assertResponseCode(200);
	}

	public function testIndexShouldBeListJobs() {
		$this->dispatch('/jobs/index');
		//          
	}
	
	public function testNewShouldHaveAForm()
	{
		$this->dispatch('/jobs/new');
		$this->assertXpath("//form");
		$this->assertXpath("//form//input[@type='text' and @name='job[title]']");
		$this->assertXpath("//form//input[@type='text' and @name='job[city]']");
		$this->assertXpath("//form//input[@type='text' and @name='job[state]']");
		$this->assertXpath("//form//textarea[@name='job[description]']");
		$this->assertXpath("//form//input[@name='job[instruction]']");
		$this->assertXpath("//form//input[@type='submit']");
		$this->assertResponseCode(200);
	}

	public function testNewFormShouldBeValid()
	{

		$this->request->setPost(array('job' => array(
            'title'  => 'Programmer',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'description' => 'Programmer PHP to take a job.',
            'instruction' => 'Email your résumé to mail@gmail.com'
            )));

        $this->dispatch('/jobs/new');
       // $this->assertQuery('.message');
            
	}

	public function testNewFormShouldNotBeValidWhithoutATitle()
	{
		$this->request->setMethod('POST')
		->setPost(array('job' => array(
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'description' => 'Programmer PHP to take a job.',
            'instruction' => 'Email your résumé to mail@gmail.com'
            )));

            $this->dispatch('/jobs/new');
            $this->assertNotRedirect();
            $this->assertQuery('form .errors');
	}

	public function testNewFormShouldNotBeValidWhithoutADescription()
	{
		$this->request->setMethod('POST')
		->setPost(array('job' => array(
            'title'  => 'Programmer',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'instruction' => 'Email your résumé to mail@gmail.com'
            )));

            $this->dispatch('/jobs/new');
            $this->assertNotRedirect();
            $this->assertQuery('form .errors');
	}

	
}