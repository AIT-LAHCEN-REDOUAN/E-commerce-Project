@extends('layouts')
@section("title")
   edit categorie
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
      @if(session()->has("success"))
    <div class="alert alert-info">
      <b>Modified Successfully !!</b>
    </div>
    @endif
   
    <form class="" action="{{route('category.update', ['id'=>$data->id]) }}" method="GET"> 
      @csrf
      <div class="form-group">
        <label>id</label>
        <input value={{$data->id}} type="text" disabled class="form-control"/>
        <br>
        <label>Categorie</label>
        <input value={{$data->categorie}} type="text" class="form-control" id="exampleInputEmail1" aria-describedby="categorie" placeholder="Entrer Un categorie" name="categorie">
        <br>
        <label>created_At</label>
        <input value={{$data->created_at}} type="text" disabled class="form-control" />
        <br>
        <label>updated_At</label>
        <input value={{$data->updated_at}} type="text" disabled class="form-control" />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   
    
</div> 
@endsection