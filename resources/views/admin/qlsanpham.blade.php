@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
            @foreach ($hoa as $item)
            <div class="col-md-4">
                
                <div class="card">
                  <div class="card-header">
                  <h5 class="card-title">{{$hoa->tenhoa}}</h5>
                  </div>
                  <img src="img/{{$hoa->img }}" class="card-img-top" alt="...">
                  <div class="card-body">
                   
                    <p class="card-text">{{$hoa->mota}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
                @endforeach
              
              <div class="d-flex justify-content-center">
            {{ $hoa->links('pagination::bootstrap-5') }}

                </div>
            </div>
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
@endsection