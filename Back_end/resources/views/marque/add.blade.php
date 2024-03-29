@extends('layouts')
@section("title")
   add Marque
@endsection
@section("content")
<div class="content-wrapper p-4" >
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
      </div> 
      @if(session()->has("success"))
    <div class="alert alert-info">
      <b>Added Successfully !!</b>
    </div>
    @endif
        <form enctype="multipart/form-data" action="{{route('marque.store')}}" method="post"> 
          @csrf
        <div class="form-group">
          <label>marque</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="categorie" placeholder="Entrer Une marque" name="marque">
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Images</h3>
                </div>
                <div class="card-body">
                <input type="file" name="images">
                </div>
      
              </div>
      
              <!-- /.card -->
              <br>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a  class="btn btn-info" href="{{route('marque.index')}}">afficher Les marque</a>
    </form>
</div>
@endsection