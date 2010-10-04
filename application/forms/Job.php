<?php

class Application_Form_Job extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement($this->createElement('text', 'title', 
                                                array('label' => 'Title:'))
                        ->setBelongsTo('job')
                        ->setRequired(true));

        $this->addElement($this->createElement('text', 'state',
                                                array('label' => 'State:'))
                        ->setBelongsTo('job'));


        $this->addElement($this->createElement('text', 'city',
                                                array('label' => 'City:'))
                        ->setBelongsTo('job'));

        $this->addElement($this->createElement('textarea', 'description',
                                                array('label' => 'Description:'))
                        ->setRequired(true)
                        ->setBelongsTo('job'));

        $this->addElement($this->createElement('text', 'instruction',
                                                array('label' => 'Instruction:'))
                        ->setBelongsTo('job'));

        $submit = $this->createElement('submit', 'enviar')
                     ->setRequired(true);
        $this->addElement($submit);
    }
}
