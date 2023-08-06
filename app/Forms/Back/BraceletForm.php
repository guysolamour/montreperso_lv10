<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class BraceletForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.bracelet.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.bracelet.store' );
        }

        $this->formOptions = [
          'method' => $method,
          'url'    => $url,
          'name'   => get_form_name($this->getModel()),
        ];

        $this
            // add fields here
    
            ->add('name', 'text', [
                'label'  => 'Nom',
                
                
                'attr' => [
                    
                    
                ],

            ])    
            ->add('value', 'textarea', [
                'label'  => 'Value',
                
                'rules' => ['required','string',],
                'attr' => [
                    
                    
                ],

            ])    
            ->add('description', 'textarea', [
                'label'  => 'Description',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])


        ;

    }
}
