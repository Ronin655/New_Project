@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>
{{--@todo Не загружает картинки и галочки в рекомендациях и не удаляет 1 запис--}}
        <!-- Main content -->
        <section class="content">
            {!! Html::form('PUT', route('posts.update', $post->id))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                   value="{{$post->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{$post->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {!! html()->select('category_id', $categories, $post->category ? $post->category->id : null)
                              ->class('form-control select2') !!}
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            {!! html()->multiselect('tags[]',$tags, $selectedTags)->class('form-control select2')
                                ->attribute('data-placeholder', 'Выберите теги')
                                ->style(['width' => "100%"]) !!}
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="{{$post->date}}" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {!! Html::checkbox('is_featured', '1', $post->is_featured)->class(['minimal']) !!}
                            </label>
                            <label>
                                Рекомендовать
                            </label>
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {!! Html::checkbox('status', '1', $post->is_featured)->class(['minimal']) !!}
                            </label>
                            <label>
                                Черновик
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control select2">
              </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {!! Html::form()->close() !!}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
