@extends('layouts')
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
      <br>
      <button  type="submit" class="btn btn-primary">Submit</button>

     
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

//myDropzone.on("addedfile", function(file) {
  // Hookup the start button
 // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
//})

// Update the total progress bar
//myDropzone.on("totaluploadprogress", function(progress) {
 // document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
//})

//myDropzone.on("sending", function(file) {
  // Show the total progress bar when upload starts
 // document.querySelector("#total-progress").style.opacity = "1"
  // And disable the start button
  //file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
//})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
  document.querySelector("#total-progress").style.opacity = "0"
})

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
//document.querySelector("#actions .start").onclick = function() {
  //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
//}
document.querySelector("#actions .cancel").onclick = function() {
  myDropzone.removeAllFiles(true)
}
      </script>    
@endsection
      