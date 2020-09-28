@extends('layouts.app')


@section('content')
<main class="row">
    @foreach ($wardobe as $key => $item)
    <section class="col-3">
        <div class="card">
            <div class="card-header bg-secondary text-white h4 d-flex justify-content-between">
            <span>
                Шкаф {{$item->id}}
            </span>   
            <span>
                <a href="{{route('wardobedestroy', ['id' => $item->id])}}" class="text-danger">
                    <i class="fas fa-trash-alt h6"></i>
                </a>
            </span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Ячейки</span>
                    <span class="text-primary">{{$item->cellscount}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Папки</span>
                    <span class="text-primary">{{$item->folderscount}}</span>
                </li>
            </ul>
            <a href="{{route('wardobe', ['id' => $item->id])}}" class="btn btn-outline-primary m-1 rounded-0">Посмотреть</a>
        </div>
    </section>
    @endforeach
</main>
<hr class="m-3">
@endsection