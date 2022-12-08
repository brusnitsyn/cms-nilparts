@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'article',
        'label' => 'Артикул',
        'maxlength' => 100
    ])

    @formField('select', [
        'name' => 'category_id',
        'label' => 'Категория',
        'placeholder' => 'Выберите категорию',
        'options' => $categories
    ])

    @formField('input', [
        'name' => 'manufacturer',
        'label' => 'Производитель',
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'machines',
        'label' => 'Применяемость',
        'maxlength' => 100
    ])

    @formField('input', [
        'type' => 'textarea',
        'name' => 'short_description',
        'label' => 'Краткое описание',
        'maxlength' => 480
    ])

    @formField('wysiwyg', [
        'name' => 'full_description',
        'label' => 'Описание',
        'toolbarOptions' => ['list-ordered', 'list-unordered', 'bold', 'italic', 'underline', 'strike'],
        'maxlength' => 1800,
    ])

    @formField('input', [
        'type' => 'number',
        'name' => 'price',
        'label' => 'Стоимость',
        'maxlength' => 16,
        'note' => 'Указывайте стоимость в числовом значении'
    ])

    @formField('medias', [
        'name' => 'cover',
        'label' => 'Обложка',
        'note' => 'Используется в "карточке" товара',
        'fieldNote' => 'Рекомендуемый размер: 294x196'
    ])

    @formField('medias', [
        'name' => 'preview',
        'label' => 'Изображения',
        'max' => 10,
        'note' => 'Используются в "карусели" на странице товара',
        'fieldNote' => 'Рекомендуемый минимальный размер: 1200x1200'
    ])
@stop
