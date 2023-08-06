<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class DesignCategoryForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.designcategory.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.designcategory.store' );
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
            ->add('price', 'text', [
                'label'  => 'Price',
                
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
            ->add('design_id', 'entity', [
                'class'  => \App\Models\Design::class,
                'property' => 'name',
                'label'  => 'Design',
                'rules' => ['nullable','exists:designs,id',],
                // 'query_builder => function(\App\Models\Design $design) {
                    // return $design;
                // }
            ])


        ;

    }
}
