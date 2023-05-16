@extends('layouts')
@section('title')
    add Produit
@endsection
<<<<<<< HEAD
@section("content")
<div class="content-wrapper p-4">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>
=======
@section('content')
    <div class="content-wrapper p-4">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
>>>>>>> dae726a85cd6d17fdc1f5da95477d2189beb190e

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
<<<<<<< HEAD
        <!-- ./col -->
    </div>
    <form action="" method="GET" enctype="multipart/form-data">
      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter the product title">
      </div>
      <div class="form-group">
          <label for="prix">Price</label>
          <input type="text" class="form-control" id="prix" placeholder="Enter the product price">
      </div>
      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" placeholder="Enter the product description" name="" id=""
              cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
          <label for="image-upload">Image</label>
          <div id="image-upload" class="dropzone"></div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      </div>
          @push('scripts')
            
    
          @endpush
          @push('styles')
              
          @endpush
            
              
      
      @endsection
      
=======
        <div class="form-group p-2">
            <label>Produit</label>
            <input type="text" class="form-control" placeholder="Entrer le Titre du Produit" name="Produit" />
            <br>
            <label>Prix</label>
            <input type="number" class="form-control" placeholder="Entrer e Prix du Produit" name="prix" />
            <br>
            <label>Description</label>
            <br>
            <textarea class="form-control" name="desciption" placeholder="entrer une description du Produit"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
>>>>>>> dae726a85cd6d17fdc1f5da95477d2189beb190e
