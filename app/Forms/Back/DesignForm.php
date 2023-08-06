<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class DesignForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.design.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.design.store' );
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
            ->add('type_id', 'entity', [
                'class'  => \App\Models\Type::class,
                'property' => 'name',
                'label'  => 'Type',
                'rules' => ['nullable','exists:types,id',],
                // 'query_builder => function(\App\Models\Type $type) {
                    // return $type;
                // }
            ])


        ;

    }
}
