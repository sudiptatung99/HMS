@section('title') {{ 'Bed Management Report' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>Bed Management Report</p>    
                </div>     
            </div>    
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form method="GET" action="{{ route('bed.management.report.search') }}"> 
                        <div class="date_filter">
                            <div class="row p-3"> 
                                <div class="col-md-4"> 
                                    <div class="input-group">
                                        <input type="text" class="form-control date-picker" name="start_date" placeholder="Start Date" value="{{ $start_date }}" required>   
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control date-picker" name="end_date" placeholder="Start End" value="{{ $end_date }}" required>     
                                    </div>     
                                </div> 
                                <div class="col-md-2">  
                                    <button type="submit" class="btn btn-info">Filter</button> 
                                </div>
                                <div class="col-md-2">  
                                    <h4 class="mt-1"><b>{{ env('CURRENCY_SYMBOL') . number_format($bed_total_charge, 2) }}</b></h4>
                                </div>    
                            </div> 
                        </div>     
                    </form>   
                </div> 
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-xl-12">
                <div class="card"> 
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table">  
                            <thead>
                                <tr>
                                    <th width="5%">#</th> 
                                    <th>Patient ID</th>      
                                    <th>Room No.</th>
                                    <th>Bed No.</th> 
                                    <th>Assign Date</th>   
                                    <th>Charge</th>   
                                    <th>Status</th>          
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp   
                            @foreach($bed_assign as $key => $bed_assign) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ route('patient.show', encrypt($bed_assign->patient_id)) }}">{{ $bed_assign->patient->patient_id }}</a></td>  
                                    <td>{{ $bed_assign->room->room_no }}</td>
                                    <td>{{ $bed_assign->bed->bed_no }}</td>      
                                    <td>{{ getDateFormat($bed_assign->assign_date) }}</td>        
                                    <td>{{ env('CURRENCY_SYMBOL') . $bed_assign->bed->bed_charge }}</td>           
                                    <td>{{ $bed_assign->status }}</td>      
                                </tr>                                     
                            @endforeach                              
                            </tbody>
                        </table>  
                    </div> 
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>   