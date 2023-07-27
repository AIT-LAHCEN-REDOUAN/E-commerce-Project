@extends('layouts')
@section("title")
   Edit Product
@endsection
@section("content")
<div class="content-wrapper p-4" >
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    <form method="GET" enctype="multipart/form-data" id="productForm" action="{{route('product.update',["id"=>$data->id])}}">
        @csrf   
        <div class="form-group">
            <label for="title">id</label>
            <input value="{{$data->id}}" type="text" class="form-control" id="id" placeholder="Enter the product title" name="id" disabled>
          </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input value="{{$data->title}}" type="text" class="form-control" id="title" placeholder="Enter the product title" name="title">
        </div>
        <div class="form-group">
          <label for="prix">Price</label>
          <input value="{{$data->prix}}" type="number" min=0 class="form-control" id="prix" placeholder="Enter the product price" name="price">
        </div>
        <div class="form-group">
          <label for="prix">Promotion</label>
          <input value="{{$data->promotion}}" type="number" min=0 class="form-control" id="prix" placeholder="Enter the discount" name="discount">
        </div>
        <div class="form-group">
          <label for="prix">Stock Quantity</label>
          <input value="{{$data->quantity_stock}}" type="number" min=0 class="form-control" id="prix" placeholder="Enter the stock Quantity" name="stock">
        </div>
        <div class="form-group">
          <label for="">Categorie</label>
          <select class="form-control" name="Categorie">
            <option>--------Choose A category--------------</option>
            @foreach ($categorie as $item)
            <option value="{{$item->id}}">{{$item->categorie}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Type</label>
          <select class="form-control" name="type">
            <option disabled selected>--------------Choose A type----------------</option>
            @foreach ($type as $item)
            <option value="{{$item->id}}">{{$item->type}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Marque</label>
          <select class="form-control" name="marque">
            <option>---------------Choose A marque-------------------------</option>
            @foreach ($marque as $item)
            <option value="{{$item->id}}">{{$item->marque}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" placeholder="Enter the product description" name="Description" id="" cols="30" rows="10">
            {{$data->description}}
          </textarea>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Images</h3>
              </div>
              <div class="card-body">
              <input type="file" name="images[]" id="" class="" multiple>
              </div>
    
            </div>
    
            <!-- /.card -->
            <br>
            <input type="file" name="images[]" id="images" multiple hidden class="form-control">
            <button  type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    
    
      </form>
</div>
@endsection