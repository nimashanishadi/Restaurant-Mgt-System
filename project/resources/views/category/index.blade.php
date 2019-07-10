@extends('layouts.app')
 
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

  <div class="content">
        <div class="container-fluid">
        @if(session('successMsg'))
              
              <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('successMsg') }}</span>
              </div>
              @endif
          <div class="row">
            <div class="col-md-12">
            <a href="{{route('category.create')}}" class="btn btn-info">Add New Category</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category Data</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table" cellspaceing="0" style="width:100%">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                        Name
                        </th>
                        <th>
                        Slug
                        </th>
                        <th>
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                        <th>
                        Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                              <form  id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display:none;" method="POST">
                                {{csrf_field()}}
                                @method('DELETE')
                              </form>       
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure, You wanna delete this?')){event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();}
                                else{
                                  event.preventDefault();
                                }"><i class="material-icons">delete</i></button>
                                </td>
                                </button>
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
                $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush