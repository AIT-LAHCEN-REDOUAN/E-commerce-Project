@extends('layouts')
@section("title")
   show Produit
@endsection
@section("content")
<div class="content-wrapper p-4">
     <div class="row">
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
        @if(session()->has("delete_success"))
    <div class="alert alert-info">
      <b>deleted Successfully !!</b>
    </div>
    @endif
    
    @if(session()->has("update_success"))
        <div class="alert alert-info ">
          <b>Updated Successfully !!</b>
        </div>
    @endif
        <table class="table table-bordered table-responsive w-100">
          <thead>
            <tr>
              <th>id</th>
              <th>image</th>
              <th>title</th>
              <th>description</th>
              <th>categorie</th>
              <th>type</th>
              <th>marque</th>
              <th>quantity Stock</th>
              <th>prix</th>
              <th>promotion</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
               @foreach($product as $item)
               <tr>
                 <td>{{$item->id}}</td>
                <td>
                 <img class="img-fluid" src="{{$item->image}}"/> 
                 
                </td>
                 <td>{{$item->title}}</td>
                 <td>{{$item->description}}</td>
                 <td>{{$item->categorie}}</td>
                 <td>{{$item->type}}</td>
                 <td>{{$item->marque}}</td>
                 <td>{{$item->quantity_stock}}</td>
                 <td>{{$item->prix}}</td>
                 <td>{{$item->promotion}}</td>
                 <td><a href="{{route('product.destroy',['id'=>$item->id]) }}" class="btn btn-danger">Delete</a></td>
                 <td><a href="{{route('product.edit',['id'=>$item->id]) }}" class="btn btn-success">Edit</a></td>
               </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
