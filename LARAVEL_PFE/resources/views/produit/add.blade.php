@extends('layouts')
@section("style_css")
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script>
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    }
  };
  //Initialize an array to store image file names
  var imageFiles = [];
  myGreatDropzone.on("succes",function(file,response){
    imageFiles.push(file.name)
  })

  document.querySelector("#myForm").addEventListener("submit", function(e) {
    // Get the form's action URL
    var actionUrl = this.getAttribute("action");

    // Convert the imageFiles array into a serialized JSON string
    var imageFilesParam = "imageFiles=" + JSON.stringify(imageFiles);

    // Append the imageFilesParam to the action URL
    this.setAttribute("action", actionUrl + "?" + imageFilesParam);
</script>
@endsection
@section("title")
   add Produit
@endsection
@section("content")
<div class="content-wrapper p-4">
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
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" id="myForm">
      @csrf
      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter the product title" name="title">
      </div>
      <div class="form-group">
          <label for="prix">Price</label>
          <input type="number" min=0 class="form-control" id="prix" placeholder="Enter the product price" name="price">
      </div>
      <div class="form-group">
        <label for="prix">Promotion</label>
        <input type="number" min=0 class="form-control" id="prix" placeholder="Enter the discount" name="discount">
    </div>
    <div class="form-group">
      <label for="">Categorie</label>
      <select class="form-control" name="Categorie">
        <option>--------Choose A category--------------</option>
        @foreach ($categorie as $item)
        <option>{{$item->categorie}}</option>
      @endforeach
      </select>
  </div>
  <div class="form-group">
    <label for="">Type</label>
    <select class="form-control" name="type">
      <option>--------------Choose A type----------------</option>
       @foreach ($type as $item)
       <option>{{$item->type}}</option> 
       @endforeach
    </select>
</div>
<div class="form-group">
  <label for="">Marque</label>
  <select class="form-control" name="marque">
    <option>---------------Choose A marque-------------------------</option>
     @foreach ($marque as $item)
     <option>{{$item->marque}}</option> 
     @endforeach
  </select>
</div>
      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" placeholder="Enter the product description" name="Description" id=""
              cols="30" rows="10"></textarea>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Images</h3>
            </div>
            <div class="card-body">
              <div id="actions" class="row">
                <div class="col-lg-6">
                  <div class="btn-group w-100">
                    <span class="btn btn-success col fileinput-button">
                      <i class="fas fa-plus"></i>
                      <span>Add files</span>
                    </span>
                   
                  </div>
                </div>
                
              </div>
              <div class="table table-striped files" id="previews">
                <div id="template" class="row mt-2">
                  <div class="col-auto">
                      <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                  </div>
                  <div class="col d-flex align-items-center">
                      <p class="mb-0">
                        <span class="lead" data-dz-name></span>
                        (<span data-dz-size></span>)
                      </p>
                      
                  </div>
                  <div class="col-4 d-flex align-items-center">
                      <div></div>
                  </div>
                  <div class="col-auto d-flex align-items-center">
                    <div class="btn-group">
                      <button data-dz-remove class="btn btn-danger delete">
                        <i class="fas fa-trash"></i>
                        <span>Delete</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
          <!-- /.card -->
        </div>
      </div>
   
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
 
      </div>
      <script>
       Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  url: "/target-url", // Set the url
  thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
  previewTemplate: previewTemplate,
  autoQueue: false, // Make sure the files aren't queued until manually added
  previewsContainer: "#previews", // Define the container to display the previews
  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})



// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
  document.querySelector("#total-progress").style.opacity = "0"
})


document.querySelector("#actions .cancel").onclick = function() {
  myDropzone.removeAllFiles(true)
}
      </script>    
@endsection
