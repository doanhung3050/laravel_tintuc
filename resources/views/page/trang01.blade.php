@extends('home')

@section('noidung')
    noi dung 01

    @php
        $name = "<b>ssssssssssssss</b>"

    @endphp

    {{ $name }}
    {!! $name !!}

    <hr>

   @php
        $data = array (
            [
                'namer' => 1,
                'type' => 1,
                'name' => 'hung'
            ],
            [
                'namer' => 2,
                'type' => 1,
                'name' => 'teo'
            ],
            [
                'namer' => 3,
                'type' => 2,
                'name' => 'thim'
            ],
            [
                'namer' => 4,
                'type' => 1,
                'name' => 'ty'
            ],
            [
                'namer' => 5,
                'type' => 2,
                'name' => 'ty'
            ]
        );

   @endphp

@endsection




@section('banner')
    @parent
@endsection

