<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class IndexForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.index.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.index.store' );
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
            ->add('form_id', 'entity', [
                'class'  => \App\Models\Form::class,
                'property' => 'name',
                'label'  => 'Forme',
                'rules' => ['nullable','exists:forms,id',],
                // 'query_builder => function(\App\Models\Index $index) {
                    // return $index;
                // }
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
