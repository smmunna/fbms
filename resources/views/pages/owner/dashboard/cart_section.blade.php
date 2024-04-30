 @php
     $totalOrders = DB::table('orders')
         ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
         ->where('flats.owner_id', Auth::user()->id)
         ->count();
     $totalEarnings = DB::table('orders')
         ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
         ->where('flats.owner_id', Auth::user()->id)
         ->sum('orders.amount');

 @endphp

 <!-- Small boxes (Stat box) -->
 <div class="row">
     <div class="col-lg-6 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
             <div class="inner">
                 <h3>{{ $totalOrders }}</h3>

                 <p>Bookings</p>
             </div>
             <div class="icon">
                 <i class="ion ion-bag"></i>
             </div>
             <a href="{{ route('owner.orders') }}" class="small-box-footer">More info <i
                     class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-6 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
             <div class="inner">
                 <h3>{{ $totalEarnings }} TK</h3>

                 <p>Earnings</p>
             </div>
             <div class="icon">
                 <i class="ion ion-stats-bars"></i>
             </div>
             <a href="{{ route('owner.orders') }}" class="small-box-footer">More info <i
                     class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>

 </div>
 <!-- /.row -->
