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
        <table class="table table-bordered table-responsive w-100">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>prenom</th>
                <th>email</th>
                <th>message</th>
                <th>created_at</th>
                <th>updated_at</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($messages as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->message}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a class="btn btn-danger" href="{{route('message.destroy', ['id'=>$item->id])}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection