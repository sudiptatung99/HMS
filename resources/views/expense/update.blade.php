@section('title') {{ 'Expense Update' }} @endsection 
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Expense</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Expense</p>     
                </div>    
            </div> 
            <a href="{{ route('expense') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>     
        <div class="row"> 
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('expense.update.store', encrypt($expense->id)) }}" method="POST" enctype="multipart/form-data">        
                        @csrf  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Expense Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="date" value="{{ $expense->date }}" required>
                                </div>   
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Expense <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" name="expense" value="{{ $expense->expense }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Pay to Whom <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" name="pay_to_whom" value="{{ $expense->pay_to_whom }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Amount <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="amount" value="{{ $expense->amount }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Payment Mode <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="payment_mode" required>    
                                        {{ getPaymentMethod($expense->payment_mode) }}      
                                    </select> 
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*"> 
                                    <img src="{{ asset($expense->image) }}" width="100" height="70" class="img-thumbnail mt-2">    
                                </div>
                            </div>      
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Details <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="details" required>{{ $expense->details }}</textarea>   
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>      