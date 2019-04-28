@extends("layouts.template")
@push('style')
<!-- Plugins for this template -->
<link href="{{ url('/template1/css/animate.css') }}" rel="stylesheet">
<link href="{{ url('/template1/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ url('/template1/css/owl.theme.css') }}" rel="stylesheet">
<link href="{{ url('/template1/css/owl.transitions.css') }}" rel="stylesheet">
<link href="{{ url('/template1/css/jquery.fancybox.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ url('/template1/css/style.css') }}" rel="stylesheet">
<style type="text/css">
    .bquotes {
    background: url("{{$couple->getSliderPic(2)}}") center center/cover no-repeat fixed;
    }
    .owl-next, .owl-prev {
    display: none!important;
    }
    footer {
    background: url("{{$couple->getSliderPic(3)}}") center center/cover no-repeat fixed;
    }
    .couple .groom {
    margin-bottom: 20px;
    }
    .couple .details .social-links {
    margin-top: 0px;
    }
    </style>
@endpush

@push('script')
    <!-- Plugins for this template -->
    <script src="{{ url('/template1/js/jquery-plugin-collection.js') }}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw"></script>

    <!-- Custom script for this template -->
    <script src="{{ url('/template1/js/script.js') }}"></script>

@endpush

@section("content")
<div class="page-wrapper">


<!-- Preloader -->
<div class="preloader">
    <div class="middle">
        <i class="fa fa-heart"></i>
        <i class="fa fa-heart"></i>
        <i class="fa fa-heart"></i>
        <i class="fa fa-heart"></i>
    </div>
</div>
<!-- end preloader -->


<!-- Start header -->
<header id="header">
    <nav class="navigation navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="open-btn">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $couple->groom->GROOM_NAME; ?> &amp; <?php echo $couple->bride->BRIDE_NAME; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <button class="close-navbar"><i class="fa fa-close"></i></button>
                <ul class="nav navbar-nav">
                    <li class="mobile-menu-logo"><img src="{{ url('/resources/logo-100.png') }}"></li>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#couple">Couple</a></li>
                    <li><a href="#story">Story</a></li>
                    <li><a href="#events">Wedding</a></li>
                    <?php //if(!(sizeof($couple->bride->siblings)==0)&&(sizeof($couple->bride->bridesmaids)==0)&&(sizeof($couple->bride->siblings)==0)&&(sizeof($couple->bride->bridesmaids)==0)){ ?>
                    <!-- <li><a href="#people">People</a></li> -->
                    <?php //}?>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#rsvp">Guest</a></li>
                    <li><a href="{{ url('/redirect?couple_id='.$couple->GUID. '&vendor_id=' . $couple->vendor->GUID . '&redirect_to=https://instagram.com') }}"><?php echo $couple->vendor->VENDOR_NAME; ?></a></li>

                </ul>
            </div><!-- end of nav-collapse -->
        </div><!-- end of container -->
    </nav>

    <div class="logo-bottom-shape-wrapper container">
        <div class="logo-bottom-shape wow fadeInDown" data-wow-delay="4s">
            <span><?php echo substr($couple->groom->GROOM_NAME,0,1); ?> <i class="fa fa-heart"></i> <?php echo substr($couple->bride->BRIDE_NAME,0,1); ?></span>
        </div>
    </div>
</header>
<!-- end of header -->


