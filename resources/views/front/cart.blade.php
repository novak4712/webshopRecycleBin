@extends('back.admin-index')

@section('content')
    @if(isset($products))
    <ul class="list-group">
        <!-- Выводим списком добавленные позиции товаров -->

            @foreach($products as $product)

                <li class="list-group-item">
                    {{ $product['item']['name'] }}
                    <br>
                    Цена: {{ $product['price'] }}
                    <span class="badge">{{ $product['qty'] }}</span>
                    {!! Form::open(['method' => 'get', 'route' => ['product.reduceByOne', $product['item']->id]]) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </li>
            @endforeach

    </ul>
    <hr>
    Общая количество: {{ $totalQty }}
    <br>
    Общая цена: {{ $totalPrice }}
    {!! Form::open(['method' => 'get', 'route' => ['product.remove', $product['item']->id]]) !!}
    {{ method_field('DELETE') }}
    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @endif
    <a href="{{ route('main') }} " class="btn btn-primary" style="margin: 20px;">Вернуться в магазин</a>
@endsection