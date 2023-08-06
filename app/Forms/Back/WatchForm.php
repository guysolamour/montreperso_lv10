<?php

namespace App\Forms\Back;

use Kris\LaravelFormBuilder\Form;

class WatchForm extends Form
{
    public function buildForm()
    {
        if ( $this->getModel() && $this->getModel()->getKey() ) {
          $method = 'PUT';
          $url    = route( 'back.watch.update', $this->getModel() );
        } else {
          $method = 'POST';
          $url    = route( 'back.watch.store' );
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
            ->add('form_id', 'entity', [
                'class'  => \App\Models\Design::class,
                'property' => 'name',
                'label'  => 'Forme',
                'rules' => ['nullable','exists:designs,id',],
                // 'query_builder => function(\App\Models\Design $design) {
                    // return $design;
                // }
            ])
            ->add('index_id', 'entity', [
                'class'  => \App\Models\Index::class,
                'property' => 'name',
                'label'  => 'Index',
                'rules' => ['nullable','exists:indices,id',],
                // 'query_builder => function(\App\Models\Index $index) {
                    // return $index;
                // }
            ])    
            ->add('index_image_id', 'number', [
                'label'  => 'Image index',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])
            ->add('indicator_id', 'entity', [
                'class'  => \App\Models\Indicator::class,
                'property' => 'name',
                'label'  => 'Aiguille',
                'rules' => ['nullable','exists:indicators,id',],
                // 'query_builder => function(\App\Models\Indicator $indicator) {
                    // return $indicator;
                // }
            ])
            ->add('brackground_id', 'entity', [
                'class'  => \App\Models\Background::class,
                'property' => 'name',
                'label'  => 'Arrière plan',
                'rules' => ['nullable','exists:backgrounds,id',],
                // 'query_builder => function(\App\Models\Background $background) {
                    // return $background;
                // }
            ])    
            ->add('brackground_image_id', 'number', [
                'label'  => 'Arriere plan image',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])
            ->add('bracelet_id', 'entity', [
                'class'  => \App\Models\Bracelet::class,
                'property' => 'name',
                'label'  => 'Bracelet',
                'rules' => ['nullable','exists:bracelets,id',],
                // 'query_builder => function(\App\Models\Bracelet $bracelet) {
                    // return $bracelet;
                // }
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
            ->add('design_category_id', 'entity', [
                'class'  => \App\Models\DesignCategory::class,
                'property' => 'name',
                'label'  => 'Category',
                'rules' => ['nullable','exists:design_categories,id',],
                // 'query_builder => function(\App\Models\DesignCategory $designcategory) {
                    // return $designcategory;
                // }
            ])
            ->add('user_id', 'entity', [
                'class'  => \App\Models\User::class,
                'property' => 'name',
                'label'  => 'Auteur',
                'rules' => ['nullable','exists:users,id',],
                // 'query_builder => function(\App\Models\User $user) {
                    // return $user;
                // }
            ])    
            ->add('text', 'textarea', [
                'label'  => 'Text',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])    
            ->add('background', 'textarea', [
                'label'  => 'Background',
                
                'rules' => ['nullable',],
                'attr' => [
                    
                    
                ],

            ])


        ;

    }
}
