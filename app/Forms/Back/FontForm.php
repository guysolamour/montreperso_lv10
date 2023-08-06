<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class FontForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.font.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.font.store' );
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
            ->add('description', 'textarea', [
                'label'  => 'Description',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])


        ;

    }
}
