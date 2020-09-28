@extends('layouts.app')
@section('content')
<main class="row">
<section class="col-12 px-0">
    <main class="row m-0">
        @if(!count($folders))
        <h1 class="text-center col-12 text-secondary">Ничего не найдено <i class="far fa-smile"></i></h1>
        @else
        {{-- foreach folder --}}
        @foreach ($folders as $folder)
        <div class="col-2 mb-3">
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
    </main>
</section>
</main>
@endsection