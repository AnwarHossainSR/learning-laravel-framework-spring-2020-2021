{{-- <a href="{{ route('SalesController.salesLog') }}">Sales Log</a>
 --}}
 @extends('superadmin.master')

 @section('title')
     Admin || Dashboard
 @endsection
 
 @section('content')
 <div class="content-header">
   <div class="container-fluid">
       <div class="row mb-2">
           <div class="col-sm-12 d-flex justify-content-center">
               @include('superadmin.include.alert')
           </div>
       </div>
   </div>
</div>

 <div class="content">
     <div class="container-fluid">
         <div class="row">
             {{-- Existing --}}
            <div class="col-md-6">
                 <div class="card bg-primary text-white mb-4">
                     <h1 class="card-body text-center">{{ count($data) }}</h1>
                     <div class="card-footer d-flex align-items-center justify-content-center">
                         <span class="text-center text-white stretched-link" href="#">Total Existing Products</span>
                     </div>
                 </div>
            </div>
            {{-- Upcoming --}}
            <div class="col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <h1 class="card-body text-center">{{ count($data1) }}</h1>
                    <div class="card-footer d-flex align-items-center justify-content-center">
                        <span class="text-center text-white stretched-link" href="#">Total Upcoming Products</span>
                    </div>
                </div>
           </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 @endsection
 
   
