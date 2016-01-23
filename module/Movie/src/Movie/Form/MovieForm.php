<?php

namespace Movie\Form;

 use Zend\Form\Form;

 class MovieForm extends Form
 {

    public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('movie');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Title',
             ),
         ));
         $this->add(array(
             'name' => 'director',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Director',
             ),
         ));
          $this->add(array(
             'name' => 'year',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Year',
             ),
         ));
           $this->add(array(
             'name' => 'genre',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Genre',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }