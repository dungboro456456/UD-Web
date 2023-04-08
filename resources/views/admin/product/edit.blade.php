@extends('layouts.admin')
@section('content')


<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>CREATE CATEGORY</h1>
        </div>
        <div class="col-sm-6 "> 
          <div class="row float-right"> 
            <a class="btn btn-success mr-1 px-1"  href="/admin/categories/create"><i class="fas  fa-plus"></i>Thêm</a>
            <a class="btn btn-danger mr-1 px-1"  href="/admin/categories/trash"><i class="fas  fa-trash"></i>Thùng Rác</a> 
          </div> 
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
          
              


              <form action="/admin/categories/{{$category->id}}" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">


                      <div class="form-group">
                        <label for="cat_name">Product name:</label>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        @error("cat_name")
                             {{$message}}
                        @enderror
                        @endforeach
                        </ul>
                      </div>
                        @endif

                        <input value="{{$category->cat_name}}" class="form-control" id="cat_name" name="cat_name" require placeholder="VD:Thời trang nam ">
                      </div>


                        <div class="form-group">
                          <label for="slug">Slug:</label>

                          @if ($errors->any())
                          <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->all() as $error)
                          @error("slug")
                               {{$message}}
                          @enderror
                          @endforeach
                          </ul>
                        </div>
                          @endif

                          <input value="{{$category->slug}}" class="form-control" id="slug" name="slug" require placeholder="VD:Thời-trang-nam-đẹp-số-dách, đẹp-hơn-Sơn Tùng, chấp-tùng-núi, chấp-sếp-3-bước "></input>
                        </div>
                      
                        <div class="form-group">
                          <label for="parent-id">Parent</label>
                          <select class="form-control" id="parent-id" name="parent_id">
                            <option value="0">-- Select parent id --</option>
                            @php
                          $html='';
                          $subcategorie1s=$categories->filter(function($item){
                            return $item->type==0;
                          });
                          $subcategorie2s=$categories->filter(function($item){
                            return $item->type==1;
                          });

                          foreach($subcategorie1s as $category1){
                                 if($category->parent_id==$category1->id) $html.='<option value="'.$category1->id.'"selected>'.$category1->cat_name.'</option>';
                          else
                          $html.='<option value="'.$category1->id.'">'.$category1->cat_name.'</option>';
                          foreach($subcategorie2s as $category2){
                                if($category2->parent_id==$category1->id) 
                                if($category->parent_id==$category2->id)
                                $html.='<option value="'.$category2->id.'"selected>--'.$category2->cat_name.'</option>';
                             else
                             $html.='<option value="'.$category2->id.'">--'.$category2->cat_name.'</option>';

                              }
                                          
                          };
                          echo $html;

                          @endphp

                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                          <label  for="status">Status:</label>
                          <select class="form-control" id="status" name="status">
                          <option value="{{$category->status}}">On</option>
                          <option value="{{$category->status}}">Off</option>
                          </select>
                          </div>


                          <div class="form-group">
                            <label for="type">Type:</label>
    
                      
    
                          <select name="type" id="type">
                            <option value="0" {{($category->type==0)?'selected':''}}>0</option>
                            <option value="1" {{($category->type==0)?'selected':''}}>1</option>
                            <option value="2" {{($category->type==0)?'selected':''}}>2</option>

                          
                          </select>             
                          </div>


                          <div class="form-group">
                            <label for="author">Author:</label>
    
                            @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            @error("author")
                                 {{$message}}
                            @enderror
                            @endforeach
                            </ul>
                          </div>
                            @endif
    
                            <input value="{{$category->author}}" class="form-control" id="cat_name" name="cat_name" require placeholder="VD:Thời trang nam ">
                          </div>


                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                          <button data-value type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                          </div>
                          </div>
                </div>
                </form>






            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  @endsection