<!-- start of hero -->
<section class="hero">
    <div class="hero-holder">
        <div class="hero-img"><img src="{{ $couple->getSliderPic(1) }}" alt="ARALUEN.CO"></div>
    </div>

    <div class="announcement-wrapper">
        <div class="announcement">
            <span class="married-text">
                <span class=" wow fadeInUp" data-wow-delay="0.05s">W</span>
                <span class=" wow fadeInUp" data-wow-delay="0.10s">e</span>
                <span class=" wow fadeInUp" data-wow-delay="0.15s">'</span>
                <span class=" wow fadeInUp" data-wow-delay="0.20s">r</span>
                <span class=" wow fadeInUp" data-wow-delay="0.25s">e</span>
                <span>&nbsp;</span>
                <span class=" wow fadeInUp" data-wow-delay="0.30s">g</span>
                <span class=" wow fadeInUp" data-wow-delay="0.35s">e</span>
                <span class=" wow fadeInUp" data-wow-delay="0.40s">t</span>
                <span class=" wow fadeInUp" data-wow-delay="0.40s">t</span>
                <span class=" wow fadeInUp" data-wow-delay="0.45s">i</span>
                <span class=" wow fadeInUp" data-wow-delay="0.50s">n</span>
                <span class=" wow fadeInUp" data-wow-delay="0.55s">g</span>
                <span>&nbsp;</span>
                <span class=" wow fadeInUp" data-wow-delay="0.60s">m</span>
                <span class=" wow fadeInUp" data-wow-delay="0.65s">a</span>
                <span class=" wow fadeInUp" data-wow-delay="0.70s">r</span>
                <span class=" wow fadeInUp" data-wow-delay="0.75s">r</span>
                <span class=" wow fadeInUp" data-wow-delay="0.80s">i</span>
                <span class=" wow fadeInUp" data-wow-delay="0.85s">e</span>
                <span class=" wow fadeInUp" data-wow-delay="0.90s">d</span>
            </span>

            <div class="couple-name wow fadeInUp" data-wow-delay="2s">

                <h1><?php echo $couple->groom->GROOM_NAME; ?> &amp; <?php echo $couple->bride->BRIDE_NAME ?></h1>
            </div>

            <span class="date wow fadeInUp" data-wow-delay="3s"><?php echo $wedding->WEDDINGDATE_SHORT; ?></span>
            <img class="date wow fadeInUp" data-wow-delay="3s" src="{{ url('/template1/images/logo-100-w.png') }}">
            <span class="vector wow fadeInUp" data-wow-delay="3.5s"></span>

        </div>
    </div>
</section>
<!-- end of hero slider -->


<!-- start count-down -->
<section class="count-down">
    <div class="container">
        <div class="row">
            <div class="col col-md-4 hidden-sm hidden-xs">
                <h2>Our Big Day</h2>
            </div>
            <div class="col col-md-8">
                <div id="clock"></div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>
<!-- end of count-down -->


<!-- start couple -->
<section class="couple section-padding parallax-flower" data-bg-image-top="{{ url('/template1/images/big-flower.png') }}"  data-bg-image-bottom="{{ url('/template1/images/big-flower-bt.png') }}" id="couple">
    <div class="container">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>Happy couple</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div>
        <div class="col col-md-6 col-sm-12">
            <div class="row groom">
                <div class="col col-md-11 col-sm-11 wow fadeInLeftSlow" data-wow-duration="2s" data-wow-delay="0.5s">
                    <div class="pic">
                        <img src="{{ $couple->getCouplePic('groom') }}" class="img img-responsive" alt>
                    </div>
                </div>
                <div class="col col-md-12 col-sm-12s wow fadeInLeftSlow" data-wow-duration="2s">
                    <div class="details">
                        <span>The groom</span>
                        <h4>Mr. <?php echo $couple->groom->GROOM_REALNAME; ?></h4>
                        <ul class="social-links">
                            <li><a><i class="fa fa-facebook"></i></a></li>
                            <li><a><i class="fa fa-twitter"></i></a></li>
                            <li><a target="blank" href="<?php echo $couple->groom->GROOM_INSTA; ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- end of groom -->
        </div>

        <div class="col col-md-6 col-sm-12">
            <div class="row groom">
                <div class="col col-md-11 col-sm-11 wow fadeInLeftSlow" data-wow-duration="2s" data-wow-delay="0.5s">
                    <div class="pic">
                        <img src="{{ $couple->getCouplePic('bride') }}" class="img img-responsive" alt>
                    </div>
                </div>
                <div class="col col-md-12 col-sm-12s wow fadeInLeftSlow" data-wow-duration="2s">
                    <div class="details">
                        <span>The Bride</span>
                        <h4>Mrs. <?php echo $couple->bride->BRIDE_REALNAME; ?></h4>
                        <ul class="social-links">
                            <li><a><i class="fa fa-facebook"></i></a></li>
                            <li><a><i class="fa fa-twitter"></i></a></li>
                            <li><a target="blank" href="<?php echo $couple->bride->BRIDE_INSTA; ?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- end of groom -->
        </div>


    </div> <!-- end of container -->
</section>
<!-- end of couple -->


<!-- start of story -->
<section class="story section-padding" id="story">
    <iframe width="100%" height="350" src="<?php echo $wedding->WEDDING_VIDEO ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</section>
<!-- end of story -->


