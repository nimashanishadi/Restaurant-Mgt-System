@extends('layouts.app')
 
@push('css')

@endpush

@section('content')

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

                    @if ($errors->any())                       
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ $error }}</span>
                                    </div>

                                @endforeach
                        </div>
                    @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Slider</h4>
                </div>
                <div class="card-body">
                  <div class="card-content">
                  <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                    </div>

                     <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Sub Title</label>
                            <input type="text" class="form-control" name="sub_title">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Image</label><br>
                          <input type="file" name="image">
                      </div>
                    </div><br>
                    <a href="{{route('slider.index')}}" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primaey">Save</button>
                 <form/> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')

@endpush