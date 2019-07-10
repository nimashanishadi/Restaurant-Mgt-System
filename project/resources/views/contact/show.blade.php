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
                            <div class="card">
                                    <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Contact Subject</h4>
                                    </div>
                                    <div class="card-content" style="padding:20px">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Name : {{$contact->name}}</strong><br>
                                                    <b>E-mail : {{$contact->email}}</b><br>
                                                    <strong>Massege : </strong><br><br>
                                                    <p>{{$contact->message}}</p><br>
                                                </div>
                                            </div>
                                            <a href="{{route('contact.index')}}" class="btn btn-danger" >back</a>
                                            <div class="clearfix"></div>
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