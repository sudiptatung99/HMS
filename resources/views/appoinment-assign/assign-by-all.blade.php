@section('title') {{ 'Appointment Assign by All' }} @endsection  
<x-app-layout> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box pb-0">
                    <div class="img_box">
                        <img src="{{ asset('assets/images/globe.png') }}" alt=""> 
                    </div>
                    <div class="text_box">
                        <h4 class="mb-sm-0">Appoinments</h4>
                        <P>Assign by All List</P>     
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card"> 
                    <div class="card-body">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>   
                                    <th>Patient ID</th> 
                                    <th>Department</th> 
                                    <th>Doctor</th> 
                                    <th>Appoinment Date</th>      
                                    <th>Serial No.</th>     
                                    <th>Problem</th>     
                                    <th>Status</th>        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">       
                                        Data Not Found ! 
                                    </td> 
                                </tr>                             
                            </tbody>
                        </table> 
                    </div> 
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>        