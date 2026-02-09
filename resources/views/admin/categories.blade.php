@extends('admin/base')
@section('contenue')

    <!-- main -->
    <main class="main-content-wrapper">
      <div class="container">
        <!-- row -->
        <div class="row mb-8">
          <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
              <!-- pageheader -->
              <div>
                <h2>Categories</h2>

              </div>
              <!-- button -->

            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
              <div class=" px-6 py-6 ">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                    <!-- form -->
                    <form class="d-flex" role="search">
                      <input class="form-control" type="search" placeholder="Search Category" aria-label="Search">
                    </form>
                  </div>
                  <!-- select option -->
                  
                </div>
              </div>
              <!-- card body -->
              <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive ">
                  <table class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                    <thead class="bg-light">
                      <tr>

                        <th>Icone</th>
                        <th>Product Category</th>
                        <th></th>

                        <th>Icone</th>
                        <th>Services Category</th>
                        <th></th>

                        <th>Icone</th>
                        <th>Location Category</th>
                        <th></th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td>
                          <a href="#!"> <img src="../assets/images/icons/snacks.svg" alt=""
                            class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Snack & Munchies</a></td>
                        <td>12</td>
                        <td>
                          <a href="#!"> <img src="../assets/images/icons/snacks.svg" alt=""
                            class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Snack & Munchies</a></td>
                        <td>12</td>
                        <td>
                          <a href="#!"> <img src="../assets/images/icons/snacks.svg" alt=""
                            class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Snack & Munchies</a></td>
                        <td>12</td>

                      </tr>
                      <tr>


                        <td>
                          <a href="#!"> <img src="../assets/images/icons/bakery.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Bakery & Biscuits</a></td>
                        <td>8</td>

                    

                        <td>
                          <a href="#!"> <img src="../assets/images/icons/bakery.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Bakery & Biscuits</a></td>
                        <td>8</td>

                    

                      
                      </tr>
                      <tr>

                        <td>
                          <a href="#!"> <img src="../assets/images/icons/baby-food.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Baby Care</a></td>
                        <td>32</td>



                        <td>
                          <a href="#!"> <img src="../assets/images/icons/baby-food.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Baby Care</a></td>
                        <td>32</td>




      
                       
                      </tr>
                      <tr>

                        <td>
                          <a href="#!"> <img src="../assets/images/icons/wine.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Cold Drinks & Juices</a></td>
                        <td>34</td>

                        <td></td>
                       
                      </tr>
                      <tr>

         
                        <td>
                          <a href="#!"> <img src="../assets/images/icons/toiletries.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Toiletries</a></td>
                        <td>23</td>

                        <td></td>
   
                      </tr>
                      <tr>


                        <td>
                          <a href="#!"> <img src="../assets/images/icons/dairy.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Dairy, Bread & Eggs</a></td>
                        <td>16</td>

                        <td></td>

                      </tr>
                      <tr>

                        <td>
                          <a href="#!"> <img src="../assets/images/icons/fish.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Chicken, Meat & Fish</a></td>
                        <td>14</td>

                        <td></td>
                 

                      </tr>
                      <tr>


                        <td>
                          <a href="#!"> <img src="../assets/images/icons/fruit.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Fruits & Vegetables</a></td>
                        <td>32</td>
                        <td></td>

  
                      </tr>
                      <tr>


                        <td>
                          <a href="#!"> <img src="../assets/images/icons/petfoods.svg" alt=""
                              class="icon-shape icon-sm"></a>
                        </td>
                        <td><a href="#" class="text-reset">Pet Food</a></td>
                        <td>25</td>

                     
                        <td></td>

                       
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="border-top d-md-flex justify-content-between align-items-center  px-6 py-6">
                <span>Showing 1 to 8 of 12 entries</span>
                <nav class="mt-2 mt-md-0">
                  <ul class="pagination mb-0 ">
                    <li class="page-item disabled"><a class="page-link " href="#!">Previous</a></li>
                    <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>




@endsection 