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
            <li class="breadcrumb-item d-inline active" aria-current="page">
                <a href="{{route('folder', ['id' => $folder->id])}}">Папка {{$folder->name}}</a>
            </li>
            <li class="breadcrumb-item d-inline active" aria-current="page">
                Изменить
            </li>
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
            <a  class="list-group-item">
                Изменить
            </a>
            <a href="{{route('folderdestroy', ['id' =>$folder->id])}}" class="list-group-item">
                Удалить
            </a>
        </div>
    </nav>
    <section class="col-9 px-0">
        <main class="row m-0">
            <form class="col-4" method="post" action="{{route('folderupdate', ['id' => $folder->id])}}">
                @csrf
                <div class="form-group">
                  <label for="selectward">Шкаф</label>
                  <select class="form-control" id="selectward" name="wardobe" onchange="celles(this.value)" required>
                        @foreach ($wardobes as $war)
                            @if($war->id == $cell->wardobe_id)
                            <option selected value="{{$war->id}}">Шкаф {{$war->id}}</option>
                            @else
                            <option value="{{$war->id}}">Шкаф {{$war->id}}</option>
                            @endif
                        @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="selectcell">Ячейка</label>
                    <select class="form-control" id="selectcell" name="cell" required>
                        @foreach ($celles as $ce)
                            @if($ce->id == $cell->id)
                            <option selected value="{{$ce->id}}">Ячейка {{$ce->id}}</option>
                            @else
                            <option value="{{$ce->id}}">Ячейка {{$ce->id}}</option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                <input type="text" class="form-control" value="{{$folder->name}}" name="foldername" placeholder="Названия папки" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary col-12">Изменить</button>
                </div>
              </form>
        </main>
    </section>
</main>
@endsection