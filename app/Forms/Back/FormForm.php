<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class FormForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.form.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.form.store' );
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

            ->add('type_id', 'entity', [
                'class'  => \App\Models\Type::class,
                'property' => 'name',
                'label'  => 'Type',
                'rules' => ['nullable','exists:types,id',],
                // 'query_builder => function(\App\Models\Type $type) {
                    // return $type;
                // }
            ])
            ->add('description', 'textarea', [
                'label'  => 'Description',

                'rules' => ['nullable',],
                'attr' => [


                ],

            ])
            // ->add('index_id', 'entity', [
            //     'class'  => \App\Models\Index::class,
            //     'property' => 'name',
            //     'label'  => 'Index',
            //     'rules' => ['nullable','exists:indices,id',],
            //     // 'query_builder => function(\App\Models\Index $index) {
            //         // return $index;
            //     // }
            // ])


        ;

    }
}
