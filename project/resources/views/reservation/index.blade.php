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
                  <h4 class="card-title ">Reservation Data</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table" cellspaceing="0" style="width:100%">
                      <thead class=" text-primary">
                      <th>
                        Id
                        </th>                
                        <th>
                        Name
                        </th>
                        <th>
                        Phone
                        </th>
                        <th>
                        Email
                        </th>
                        <th>
                        Date_and_time
                        </th>
                        <th>
                        Massage
                        </th>
                        <th>
                        Status
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
                      @foreach($reservations as $reservation)
                        <tr>
                        <td>{{ $reservation->id}}</td>
                            <td>{{ $reservation->name}}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->date_and_time }}</td>
                            <td><strong>{{ $reservation->massage }}</strong></td>
                            <td>
                              @if($reservation->status == true)
                                <span class="label label-info">Confirmed</span>
                              @else
                              <span class="label label-info">Not Confirmed Yet</span>
                              @endif
                            </td>
                            <td>{{ $reservation->created_at }}</td>
                            <td>{{ $reservation->updated_at }}</td>
                            <td>
                              @if($reservation->status == false)
                              <form  id="status-form-{{$reservation->id}}" action="{{route('reservation.status', $reservation->id)}}" style="display:none;" method="POST">
                                {{csrf_field()}}
                               
                              </form>       
                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){event.preventDefault();document.getElementById('status-form-{{$reservation->id}}').submit();}
                                else{
                                  event.preventDefault();
                                }"><i class="material-icons">done</i>
                                </button> 
                                @endif

                                <form  id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display:none;" method="POST">
                                {{csrf_field()}}
                                @method('DELETE')
                              </form>       
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure, You wanna delete this?')){event.preventDefault();document.getElementById('delete-form-{{$reservation->id}}').submit();}
                                else{
                                  event.preventDefault();
                                }"><i class="material-icons">delete</i></button>
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