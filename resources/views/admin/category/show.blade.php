@extends('layouts.admin')
@section('content')


<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DETAIL CATEGORY</h1>
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
              
            


              
              <div class="container" style="width:500px;height:350px; text-align: justify">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product-id"><i class="fas fa-barcode"></i> Product ID:</label>
                      <div id="product-id">{{$category->id}}</div>
                    </div>
                    <div class="form-group">
                      <label for="product-cat"><i class="fas fa-folder-open"></i> Product category:</label>
                      <div id="product-cat">{{$category->cat_name}}</div>
                    </div>
                    <div class="form-group">
                      <label for="product-slug"><i class="fas fa-link"></i> Slug:</label>
                      <div id="product-slug">{{$category->slug}}</div>
                    </div>
                    <div class="form-group">
                      <label for="product-author"><i class="fas fa-user"></i> Author:</label>
                      <div id="product-author">{{$category->author}}</div>
                    </div>
                    <a class="btn btn-sm btn-primary p-3 mr-2" style="border-radius: 17%"; href="/admin/categories/{{$category->id}}/edit"> 
                      <i class="fas fa-pen"></i>
                        </a>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product-parent"><i class="fas fa-sitemap"></i> Parent:</label>
                      <div id="product-parent">{{$category->parent_id}}</div>
                    </div>
                    <div class="form-group">
                      <label for="product-status"><i class="fas fa-info-circle"></i> Status:</label>
                      <div id="product-status">{{$category->status}}</div>
                    </div>
                  
                    <div class="form-group">
                      <label for="product-author"><i class="fas fa-user"></i>Create time:</label>
                      <div id="product-author">{{$category->created_at}}</div>
                    </div>
                    <div class="form-group">
                      <label for="product-author"><i class="fas fa-user"></i> Time update:</label>
                      <div id="product-author">{{$category->updated_at}}</div>
                    </div>
                  <form style="display:inline" action='/admin/categories/{{$category->id}}' method=post>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}                                          
                      <button  class="btn btn-sm btn-danger  p-3 mr-2" style="border-radius: 17%">
                        <i class="fas fa-trash"></i>
                        </button>
                  </form> 
                </div>
              </div>   
                </div>  
              




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