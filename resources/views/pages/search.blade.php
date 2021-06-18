@extends("template")
@section("content")
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Поиск страховых продуктов</h3>

                    <div class="card-tools">
                        <form method="get" action="{{route("search")}}">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 750px;">

                                <input type="text" name="s" class="form-control float-right"
                                       placeholder="Search ...">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 550px;">
                    <table class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr class="expandable-body">
                            <th>ID</th>
                            <th>Категория</th>
                            <th>Название</th>
                            <th>Стоимость за год, руб.</th>
                            <th>Детальнее ...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products)
                            @foreach($products as $product)

                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_category_id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->cost_per_year}}</td>
                                    <td><a href="/product-detail/{{$product->id}}"> Посмотреть этот продукт</a></td>
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
    <!-- /.row -->
    @if($products)
        <div class="row">
            <div class="col-md-12">
                {{$products->appends(["s"=>request()->s])->links()}}
            </div>
        </div>
    @endif
@endsection
