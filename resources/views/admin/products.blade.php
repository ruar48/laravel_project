<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  #current_image {
    max-width: 100%; /* Ensure it fits within the modal */
    height: auto;    /* Maintain aspect ratio */
}

</style>
</head>
  <body class=" hold-transition sidebar-mini layout-navbar-fixed sidebar-closed layout-fixed">

<div class="wrapper">



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>

    
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <i class="right fas fa-angle-down"></i>

        </a>
       
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('admin.includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="card">
            <div class="card-header">
     

@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endforeach

              {{-- <h3 class="card-title">DataTable with default features</h3> --}}
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Launch demo modal
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Parent Product</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Serial Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                                @else
                                    <img src="{{ asset('dist/img/no.webp') }}" alt="{{ $product->name }}" width="100">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td data-parent-id="{{ $product->parent_id ?? '' }}"">
                                @if($product->parent_id)
                                    {{ $product->parent->name }}
                                @else
                                    —Original
                                @endif
                            </td>
                            <td data-category-id="{{ $product->category->id ?? '' }}">{{ $product->category->category_name }}</td>
                            <td >{{ $product->quantity }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->serial_number }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-edit text-light mb-2 mr-2 btn-rounded" data-id="{{ $product->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger btn-delete text-light mb-2 btn-rounded" data-id="{{ $product->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal -->
<!-- First Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Product <i class="fa fa-box me-2"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('action.product.add') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="image">Product Image</label>
              <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
              @error('image')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
              <div class="mt-2 justify-content-center d-flex">
                  <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px;">
              </div>
          </div>
              <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                  @error('name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      
              <div class="form-group">
                  <label for="category_id">Category</label>
                  <select class="form-control" id="category_id" name="category_id">
                      <option value="">Select a category</option>
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                              {{ $category->category_name }}
                          </option>
                      @endforeach
                  </select>
                  @error('category_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      
              <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" value="{{ old('quantity') }}" min="0">
                  @error('quantity')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      
              <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
                  @error('price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      
              <div class="form-group">
                  <label for="serial_number">Serial Number</label>
                  <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Enter serial number" value="{{ old('serial_number') }}">
                  @error('serial_number')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
      
              
      
              <div class="form-group">
                  <label for="parent_id">Parent Product (Optional)</label>
                  <select class="form-control" id="parent_id" name="parent_id">
                      <option value="">Select a parent product (if any)</option>
                      @foreach($products as $product)
                          <option value="{{ $product->id }}" {{ old('parent_id') == $product->id ? 'selected' : '' }}>
                              {{ $product->name }}
                          </option>
                      @endforeach
                  </select>
                  @error('parent_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
      
   
      
        
      </div>
    </div>
  </div>
</div>

<!-- Second Modal -->
<!-- Update Product Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalTitle">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('action.product.update') }}">
          @csrf
          <!-- Hidden field to hold the ID of the product -->
          <input type="hidden" id="id" name="id">

          <div class="form-group">
            <label for="current_image">Current Image</label><br>
            <img id="current_image" src="" alt="Product Image" width="100">
          </div>

          <!-- Input for New Image -->
          <div class="form-group">
            <label for="image">Change Image</label>
            <input type="file" class="form-control" id="image_new" name="image">
          </div>

          <!-- Name input field -->
          <div class="form-group">
            <label for="name_update">Name</label>
            <input type="text" class="form-control" id="name_update" name="name" placeholder="Enter product name">
          </div>

          <div class="form-group">
            <label for="parent_product_update">Parent Product</label>
            <select class="form-control" id="parent_product_update" name="parent_product_id">
                <option value="">Select a parent product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('parent_product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        

          <!-- Category input field -->
          <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id_update" name="category_id">
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

          <!-- Quantity input field -->
          <div class="form-group">
            <label for="quantity_update">Quantity</label>
            <input type="number" class="form-control" id="quantity_update" name="quantity" placeholder="Enter quantity">
          </div>

          <!-- Price input field -->
          <div class="form-group">
            <label for="price_update">Price</label>
            <input type="text" class="form-control" id="price_update" name="price" placeholder="Enter price">
          </div>

          <!-- Serial Number input field -->
          <div class="form-group">
            <label for="serial_number_update">Serial Number</label>
            <input type="text" class="form-control" id="serial_number_update" name="serial_number" placeholder="Enter serial number">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Third Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Product <i class="fa fa-bos me-2"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('action.product.delete') }}">
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- ./wrapper -->



@include('admin.includes.scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    function previewImage(event) {
              var reader = new FileReader();
              var output = document.getElementById('imagePreview');
              
              reader.onload = function() {
                  output.src = reader.result;
                  output.style.display = 'block';
              }
              
              if (event.target.files[0]) {
                  reader.readAsDataURL(event.target.files[0]);
              } else {
                  output.src = '#';
                  output.style.display = 'none';
              }
          }
  </script>
  <script>
    $(document).ready(function() {

      $('.btn-edit').click(function() {
    var id = $(this).data('id');
    console.log('Edit button clicked with ID:', id);

    var row = $(this).closest('tr');
    var imageUrl = row.find('td:eq(1) img').attr('src');
    var name = row.find('td:eq(2)').text().trim();
    var parentProductId = row.find('td:eq(3)').data('parent-id'); // Parent product ID
    var categoryId = row.find('td:eq(4)').data('category-id'); // Assuming the category ID is stored as a data attribute
    var quantity = row.find('td:eq(5)').text().trim();
    var price = row.find('td:eq(6)').text().trim();
    var serialNumber = row.find('td:eq(7)').text().trim();
console.log(parentProductId)

    $('#updateModal #id').val(id);
    $('#updateModal #name_update').val(name);
    $('#updateModal #parent_product_update').val(parentProductId);
    $('#updateModal #category_id_update').val(categoryId);
    $('#updateModal #quantity_update').val(quantity);
    $('#updateModal #price_update').val(price);
    $('#updateModal #serial_number_update').val(serialNumber);

    $('#updateModal #current_image').attr('src', imageUrl);
    console.log('Current image URL set to:', imageUrl);

    $('#updateModal').modal('show');
  });

  // Handle image file change
  $('#image_new').change(function() {
    var file = this.files[0];
    console.log('File selected:', file);

    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var newImageUrl = e.target.result;
        console.log('New image preview URL:', newImageUrl);
        $('#current_image').attr('src', newImageUrl);
      }
      reader.readAsDataURL(file);
    } else {
      console.log('No file selected.');
    }
  });



    // Hide the modal when the close button is clicked
    $('#deleteModal .close').click(function() {
        $('#updateModal').modal('hide');
    });

    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        
        // Set the values in the modal
        $('#deleteModal #id').val(id);        
        // Show the modal
        $('#deleteModal').modal('show');
    });

    // Hide the modal when the close button is clicked
    $('#deleteModal .close').click(function() {
        $('#deleteModal').modal('hide');
    });
});

  </script>
</body>
</html>
