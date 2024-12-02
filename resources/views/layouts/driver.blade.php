@extends('layouts.app') @section('content') @include('includes.header')
@include('includes.Sidebar')
<body>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Driver Details</h1>
            
        </div>
      

        <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
           

          
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">First_name</th>
                    <th scope="col">Last_name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Document</th>
                    <th scope="col">Vehicle Details</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>abc@gmail.com</td>
                    <td>123456789</td>
                    <td>100.00</td>
                    <td>pdf</td>
                    <td>0</td>
                    <td><a href="#">Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>abc@gmail.com</td>
                    <td>123456789</td>
                    <td>100.00</td>
                    <td>pdf</td>
                    <td>0</td>
                    <td><a href="#">Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>abc@gmail.com</td>
                    <td>123456789</td>
                    <td>100.00</td>
                    <td>pdf</td>
                    <td>0</td>
                    <td><a href="#">Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>abc@gmail.com</td>
                    <td>123456789</td>
                    <td>100.00</td>
                    <td>pdf</td>
                    <td>0</td>
                    <td><a href="#">Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>abc@gmail.com</td>
                    <td>123456789</td>
                    <td>100.00</td>
                    <td>pdf</td>
                    <td>1</td>
                    <td><a href="#">Edit</a></td>
                  </tr>
                </tbody>
              </table>
      
            </div>
          </div>

        

          

          

          

        </div>

        
      </div>
    </section>

    @endsection('content')
</body>
