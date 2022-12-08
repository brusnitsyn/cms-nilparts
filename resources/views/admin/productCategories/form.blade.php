@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'description',
        'label' => 'Описание',
        'type' => 'textarea',
        'maxlength' => 255
    ])

    @formField('select', [
        'name' => 'category_parent_id',
        'label' => 'Родительская категория',
        'placeholder' => 'Выберите категорию',
        'options' => $categories
    ])
    
    @formField('medias', [
        'name' => 'preview',
        'label' => 'Обложка',
        'fieldNote' => 'Рекомендуемый размер: 320x108'
    ])
@stop
