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
               <h1 class=" btn btn-promary p-3">
                  <a class=" " href="{{-- {{ route('salesLogDetails') }} --}}" class="card-title">View Sales Log</a>
               </h1>
               <h1 class="  p-3" style="line-height: 1.7;">
                <a class=" " href="{{-- {{ route('SalesController.salesLog') }} --}}" class="card-title">Sell Product</a>
             </h1>
             
           </div>
       </div>
   </div>
</div>

 <div class="content">
     <div class="container-fluid">
         <div class="row">
             {{-- Today's sold info --}}
            <div class="col-md-6">
                 <div class="card bg-primary text-white mb-4">
                     <h1 class="card-body text-center"></h1>
                     <div class="card-footer d-flex align-items-center justify-content-center">
                         <span class="text-center text-white stretched-link" href="#">Todays total sold</span>
                     </div>
                 </div>
            </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 @endsection
 
   
