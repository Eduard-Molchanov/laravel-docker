@extends("template")
@section("content")

    <h1>Тут будет каталог продуктов</h1>
    <ul>
        <li>
            <a href="{{route("products.show",['product'=>1])}}">Продукт 1</a> |
            <a href="{{route("products.edit",['product'=>1])}}">Редактировать продукт 1</a>
            <form action="{{route("products.destroy",["product"=>1])}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{route("products.show",['product'=>2])}}">Продукт 2</a> |
            <a href="{{route("products.edit",['product'=>2])}}">Редактировать продукт 2</a>
            <form action="{{route("products.destroy",["product"=>2])}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{route("products.show",['product'=>3])}}">Продукт 3</a> |
            <a href="{{route("products.edit",['product'=>3])}}">Редактировать продукт 3</a>
            <form action="{{route("products.destroy",["product"=>3])}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{route("products.show",['product'=>4])}}">Продукт 4</a> |
            <a href="{{route("products.edit",['product'=>4])}}">Редактировать продукт 4</a>
            <form action="{{route("products.destroy",["product"=>4])}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{route("products.show",['product'=>5])}}">Продукт 5</a> |
            <a href="{{route("products.edit",['product'=>5])}}">Редактировать продукт 5</a>
            <form action="{{route("products.destroy",["product"=>5])}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
            </form>
        </li>

    </ul>
@endsection
