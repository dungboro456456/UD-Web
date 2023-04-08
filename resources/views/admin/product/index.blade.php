@extends('layouts.admin')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>PRODUCT LIST</h1>
          <div name="Notification" class="badge bg-success text-wrap fs-2" style="font-size:20px "> {!! \Session::get('success') !!}</div>

        </div>
        <div class="col-sm-6 "> 
          <div class="row float-right"> 
            <a class="btn btn-success mr-1 px-1"  href="/admin/categories/create"><i class="fas  fa-plus"></i>Thêm</a>
            <a class="btn btn-danger mr-1 px-1"  href="/admin/categories/trash"><i class="fas  fa-trash"></i>Thùng Rác</a> 
          </div> 
        </div> 
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content"> 
   
 
    <!-- Default box --> 
    <div class="card"> 
      <div class="card-header"> 
        <h3 class="card-title">Table</h3>  
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
        <table class="table table-bordered table-hover table-striped"> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th style='width:90px;' class="text-center">image</th> 
                    <th>name</th> 
                    <th>loại</th> 
                    <th>Ngày tạo</th> 
                    <th>Chức năng</th> 
                    <th>ID</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php foreach($categories as $category):?> 
                <tr> 
                    <td> 
                        <input type="checkbox"> 
                    </td> 
                    <td><?=$category['image']?></td> 
                    <td><?=$category['cat_name']?></td> 
                    <td><?=$category['slug']?></td> 
                    <td><?=$category['created_at']?></td> 
                    <td>
    
                    <div class="container " style="align-items:center">
                                   <?php if($category['status']==1):?>
                                    <a class="btn btn-sm btn-success p-3 mr-2" style="border-radius: 17%"; href="/admin/categories/{{$category->id}}/status"> 
                                      <i class="fas fa-toggle-on"></i>
                                      </a>
                                  <?php else:?>
                                    <a class="btn btn-sm btn-danger p-3 mr-2" style="border-radius: 17%"; href="/admin/categories/{{$category->id}}/status"> 
                                      <i class="fas fa-toggle-off"></i>
                                      </a>
                                  <?php endif;?>
    
                                  <a class="btn btn-sm btn-info p-3 mr-2"  style="border-radius: 17%"; href="/admin/categories/{{$category->id}}"> 
                                    <i class="fas fa-info"></i>
                                  </a>
    
                                  <a class="btn btn-sm btn-primary p-3 mr-2" style="border-radius: 17%"; href="/admin/categories/{{$category->id}}/edit"> 
                                    <i class="fas fa-pen"></i>
                                      </a>
                                 
                                      <form style="display:inline" action='/admin/categories/{{$category->id}}' method=post>
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}                                          
                                          <button  class="btn btn-sm btn-danger  p-3 mr-2" style="border-radius: 17%">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                      </form>      
                                  
    
                    </td> 
                    <td><?=$category['id']?></td> 
                </tr> 
                <?php endforeach;?> 
            </tbody> 
        </table>
         {!!
          $categories->withQueryString()->links('pagination::bootstrap-5')
          !!}
      </div> 

      <!-- /.card-body --> 
      
      <!-- /.card-footer--> 
    </div> 
    <!-- /.card --> 
     
    </section> 


  @endsection