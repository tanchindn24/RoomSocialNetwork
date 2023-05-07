<section class="popular-categories section-padding">
    <div class="container">
        <div class="section-title">
            <div class="title">
                <h3>Rental Provider</h3>
                <a class="show-all" href="shop-grid-right.html">
                    All Rental Provider
                    <i class="fi-rs-angle-right"></i>
                </a>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
        </div>
        <div class="carausel-8-columns-cover position-relative">
            <div class="carausel-8-columns" id="carausel-8-columns">
                @foreach($provider as $value)
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ route('seeker.chat.provider.id', $value->id) }}">
                            <img style="width: 80px;height: 80px;" src="{{asset("/assets/backend/provider/assets/images/avatar/$value->avatar")}}" alt=""/></a>
                    </figure>
                    <h6>
                        <a href="{{ route('seeker.chat.provider.id', $value->id) }}"> {{ $value->name }}<br/></a>
                    </h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
