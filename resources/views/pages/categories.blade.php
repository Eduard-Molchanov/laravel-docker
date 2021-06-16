@extends("template")
@section("content")
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Категории страховых продуктов</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 800px;">
                    <table class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr class="expandable-body">
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Детальнее ...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)

                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td> <a href="/category/{{$category->id}}">Продукты категории </a></td>

                                </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

@endsection
