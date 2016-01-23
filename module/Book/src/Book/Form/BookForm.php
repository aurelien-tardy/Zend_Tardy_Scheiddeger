<?php

namespace Book\Form;

 use Zend\Form\Form;

 class BookForm extends Form
 {

    public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('book');

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
             'name' => 'author',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Author',
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
             'name' => 'type',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Type',
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