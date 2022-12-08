@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'text',
        'label' => 'Текст',
        'maxlength' => 45,
        'required' => true,
        'placeholder' => 'Укажите текст баннера',
    ])
    @formField('input', [
        'name' => 'btn_link',
        'label' => 'Ссылка',
        'required' => true,
        'placeholder' => 'Укажите ссылку',
    ])
    @formField('input', [
        'name' => 'btn_text',
        'label' => 'Текст кнопки действия',
        'placeholder' => 'подробнее',
    ])
@stop
