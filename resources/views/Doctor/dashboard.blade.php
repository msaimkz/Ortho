@extends('Doctor.master')
@section('content')
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                <small>Welcome to Ortho</small>
                </h2>
            </div>            
           
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to m-b-0" data-from="0" data-to="1600" data-speed="2500" data-fresh-interval="700">1600 <i class="zmdi zmdi-trending-up float-right"></i></h3>
                        <p class="text-muted">New Patients</p>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to m-b-0" data-from="0" data-to="284" data-speed="2500" data-fresh-interval="1000">284 <i class="zmdi zmdi-trending-up float-right"></i></h3>
                        <p class="text-muted">New Appointment <i class="zmdi zmdi-mood"></i></p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <div class="card patient_list">
                    <div class="header">
                        <h2><strong>New</strong> Patient List</h2>                        
                       
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped m-b-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Diseases</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="http://via.placeholder.com/35x35" alt="Avatar" class="rounded-circle"></td>
                                        <td>Virginia</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td><span class="badge badge-danger">Fever</span> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="http://via.placeholder.com/35x35" alt="Avatar" class="rounded-circle"></td>
                                        <td>Julie </td>
                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
                                        <td><span class="badge badge-info">Cancer</span> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="http://via.placeholder.com/35x35" alt="Avatar" class="rounded-circle"></td>
                                        <td>Woods</td>
                                        <td>70 Bowman St. South Windsor, CT 06074</td>
                                        <td><span class="badge badge-warning">Lakva</span> </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="http://via.placeholder.com/35x35" alt="Avatar" class="rounded-circle"></td>
                                        <td>Lewis</td>
                                        <td>4 Goldfield Rd.Honolulu, HI 96815</td>
                                        <td><span class="badge badge-success">Dental</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">                    
                        <h6 class="text-center m-b-15">Total New Patient</h6>                      
                        <div class="table-responsive m-t-20">
                            <table class="table table-striped m-b-0">
                                <thead>
                                    <tr>
                                        <th>City</th>                                        
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>New York</td>
                                        <td>215<i class="zmdi zmdi-trending-up m-l-10"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Los Angeles</td>
                                        <td>189<i class="zmdi zmdi-trending-up m-l-10"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Chicago</td>
                                        <td>408<i class="zmdi zmdi-trending-down m-l-10"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Houston</td>
                                        <td>78<i class="zmdi zmdi-trending-down m-l-10"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Phoenix</td>
                                        <td>148<i class="zmdi zmdi-trending-up m-l-10"></i></td>
                                    </tr>
                                    <tr>
                                        <td>San Diego</td>
                                        <td>102<i class="zmdi zmdi-trending-down m-l-10"></i></td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
            
       
            
    </div>
</section>
@endsection