<!-- start events -->
<section class="events section-padding" id="events">
    <div class="container">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>The wedding</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div> <!-- end of section-title -->

        <div class="row content">
            <div class="col col-md-6">
                <div class="event-boxes">
                    <div class="left-half"></div>
                    <div class="right-half"></div>
                    <div class="clip"><i class="fi flaticon-clip-1"></i></div>
                    <div class="event-box-inner">
                        <div class="main-ceromony">
                            <h3>Holy Matrimony</h3>
                            <ul>
                                <li><i class="fa fa-calendar"></i>
                                
                                <?php echo $wedding->WEDDINGDAYNAME_MATRIMONY; ?>, 
                                <?php echo $wedding->WEDDINGDATE_LONG_MATRIMONY; ?><br />
                                <?php echo $wedding->WEDDINGHOUR_MATRYMONY; ?></li>
                                <li><i class="fa fa-location-arrow"></i>
                                <?php echo $wedding->WEDDING_MATRIMONY_VENUE; ?><br />
                                <?php echo $wedding->WEDDING_MATRIMONY_ADDRESS; ?> 
                                </li>
                            </ul>
                        </div>
                        <div class="reception">
                            <h3>Wedding Reception</h3>
                            <ul>
                                <li><i class="fa fa-calendar"></i> 
                                
                                <?php echo $wedding->WEDDINGDAYNAME_RECEPTION; ?>, 
                                <?php echo $wedding->WEDDINGDATE_LONG_RECEPTION; ?><br />
                                <?php echo $wedding->WEDDINGHOUR_RECEPTION; ?>
                                </li>
                                <li><i class="fa fa-location-arrow"></i> 
                                <?php echo $wedding->WEDDING_RECEPTION_VENUE; ?> <br />
                                <?php echo $wedding->WEDDING_RECEPTION_ADDRESS; ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <iframe src="{{$wedding->WEDDING_MAP}}" width="100%" height="450" frameborder="0" style="border:0;margin-top:20px;" allowfullscreen></iframe>
            </div>
            
        </div>
    </div> <!-- end of container -->
</section>
<!-- end of events -->


<!-- start of bquotes -->
<section class="bquotes">
    <h2 class="hidden">Wishes</h2>
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-md-offset-2">
                <div class="bquotes-slider">
                    <div class="item">
                        <div class="text">
                            <p>I just want you to know, that when I picture myself happy, it's with You</p>
                        </div>

                    </div>
                    <div class="item">
                        <div class="text">
                            <p>When You are with me, You make Me Perfect.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
</section>
<!-- end of bquotes -->

<?php //if(!(sizeof($GROOM_SIBLINGS)==0)||(sizeof($GROOM_BESTMAN)==0)){ ?>



<?php // if(!(sizeof($bride->siblings)==0)&&(sizeof($bride->bridesmaids)==0)){ ?>

<?php // } ?>

