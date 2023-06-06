@extends('layouts')
@section("title")
   Show Orders
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
      @if(session()->has("delete_success"))
    <div class="alert alert-info">
      <b>deleted Successfully !!</b>
    </div>
    @endif
        <table class="table table-bordered table-responsiv w-100">
          <thead>
            <tr>
              <th>id</th>
              <th>first_name</th>
              <th>last_name</th>
              <th>phone</th>
              <th>address</th>
              <th>city</th>
              <th>payment_mode</th>
              <th>date_commande</th>
              <th>Quantite</th>
              <th>Prix</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->firstname}}</td>
                    <td>{{$item->lastname}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->payment_mode}}</td>
                    <td>{{$item->date_commande}}</td>
                    <td>{{$item->qte}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('command.destroy',['id'=>$item->id])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection