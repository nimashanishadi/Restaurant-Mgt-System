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
                  <h4 class="card-title ">Edit an Item</h4>
                </div>
                <div class="card-body">
                  <div class="card-content">
                  <form method="POST" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">name</label>
                          <input type="text" class="form-control" name="name" value="{{ $item->name}}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Category</label>
                            <select class="form-control" name="category">
                            @foreach($categories as $category)
                              <option {{$category->id == $item->category->id ? 'selected':''}} value="{{$category->id}}">{{ $category -> name}}<option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Image</label><br>
                          <input type="file" name="image" >
                      </div>
                    </div><br>

                     <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $item->description}}">
                        </div>
                        </div>
                    </div>

                      <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $item->price}}">
                        </div>
                        </div>
                    </div>

                    <a href="{{route('item.index')}}" class="btn btn-warning">Back</a>
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