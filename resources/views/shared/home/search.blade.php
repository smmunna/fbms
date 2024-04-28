   @php
       // Retrieve all locations and property types using DB::
       $locations = DB::table('locations')->get();
       $propertyTypes = DB::table('properties')->get();

   @endphp

   <!-- Search Start -->
   <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
       <div class="container">
           <form action="{{ route('filter.properties') }}" method="GET">
               <div class="row g-2">
                   <div class="col-md-10">
                       <div class="row g-2">
                           <div class="col-md-4">
                               <input type="text" name="search" class="form-control border-0 py-3"
                                   placeholder="Search by Title, Size, Bed, Bath">
                           </div>
                           <div class="col-md-4">
                               <select name="location" class="form-select border-0 py-3">
                                   <option value="">Locations</option>
                                   @foreach ($locations as $location)
                                       <option value="{{ $location->name }}">{{ $location->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-md-4">
                               <select name="property_type" class="form-select border-0 py-3">
                                   <option value="">Property</option>
                                   @foreach ($propertyTypes as $properties)
                                       <option value="{{ $properties->name }}">{{ $properties->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                   </div>
               </div>
           </form>
       </div>
   </div>
   <!-- Search End -->
