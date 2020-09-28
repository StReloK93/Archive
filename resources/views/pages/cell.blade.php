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
            <li class="breadcrumb-item d-inline active" aria-current="page">Ячейка {{$cell->id}}</li>
        </main>
        <div>
            <a href="{{route('cellstore' , ['parent_id'=> $cell->wardobe_id])}}">Добавить ячейку</a>
        </div>
    </ol>
</nav>
<hr class="m-3">
<main class="row mr-0">
    <nav class="col-3">
        <div class="list-group">
            <a href="{{route('wardobe', ['id' => $cell->wardobe_id])}}" class="list-group-item">
                Все ячейки
            </a>
            {{-- foreach cells --}}
            @foreach ($cells as $c)
            <a href="{{route('cell' , ['id'=> $c->id])}}" class="list-group-item @if($cell->id == $c->id) active @endif  d-flex justify-content-between">
                <span>Ячейка</span>  
                <span>{{$c->id}}</span>
            </a>
            @endforeach
            {{-- foreach cells --}}

        </div>
    </nav>
    <section class="col-9 px-0">
        <div class="col-12 d-flex justify-content-between py-2 bg-primary mb-3">
            <main class="my-1">
                <a href="{{route('celldestroy', ['id' => $cell->id])}}" class=" text-white">
                    <i class="fas fa-trash-alt"></i>
                    Удалить ячейку
                </a>
            </main>
            <main class="my-1">
                <a href="#" class="text-white" id="openform">
                    <i class="far fa-folder-open"></i>
                    Добавить папку
                </a>

                <form action="{{route('foldercreate', ['id' => $cell->id])}}" method="post" id="form1" class="position-absolute fixed-bottom fixed-right col-4 py-3 d-none" style="left:inherit;bottom: -130px;background: #d9dbdc!important">
                    @csrf
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Названия папки" name="namefolder">
                      </div>
                      <button type="submit" class="btn btn-primary col-12">Добавить</button>
                </form>
            </main>
        </div>
        <main class="row m-0">
            @if(!count($folders))
            <h1 class="text-center col-12 text-secondary">Пустая ячейка <i class="far fa-smile"></i></h1>
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
                        <span>{{$folder->files_count}}</span>
                    </p>
                    <a href="{{route('folder' , ['id'=> $folder->id])}}" class="d-block btn btn-outline-primary rounded-0">Посмотреть</a>  
                </article>
            </div>
            @endforeach
            {{-- foreach folder --}}
            @endif
        </main>
    </section>
</main>
@endsection