<!-- start gallery -->
<section class="gallery section-padding parallax-flower" data-bg-image-top="{{ url('/template1/images/big-flower.png') }}"  data-bg-image-bottom="{{ url('/template1/images/big-flower-bt.png') }}" id="gallery">
    <div class="container ">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>Prewedding</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div> <!-- end of section-title -->

        <div class="row gallery-boxes masonry-gallery css-animation fadeUpSlow">
            <?php
              for($i=1;$i<=$couple->PREWEDPHOTO_AMOUNT;$i++){
              $VENDORNAME = $couple->vendor->VENDOR_PREFIX;
              $PICNAME = $VENDORNAME."_".$i.".jpg";
            ?>
            <div class="col col-md-3 col-xs-6 grid-item">
                <div class="box">
                    <a href="{{ $couple->getGalleryPic($PICNAME) }}" class="fancybox" data-fancybox-group="gallery">
                        <img src="{{ $couple->getGalleryPic($PICNAME, 1, true) }}" class="img img-responsive" alt>
                        <div class="fade-icon">
                            <span class="icon"><i class="fa fa-search"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div> <!-- end of container -->
</section>
<!-- end of gallery -->

<!-- start rsvp -->
<section class="rsvp section-padding parallax" data-bg-image="{{ $couple->getSliderPic(2) }}" id="rsvp">
    <div class="container">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>Guest Book</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div> <!-- end of section-title -->

        <div class="row content" id="message">
            <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="rsvp-form-wrapper">
                    <div class="border-box">
                        <i class="fi flaticon-clip-1 top-clip"></i>
                        <i class="fi flaticon-clip-1 bottom-clip"></i>
                        <div></div>
                    </div>
                    <h4>Sign Our Guest Book And leave a couple words</h4>

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="list-square">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form name="rsvp-form" role="form" class="form form-inline" method="post" action="{{ url('/messages/'.$couple->GUID) }}>">
                        @csrf
                        <div class="row">
                            <div class="form-group col col-sm-6">
                                <input type="text" class="form-control"  name="Nama" placeholder="Your Name" required>
                            </div>
                            <div class="form-group col col-sm-6">
                                <input type="email" class="form-control"  name="Email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group col col-sm-6">
                                <select name="Tamu" class="form-control">\
                                    <option value="0">Can't Go</option>
                                    <option value="1" selected="selected">1 Person</option>
                                    <option value="2">2 Persons</option>
                                    <option value="3">3 Persons</option>
                                    <option value="4">4 Persons</option>
                                </select>
                            </div>


                            <div class="form-group col col-sm-12">
                                <textarea name="Pesan" class="form-control" placeholder="Your Message" ></textarea>
                            </div>

                            <div class="form-group col col-sm-12">
                                <button type="submit" class="btn btn-default theme-btn">Send</button>
                                <span id="loader"><img src="{{ url('/resources/rsvp-ajax-loader.gif') }}" alt="Loader"></span>
                            </div>
                            <!--
                            <div id="success">Thank you</div>
                            <div id="error"> Error occurred while sending email. Try again later. </div>
                            -->
                        </div>
                    </form> <!-- end of form -->
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
</section>
<!-- end of rsvp -->


<!-- start journal -->
<section class="journal section-padding flower-pattern">
    <div class="container">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>Comments</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div> <!-- end of section-title -->

        <!-- MESSAGE -->
        <div class="row">
            <div class="col col-md-10 col-md-offset-1">
                <div class="row journal-content">
                @foreach($messages as $key => $m)
                    <div class="col col-xs-6">
                        <p>
                        <strong><?php echo $m->NAME; ?></strong> - <em><?php echo date("d.m.Y", strtotime($m->DATE)); ?></em><br />
                         <?php echo $m->TEXT; ?></p>
                    </div>
                    @if($key+1 % 2 == 0)
                    </div>
                    <div class="row journal-content">
                    @endif
                @endforeach
                </div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>
<!-- end of journal -->


<!-- start gift-registry -->
<section class="gift-registry section-padding parallax-flower" id="gift" style="background:#fff;">
    <div class="container">
        <div class="row section-title">
            <div class="title-box">
                <div class="double-line double-line-top">
                    <i class="fi flaticon-social"></i>
                    <i class="fi flaticon-social"></i>
                </div>
                <h2>Wonderful <br />Partners</h2>
                <div class="double-line double-line-bottom"></div>
            </div>
        </div> <!-- end of section-title -->

                
        <div class="row">
            <div class="clearfix">
                <div class="col col-sm-4 col-xs-6">
                    <center>            
                    <a href="http://abphotographs.com/" target="blank"><img src="{{ $couple->getVendorPic(1) }}" class="img img-responsive" alt></a>    
                    </center>
                </div>
                <div class="col col-sm-4 col-xs-6">                            
                    <center>
                    <a href="https://www.instagram.com/moment.organizer/" target="blank"><img src="{{ $couple->getVendorPic(2) }}" class="img img-responsive" alt></a>
                    </center>
                </div>
                                 
            </div>
        </div>
    </div> <!-- end of container -->
</section>
<!-- end of gift-registry -->

<!-- start footer -->
<footer class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
                <div class="box">
                    <!-- frame -->
                    <div class="left-top-border"></div>
                    <div class="right-top-border"></div>
                    <div class="bottom-right-border"></div>
                    <div class="bottom-left-border"></div>
                    <!-- frame -->

                    <div class="love-birds wow fadeInSlow"><i class="fi flaticon-birds-in-love"></i></div>
                    <h2 class="wow fadeInSlow">See You There!</h2>
                    <p class="wow fadeInSlow"><?php echo $couple->groom->GROOM_NAME; ?> &amp; <?php echo $couple->bride->BRIDE_NAME ?></p>
                    <span class="wow fadeInSlow"><?php echo $wedding->WEDDINGDATE_SHORT; ?></span>
                </div>
                <p class="copyright">&copy; Copyright 2018. <?php echo $couple->vendor->VENDOR_NAME; ?></p>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer -->
</div>
@endsection