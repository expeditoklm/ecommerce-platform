@extends('base')
@section('content')


    <!-- main -->
    <main class="main-content-wrapper">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row mb-8">
          <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
              <!-- page header -->
              <div>
                <h2 style="margin-left: 250px;">Create account</h2>

              </div>
              <!-- button -->
              <div>
                <a href="{{ route('choice.away') }}" class="btn btn-light">Back </a>
              </div>
            </div>

          </div>
        </div>
        <!-- row -->
        <div class="row">

          <div class="col-lg-8 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg "  style="margin-left: 250px;" >
              <!-- card body -->
              <div class="card-body p-6 " >
                <h4 class="mb-4 h5">Account Information</h4>
                <div class="row">
                  <!-- input -->
                  <div class="mb-3 col-lg-12">
                    <label class="form-label">Account Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" required>
                  </div>
                  <!-- input -->
                
                  <!-- input -->
               
                  <!-- input -->
              
                  <div>
                    <div class="mb-3 col-lg-12 mt-5">
                      <!-- heading -->
                      <h4 class="mb-3 h5">Account logo</h4>

                      <!-- input -->
                      <form action="#" class="d-block dropzone border-dashed rounded-2 ">
                        <div class="fallback">
                          <input name="file" type="file" multiple>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-12 mt-5">
                    <h4 class="mb-3 h5">Description</h4>
                    <div class="py-8" id="editor"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-4 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6">
                <!-- input -->

                <!-- input -->
                <div>
                  <div class="mb-3">
                    <label class="form-label">Pays</label>
                    <select class="form-select">
                      <option selected>Product Category</option>
                      <option value="Dairy, Bread & Eggs">Dairy, Bread & Eggs</option>
                      <option value="Snacks & Munchies">Snacks & Munchies</option>
                      <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                    </select>
                  </div>
                  <!-- input -->
                  <div class="mb-3">
                    <label class="form-label">Ville</label>
                    <select class="form-select">
                      <option selected>Product Category</option>
                      <option value="Dairy, Bread & Eggs">Dairy, Bread & Eggs</option>
                      <option value="Snacks & Munchies">Snacks & Munchies</option>
                      <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Quartier</label>
                    <select class="form-select">
                      <option selected>Product Category</option>
                      <option value="Dairy, Bread & Eggs">Dairy, Bread & Eggs</option>
                      <option value="Snacks & Munchies">Snacks & Munchies</option>
                      <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                    </select>
                  </div>

                  <!-- input -->
 

                </div>
              </div>
            </div>
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
    
            </div>
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6">

                <!-- input -->
                <div class="mb-3">
                  <label class="form-label">Slogan</label>
                  <textarea class="form-control" rows="3" placeholder="Veillez entrer votre Slogan"></textarea>
                </div>
              </div>
            </div>
            <!-- button -->
            <div class="d-grid">
              <a href="#" class="btn btn-primary">
                Create account
              </a>
            </div>
          </div>

        </div>
      </div>
    </main>




@section('script')
  <script src="../assets/libs/quill/dist/quill.min.js"></script>
  <script src="../assets/js/vendors/editor.js"></script>
  <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>

@endsection




@endsection 