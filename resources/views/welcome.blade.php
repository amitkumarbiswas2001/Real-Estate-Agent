@extends('layouts.website', ['site_title' => "Homepage"])


@section('content')


<section class="form-12" id="home">
	<div class="form-12-content">
		<div class="container">
			<div class="grid grid-column-2 ">
				<div class="column2">
					</div>
				<div class="column1">


						<form action="/" method="Get">
							<div class="blog-search form d-flex search-form">
								<input type="search" class="form-control" placeholder="Enter Location, Property, Landmark" name="search" required="required">
								<button type="submit" class="btn search-btn"><span class="fa fa-search"></span></button>
							</div>
							<div class="form-top">
								<select id="sel1">
									<option>All Actions</option>
									<option>Rent</option>
									<option>Sale</option>
									<option>Sold Out</option>
								  </select>
								  <select id="sel2">
									<option>All Types</option>
									<option>Apartment</option>
									<option>Business</option>
									<option>House</option>
									<option>Luxury</option>
									<option>Residential</option>
									<option>Restaurant</option>
									<option>Single Family</option>
									<option>Villa</option>
								  </select>

							</div>

							<div class="form-top">
								<select id="sel3">
									<option>All Cities</option>
									<option>Baja California Sur</option>
									<option>Campo Aereo Chapultepec</option>
									<option>Cuernavaca</option>
									<option>Estado de</option>
									<option>Florida</option>
								</select>
								<select id="sel4">
									<option>Min Rooms</option>
									<option>All Rooms</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
								</select>

							</div>

							<div class="form-top">
								<select id="sel5">
									<option>All Bed Rooms</option>
									<option>Min Bed Rooms</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
								</select>
								<select id="sel6">
									<option>All Baths</option>
									<option>Min Baths</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
								</select>

							</div>

							<button type="submit" class="btn">Submit</button>
						</form>
					</div>

			</div>
		</div>
	</div>
</section>
<section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-md-3">
            <div class="heading text-center mx-auto">
                <h3 class="head">Popular Locations</h3>
                <p class="my-3 head "> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                Nulla mollis dapibus nunc, ut rhoncus
                turpis sodales quis. Integer sit amet mattis quam.</p>
            </div>
            <div class="row mt-3 pt-5">
                @foreach($locations as $location)

                    <div class="col-md-4 col-sm-6">
                        <div class="box16">
                            <img class="img-fluid" src="{{ $location->photo->getUrl() }}" style="height: 200px;" alt="">
                            <div class="box-content">
                                <h3 class="title">{{ $location->name }}</h3>
                                <span class="post">{{ $location->listings }} Listings</span>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</section>


<section class="grids-4" id="properties">
    <div id="grids4-block" class="py-5">
        <div class="container py-md-3">
            <div class="heading text-center mx-auto">
                <h3 class="head">Properties For Rent</h3>
                <p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Nulla mollis dapibus nunc, ut rhoncus
                    turpis sodales quis. Integer sit amet mattis quam.</p>
            </div>
            <div class="row mt-5 pt-3">
                @foreach ($properties as $property)
                    <div class="grids4-info  col-lg-4 col-md-6">
                        <a href="#"><img src="{{$property->photo->getUrl() ?? ''}}" class="img-fluid" alt=""></a>
                        <ul class="location-top">
                            <li class="rent">For Rent</li>
                            <li class="open-1">{{$property->location->name}}</li>
                        </ul>
                        <div class="info-bg">
                            <h5><a href="#">{{$property->name}}</a></h5>
                            <p> {{$property->location->currency->code}} {{$property->price}} / Months</p>
                            <ul>
                                <li><span class="fa fa-bed"></span>{{$property->beds}} Beds</li>
                                <li><span class="fa fa-bath"></span> {{$property->baths}} Baths</li>
                                <li><span class="fa fa-share-square-o"></span> {{$property->sqft}} sq ft</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



@endsection


