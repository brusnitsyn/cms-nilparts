@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'btn_link',
        'label' => 'Ссылка',
        'required' => true,
        'placeholder' => 'Укажите ссылку',
    ])
    @formField('input', [
        'name' => 'btn_text',
        'label' => 'Текст кнопки действия',
        'required' => true,
        'placeholder' => 'подробнее',
    ])
    @formField('medias', [
        'name' => 'slide',
        'label' => 'Изображение',
    ])
@stop
