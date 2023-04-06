@extends('layouts.app')
@section('title') {!!"New floor"!!} @endsection

@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add New Floor</h1>
  
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
   
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Generate floors and Flats</h5>

          <!-- Vertical Form -->
          <form action="{{url('floor_add')}}" class="row g-3" method='post'>@csrf 
            <!--div class="col-12">
              <label for="inputNanme4" class="form-label">Floor Name</label>
              <input type="text" name="floor" class="form-control" id="inputNanme4">
            </div-->

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Generate Floors and Flats</button>
              
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
  
    </div>
  </div>
  @if (session('add-fail'))
              <div class="alert alert-danger">
              {{ session('add-fail') }}
              </div>
@endif
@if (session('add-success'))
              <div class="alert alert-success">
              {{ session('add-success') }}
              </div>
@endif
</section>

</main><!-- End #main -->
@endsection
