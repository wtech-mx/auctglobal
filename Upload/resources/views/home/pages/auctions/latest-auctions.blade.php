 

<?php 
$currency_code = getSetting('currency_code','site_settings');
//Latest Auctions
$latest_auctions = \App\Auction::getLatestAuctions(); 


?>

 <!--LATEST AUCTIONS SECTION-->
    @if (count($latest_auctions))
    <section class="au-similar-products">
        <div class="container-fluid">
            <div class="row">
              
              <div class="col-lg-12 col-md-12 col-sm-12 au-deals">
                <h2 class="text-center"> {{getPhrase('latest_auctions')}}</h2> 
              </div>
                    
               <div class="screenshot-similar-product">

                @foreach ($latest_auctions as $auction)
                <div class="card au-similar-card">

                     @if (Auth::user())
                    <a href="javascript:void(0);" ng-click="addtoFavourites({{$auction->id}})"><i class="pe-7s-like like"></i></a>
                    @else
                     <a href="javascript:void(0);" onclick="showModal('loginModal')"><i class="pe-7s-like like"></i></a>
                    @endif
    
                  <a href="{{URL_HOME_AUCTION_DETAILS}}/{{$auction->slug}}" title="Auction Details">
                    <img class="img-fluid similar-img" src="{{getAuctionImage($auction->image,'auction')}}" alt="{{$auction->title}}"></a>



                  <div class="card-block au-similar-block text-center">

                      <a href="{{URL_HOME_AUCTION_DETAILS}}/{{$auction->slug}}" data-toggle="tooltip" title="{{$auction->title}}" data-placement="bottom"> <h6 class="card-title text-center"> {!! str_limit($auction->title,30,'..') !!}</h6></a>

                  </div>
                </div>
                @endforeach
                                                                                                       
            </div>
          </div>    
        </div>
    </section>
    @endif
    
    <!--LATEST AUCTIONS SECTION-->

  