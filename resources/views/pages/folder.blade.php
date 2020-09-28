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
                <a href="{{route('wardobe', ['id' => $cell->wardobe_id])}}">Шкаф {{$cell->wardobe_id}}</a>
            </li>
            <li class="breadcrumb-item d-inline active" aria-current="page">
                <a href="{{route('cell', ['id' => $cell->id])}}">Ячейка {{$cell->id}}</a>
            </li>
            <li class="breadcrumb-item d-inline active" aria-current="page">Папка {{$folder->name}}</li>
        </main>
    </ol>
</nav>
<hr class="m-3">
<main class="row mr-0">
    <nav class="col-3">
        <div class="list-group">
            <span class="list-group-item active text-white">
                <i class="far fa-folder"></i> Папка {{$folder->name}}
            </span>
            <a href="{{route('folderedit', ['id' =>$folder->id])}}" class="list-group-item">
                <i class="fas fa-edit"></i> Изменить
            </a>
            <a href="{{route('folderdestroy', ['id' =>$folder->id])}}" class="list-group-item">
                <i class="fas fa-trash-alt"></i> Удалить
            </a>
        </div>
    </nav>
    <section class="col-9 px-0">
        <div class="col-12 d-flex justify-content-between py-2 bg-primary mb-3">
            <main class="my-1">
                {{-- <a href="{{route('folderdestroy', ['id' => $folder->id])}}" class=" text-white">
                    <i class="fas fa-trash-alt"></i>
                    Удалить папку
                </a> --}}
            </main>
            <main class="my-1">
                <a href="#" class="text-white" id="openform">
                    <i class="fas fa-file-alt"></i>
                    Добавить файл
                </a>

                <form action="{{route('filecreate', ['id' => $folder->id])}}" method="post" id="form1" class="position-absolute fixed-bottom fixed-right col-4 py-3 d-none" style="left:inherit;bottom: -130px;background: #d9dbdc!important">
                    @csrf
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Названия папки" name="namefile">
                      </div>
                      <button type="submit" class="btn btn-primary col-12">Добавить</button>
                </form>
            </main>
        </div>
        <main class="row m-0">
            @if(!count($files))
            <h1 class="text-center col-12 text-secondary">Пустая ячейка <i class="far fa-smile"></i></h1>
            @else
            @foreach ($files as $file)
            <div class="col-3 mb-3">
                <article class="border-top border-success px-2 pb-1" style="background: #e9ecef">
                    <h5 class="my-2 text-info">
                        <i class="fas fa-file-archive h1"></i> {{$file->name}}
                    </h5>
                    <a href="{{route('filedestroy' , ['id'=> $file->id])}}" class="d-block btn btn-outline-danger rounded-0">Удалить</a>  
                </article>
            </div>
            @endforeach
            @endif
        </main>
    </section>
</main>
@endsection