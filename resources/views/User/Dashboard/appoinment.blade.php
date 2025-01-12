@extends('User.Dashboard.Dashboard')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>All Appointments
                <small class="text-muted">Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('User.dashboard.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item active">All Appointment</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2><strong>Appointment</strong> List</h2>
                        
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                       
                            
                        <!-- Tab panes -->
                        <div class="tab-content m-t-10">
                            <div class="tab-pane table-responsive active" id="All">
                                <table class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>                                       
                                            <th>Doctor Name</th>
                                            <th>Doctor Email</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($appointments != null)
                                        @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>Dr. {{ ucwords($appointment->doctor->name) }}</td>
                                            <td>{{ $appointment->doctor->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d-M-Y') }}</td>
                                            <td>{{ ucwords($appointment->day) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }} To {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</td>
                                            <td>
                                                @if ($appointment->status == 'pending')
                                                    <span class="badge badge-danger">Pending</span>
                                                @elseif($appointment->status == 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($appointment->status == 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-danger">Cancelled</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('User.dashboard.appoinment.show',$appointment->id) }}" class="btn btn-info">View More</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        @else
                                             <td>Record Not Found</td>
                                        @endif
                                      
                                        
                                    </tbody>
                                </table>                            
                            </div>
                            <div class="tab-pane table-responsive" id="USA">
                                <table class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>                                       
                                            <th>Media</th>
                                            <th>Patients ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Number</th>
                                            <th>Last Visit</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00598</span></td>
                                            <td>Daniel</td>
                                            <td>32</td>
                                            <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
                                            <td>404-447-6013</td>
                                            <td>11 Jan 2018</td>
                                            <td><span class="badge badge-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar2.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00258</span></td>
                                            <td>Alexander</td>
                                            <td>22</td>
                                            <td>123 6th St. Melbourne, FL 32904</td>
                                            <td>404-447-6013</td>
                                            <td>15 Jan 2018</td>
                                            <td><span class="badge badge-success">Approved</span></td>
                                        </tr>                                       
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00456</span></td>
                                            <td>Joseph</td>
                                            <td>27</td>
                                            <td>70 Bowman St. South Windsor, CT 06074</td>
                                            <td>404-447-6013</td>
                                            <td>19 Jan 2018</td>
                                            <td><span class="badge badge-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar2.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00789</span></td>
                                            <td>Cameron</td>
                                            <td>38</td>
                                            <td>123 6th St. Melbourne, FL 32904</td>
                                            <td>404-447-6013</td>
                                            <td>19 Jan 2018</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar3.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00987</span></td>
                                            <td>Alex</td>
                                            <td>39</td>
                                            <td>123 6th St. Melbourne, FL 32904</td>
                                            <td>404-447-6013</td>
                                            <td>20 Jan 2018</td>
                                            <td><span class="badge badge-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00951</span></td>
                                            <td>James</td>
                                            <td>32</td>
                                            <td>44 Shirley Ave. West Chicago, IL 60185</td>
                                            <td>404-447-6013</td>
                                            <td>22 Jan 2018</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00953</span></td>
                                            <td>charlie</td>
                                            <td>51</td>
                                            <td>123 6th St. Melbourne, FL 32904</td>
                                            <td>404-447-6013</td>
                                            <td>22 Jan 2018</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar2.jpg" alt=""></span></td>
                                            <td><span class="list-name">KU 00934</span></td>
                                            <td>thomas</td>
                                            <td>26</td>
                                            <td>123 6th St. Melbourne, FL 32904</td>
                                            <td>404-447-6013</td>
                                            <td>29 Jan 2018</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection