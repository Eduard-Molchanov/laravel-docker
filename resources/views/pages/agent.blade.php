@extends("template")
@section("content")
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Агент</h1>
        </div><!-- /.col -->

    </div><!-- /.row -->
    <div class="row mb-12">
        <!-- /.card -->
        <!-- Horizontal Form -->
        <div class="col-sm-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Страховой продукт - добавление</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route("products.store")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Название</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title"
                                       placeholder="Добавьте название продукта"
                                       name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost_per_year" class="col-sm-2 col-form-label">Стоимость</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="cost_per_year"
                                       placeholder="Стоимость за год"
                                       name="cost_per_year">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Описание</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="description"
                                          placeholder="описание продукта"
                                          name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agent_id" class="col-sm-2 col-form-label">Агент</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="agent_id"
                                       placeholder="Агент, который предлагает"
                                       name="agent_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="advantages" class="col-sm-2 col-form-label">Преимущества</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="advantages"
                                          placeholder="Добавьте преимущества продукта"
                                          name="advantages"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photos">Изображение продукта</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photos" name="photos" >
                                    <label class="custom-file-label" for="photos">Загрузите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить картинку</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost_for_6_months" class="col-sm-2 col-form-label">Стоимость за 6
                                месяцев</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="cost_for_6_months"
                                       placeholder="Стоимость за 6 месяцев"
                                       name="cost_for_6_months">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost_per_month" class="col-sm-2 col-form-label">Стоимость за месяц</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="cost_per_month"
                                       placeholder="Стоимость за месяц"
                                       name="cost_per_month">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount_of_discount" class="col-sm-2 col-form-label">Скидка</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="amount_of_discount"
                                       placeholder="Размер скидки"
                                       name="amount_of_discount">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_category_id" class="col-sm-2 col-form-label">Категория продукта</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="product_category_id"
                                       placeholder="добавьте категорию продукта"
                                       name="product_category_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Статус</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status"
                                       placeholder="Добавьте статус продукта"
                                       name="status">
                            </div>
                        </div>

                        <!-- Date and time -->
                        <div class="form-group  row">
                            <label>Действует до:</label>
                            <div class="input-group date" id="offer_expiration_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                       placeholder="06/15/2021 12:40 AM"
                                       data-target="#offer_expiration_date" name="offer_expiration_date"/>
                                <div class="input-group-append" data-target="#offer_expiration_date"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="options" class="col-sm-2 col-form-label">Опции</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="options"
                                          placeholder="Добавьте опции продукта"
                                          name="options"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info float-right">Добавить продукт</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div><!-- /.row -->
@endsection

