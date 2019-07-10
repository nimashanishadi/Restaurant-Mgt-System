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
                  <h4 class="card-title ">Add New Category</h4>
                </div>
                <div class="card-body">
                  <div class="card-content">
                  <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                    </div>

                    <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
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