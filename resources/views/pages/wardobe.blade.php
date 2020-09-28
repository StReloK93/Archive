@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex justify-content-between">
        <main>
            <li class="breadcrumb-item d-inline">
                <a href="{{route('home')}}">Главная</a>
            </li>
            {{-- <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
            <li class="breadcrumb-item d-inline active" aria-current="page">
                Шкаф {{$wardobe_id}}
            </li>
        </main>
        <a href="{{route('cellstore' , ['parent_id'=> $wardobe_id])}}">Добавить ячейку</a>
    </ol>
</nav>
<hr class="m-3">
<main class="row">
<nav class="col-3">
    <div class="list-group">
        <li class="list-group-item active">Все ячейки</li>

        {{-- foreach cells --}}
        @foreach ($cells as $cell)
        <a href="{{route('cell' , ['id'=> $cell->id])}}" class="list-group-item  d-flex justify-content-between">
            <span>Ячейка</span>  
            <span>{{$cell->id}}</span>
        </a>
        @endforeach
        {{-- foreach cells --}}

    </div>
</nav>
<section class="col-9 px-0">
    <main class="row m-0">
        @if(!count($folders))
        <h1 class="text-center col-12 text-secondary">Пустой шкаф <i class="far fa-smile"></i></h1>
        @else
        {{-- foreach folder --}}
        @foreach ($folders as $folder)
        <div class="col-3 mb-3">
            <article class="border-top border-success px-2 pb-1" style="background: #e9ecef">
                <div class="h6 mb-0 text-right">
                    <span class="bg-info text-white px-2">ID {{$folder->id}}</span>
                </div>
                <h5 class="my-2 text-info">
                    <i class="far fa-folder"></i>: {{$folder->name}}
                </h5>
                <p class="my-3 d-flex justify-content-between">
                    <span>Шкаф 1</span>
                    <span>ячейка {{$folder->cell_id}}</span>
                </p>
                <p class="mb-2 d-flex justify-content-between">
                    <span>Кол.файлов</span>
                    <span>{{$folder->files_count    }}</span>
                </p>
                <a href="{{route('folder' , ['id'=> $folder->id])}}" class="d-block btn btn-outline-primary rounded-0">Посмотреть</a>  
            </article>
        </div>
        @endforeach
        @endif
        {{-- foreach folder --}}

    </main>
</section>
</main>
@endsection