@extends("layouts.template")
@push('style')
<!-- Library CSS -->
<link href="{{ url('/template2/css/glanz_library.css') }}" rel="stylesheet">

<!-- Icons CSS -->
<link href="{{ url('/template2/fonts/themify-icons.css') }}" rel="stylesheet">

<!-- Theme CSS -->
<link href="{{ url('/template2/css/glanz_style.css') }}" rel="stylesheet">
<link href="{{ url('/template2/css/custom.css') }}" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700%7COpen+Sans:300,400,700%7CPlayfair+Display:400,400i,700,700i" rel="stylesheet">

<!-- Other Fonts -->
<link href="{{ url('/template2/fonts/marsha/stylesheet.css') }}" rel="stylesheet">
@endpush

@push('script')
    <!-- Library JS -->
    <script src="{{ url('/template2/js/glanz_library.js') }}"></script> 
    <!-- Theme JS -->
    <script src="{{ url('/template2/js/glanz_script.js') }}"></script>

@endpush

@section("content")
<!-- Page -->
<div class="gla_page" id="gla_page">

    
    
    <!-- To Top -->
    <a href="#gla_page" class="gla_top ti ti-angle-up gla_go"></a>

   
    
    <!-- Header -->
    <header>       
        <nav class="gla_light_nav gla_transp_nav">

            <div class="container">
                
                <div class="gla_logo_container clearfix">
                    
                    <div class="gla_logo_txt">
                        <!-- Logo -->

                        <a href="/" class="gla_logo"><?php echo $couple->groom->GROOM_NAME; ?> &amp; <?php echo $couple->bride->BRIDE_NAME ?></a>
                        
                        <!-- Text Logo -->
                        <div class="gla_logo_und"><?php echo $wedding->WEDDINGDATE_LONG; ?></div>
                    </div>
                </div>           


               
            </div>
            <!-- container end -->
        </nav>
        
    </header>
    <!-- Header End -->


    <!-- Slider -->
    <div class="gla_slider gla_image_bck  gla_wht_txt gla_fixed"  data-image="{{ $couple->getSliderPic(1) }}" data-stellar-background-ratio="0.8">

           <div class="gla_over" data-color="#9abab6" data-opacity="0.2"></div>
            <div class="gla_slider_flower" data-bottom-top="@class:gla_slider_flower active" data--200-bottom="@class:gla_slider_flower no_active">
                <div class="gla_slider_flower_c1 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c2 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c3 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c4 gla_slider_flower_ii gla_slider_flower_item"></div>
                <!--<div class="gla_slider_flower_c5 gla_slider_flower_ii gla_slider_flower_item"></div>-->
                <!--<div class="gla_slider_flower_c6 gla_slider_flower_ii gla_slider_flower_item"></div>-->
            </div>

        <!-- Over -->
        <div class="gla_over" data-color="#1e1d2d" data-opacity="0"></div>

        <div class="container">

            
             <!-- Slider Texts -->
            <div class="gla_slide_txt gla_slide_center_bottom text-center gla_main">
                <div class="gla_slide_title"> We're getting married</div>
                <div class="gla_slide_midtitle"><?php echo $couple->groom->GROOM_NAME; ?> &amp; <?php echo $couple->bride->BRIDE_NAME ?></div>

                <img src="{{ $couple->getVendorLogo('white') }}" style="width:80px;margin-bottom:20px;" />
                <div class="gla_slide_date"> <?php echo $wedding->WEDDINGDATE_LONG; ?></div>

                
            </div>
            <!-- Slider Texts End -->
        
        </div>
        <!-- container end -->

       


    </div>
    <!-- Slider End -->

    <div class="gla_section" style="padding:0px;margin:0px;">
        <div class="gla_countdown_title">
            <h2 class="countdown-title">Our Big Day </h2>   
        </div>
        <?php
        $today = date("Y-m-d");
		$expire = $wedding->WEDDING_MATRIMONY_TIME;

		$today_time = strtotime($today);
		$expire_time = strtotime($expire);

		$tahun = date("Y", strtotime($wedding->WEDDING_MATRIMONY_TIME));
		$bulan = date("m", strtotime($wedding->WEDDING_MATRIMONY_TIME));
		$tanggal = date("d", strtotime($wedding->WEDDING_MATRIMONY_TIME));

		if ($expire_time < $today_time) { ?> 
			<div class="gla_countdown2" data-year="<?php echo $tahun; ?>" data-month="<?php echo $bulan; ?>" data-day="<?php echo $tanggal; ?>"></div>
			

		<?php } else { ?> 

			<div class="gla_countdown" data-year="<?php echo $tahun; ?>" data-month="<?php echo $bulan; ?>" data-day="<?php echo $tanggal; ?>"></div>
			

		<?php } ?>
       
         
    
    </div>

   

    <!-- Content -->
    <section id="gla_content" class="gla_content">
        


        <!-- section -->
        <section class="gla_section" >
            
            <!-- Over -->
            <div class="gla_over" data-color="#9abab6" data-opacity="0.2"></div>
            <div class="gla_slider_flower" data-bottom-top="@class:gla_slider_flower active" data--200-bottom="@class:gla_slider_flower no_active">
                <div class="gla_slider_flower_c1 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c2 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c3 gla_slider_flower_ii gla_slider_flower_item"></div>
                <div class="gla_slider_flower_c4 gla_slider_flower_ii gla_slider_flower_item"></div>
                <!--<div class="gla_slider_flower_c5 gla_slider_flower_ii gla_slider_flower_item"></div>-->
                <!--<div class="gla_slider_flower_c6 gla_slider_flower_ii gla_slider_flower_item"></div>-->
            </div>
            
            <div class="container text-center" style="padding-top:50px;">
                
                <h2>Happy Couple</h2>   
                              
                <!-- boxes -->
                <div class="gla_icon_boxes row text-left">

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                        <div class="gla_news_block">
                            <span class="gla_news_img">
                                <span class="gla_over" data-image="{{$couple->getCouplePic('groom')}}"></span>    
                            </span>
                            <span class="gla_news_title">The Groom <br /><strong><?php echo $couple->groom->GROOM_REALNAME; ?></strong></span>
                            <p>                            
                            <a href="<?php echo $couple->groom->GROOM_FACEBOOK; ?>"><i class="ti ti-facebook gla_icon_box" style="margin-left:0;padding-left:0px;"></i></a>
                            <a href="<?php echo $couple->groom->GROOM_TWITTER; ?>"><i class="ti ti-twitter gla_icon_box"></i></a>
                            <a href="<?php echo $couple->groom->GROOM_INSTA; ?>"><i class="ti ti-instagram gla_icon_box"></i></a>
                            
                            </p>
                        </div>
                    </div> 

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                        <div class="gla_news_block">
                            <span class="gla_news_img">
                                <span class="gla_over" data-image="{{$couple->getCouplePic('bride')}}"></span>   
                            </span>
                            <span class="gla_news_title">The Bride <br /><strong><?php echo $couple->bride->BRIDE_REALNAME; ?></strong></span>
                            <p>                       
                            <a href="<?php echo $couple->bride->BRIDE_FACEBOOK; ?>"><i class="ti ti-facebook gla_icon_box" style="margin-left:0;padding-left:0px;"></i></a>
                            <a href="<?php echo $couple->bride->BRIDE_TWITTER; ?>"><i class="ti ti-twitter gla_icon_box"></i></a>
                            <a href="<?php echo $couple->bride->BRIDE_INSTA; ?>"><i class="ti ti-instagram gla_icon_box"></i></a>
                            
                            </p>
                        </div>
                    </div> 

                    <div class="col-md-4 col-sm-4 hideOnMobile">
                        <div class="gla_news_block" style="max-height:420px;">                            
                            <img src="{{$couple->getSliderPic(2)}}" />                        
                        </div>
                    </div>




                </div>
                <!-- boxes end -->

                
            </div>
            <!-- container end -->

        </section>
        <!-- section end -->
        @if(isset($wedding->WEDDING_VIDEO))
        <section class="gla_section">
                <iframe width="100%" height="315" src="{{$wedding->WEDDING_VIDEO}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </section>
       @endif
       <!-- section -->
        <section class="gla_section" style="background: url({{ $template->getResourcesPic('images/pattern_1.jpg') }})">
            
            
            <div class="container text-center" style="padding-top:50px;">
                <p><img src="{{ $template->getResourcesPic('images/animations/flowers2.gif') }}" data-bottom-top="@src:{{ $template->getResourcesPic('images/pattern_1.jpg') }}" height="150" alt=""></p>
                <h2>Where and When</h2>
                              
                <!-- boxes -->
                <div class="gla_icon_boxes row text-left">

                    <!-- item -->
                    <div class="col-md-6 col-sm-6">
                        <div class="gla_news_block">
                            <span class="gla_news_img">
                                <span class="gla_over" data-image="{{$wedding->getWeddingStylePic()}}"></span>    
                            </span>
                            <span class="gla_news_title">Holy Matrimony</span>                            
                            <p><strong><?php echo date("D, d M Y", strtotime($wedding->WEDDING_MATRIMONY_TIME)); ?><br /><?php echo date("H:i", strtotime($wedding->WEDDING_MATRIMONY_TIME)) . " $wedding->WEDDING_MATRIMONY_TIMEZONE"; ?></strong><br />
                            <?php echo $wedding->WEDDING_MATRIMONY_VENUE; ?><br />
                            <?php echo $wedding->WEDDING_MATRIMONY_ADDRESS; ?>                            
                            </p>
                        </div>
                    </div> 

                    <!-- item -->
                    <div class="col-md-6 col-sm-6">
                        <div class="gla_news_block">
                            <span class="gla_news_img">
                                <span class="gla_over" data-image="{{url('/images/venue/00.jpg')}}"></span>    
                            </span>
                            <span class="gla_news_title">Wedding Reception</span>
                            <p><strong><?php echo date("D, d M Y", strtotime($wedding->WEDDING_RECEPTION_TIME)); ?> <br /><?php echo date("H:i", strtotime($wedding->WEDDING_RECEPTION_TIME)) . " $wedding->WEDDING_RECEPTION_TIMEZONE"; ?></strong>
                            <br /><?php echo $wedding->WEDDING_RECEPTION_VENUE; ?><br />
                            <?php echo $wedding->WEDDING_RECEPTION_ADDRESS; ?>
                            
                            </p>
                        </div>
                    </div>  




                </div>
                <!-- boxes end -->

                
            </div>
            <!-- container end -->

        </section>

       



        <!-- section -->
        @if(isset($wedding->WEDDING_MAP))

        <section class="gla_section">
              
            <div class="gla_map">
           
                <iframe src="{{$wedding->WEDDING_MAP}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!--
            <iframe src="https://www.google.com/maps/d/embed?mid=1Db39qSrYMFfOT9Momg4l4VQEOng&hl=en" width="100%" height="480"></iframe>-->

        </div>

        </section>
        @endif

        <!-- section end -->


        <!-- section -->
        <section class="gla_section gla_image_bck">
            
            
            <div class="container text-center">
                <p><img src="{{$template->getResourcesPic('images/animations/flowers3.gif')}}" data-bottom-top="@src:{{$template->getResourcesPic('images/animations/flowers3.gif')}}" height="130" alt=""></p>
                <h2>Prewedding Gallery</h2>
                               <!-- grid -->
                <div class="gla_portfolio_no_padding grid">
                    @if(!isset($couple->galleries))

                    <?php
                        for($i=1;$i<=$couple->PREWEDPHOTO_AMOUNT;$i++){
                        $PICNAME = $i.".jpg";
                    ?>

                    
                        <!-- item -->
                        <div class="col-xs-6 col-sm-3 gla_anim_box grid-item ceremony">
                            <div class="gla_shop_item">
                                <a href="{{ $couple->getGalleryPic($PICNAME) }}" class="lightbox">
                                    <img src="{{ $couple->getGalleryPic($PICNAME,1, true) }}" alt="">
                                </a>
                            </div>
                        </div>
                    
                    <?php } ?>
                    @else
                        @foreach($couple->galleries as $gallery)
                            <div class="col-xs-6 col-sm-3 gla_anim_box grid-item ceremony">
                                <div class="gla_shop_item">
                                    <a href="{{ $gallery->GALLERY_PHOTO }}" class="lightbox">
                                        <img src="{{ $gallery->GALLERY_PHOTO }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                 </div>
                 <!-- grid end -->
                
            </div>
            <!-- container end -->

        </section>
        <!-- section end -->


        
<!-- section -->
        <section class="gla_section gla_image_bck gla_wht_txt gla_fixed" data-stellar-background-ratio="0.8" data-image="{{ $couple->getSliderPic(2) }}">
            
            <!-- Over -->
            <div class="gla_over" data-color="#282828" data-opacity="0.8"></div>

            <div class="container text-center">
                <h2>Guest Book</h2><br /><br />
                <h3 class="gla_subtitle">Sign Our Guest Book And leave a couple words</h3>
                
                
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
                
                <div class="row">
                    <div class="col-md-8 col-md-push-2">
                        <form action="{{ url('/messages/'.$couple->GUID) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Your name*</label>
                                    <input type="text" name="Nama" placeholder="Your Name" class="form-control form-opacity">
                                </div>
                                <div class="col-md-6">
                                    <label>Your e-mail*</label>
                                    <input type="text" name="Email" placeholder="Your Email" class="form-control form-opacity">
                                </div>
                  
                                <div class="col-md-6">
                                    <label>How Many Of You Will Come</label>
                                    <select name="Tamu" class="form-control form-opacity">
                                        <option value="0" style="color:#333;">Can't Go</option>
                                        <option value="1" style="color:#333;">1 Person</option>
                                        <option value="2" style="color:#333;">2 Persons</option>
                                        <option value="3" style="color:#333;">3 Persons</option>
                                        <option value="4" style="color:#333;">4 Persons</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Notes</label>
                                    <textarea name="Pesan" placeholder="Your Message" class="form-control form-opacity"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn submit" value="Send">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
            <!-- container end -->

        </section>
        <!-- section end -->

        <!-- section -->
        <section class="gla_section gla_image_bck">
            
            
            <div class="container">
                <h2>Comments</h2>
                <div class="row">
                    @foreach($messages as $key => $m)
                        <div class="col-md-4">
                            <h3 style="font-size:25px;"><?php echo $m->TEXT; ?></h3>
                            <p class="gla_subtitle">— <?php echo $m->NAME; ?> - <?php echo date("d.m.Y", strtotime($m->DATE)); ?></p>
                            <p>
                        </div>
                        @if($key+1 % 2 == 0)
                        </div>
                        <div class="row">
                        @endif
                    @endforeach
                </div>
            </div>

        </section>
        <!-- section -->
        <section class="gla_section section-partner" style="background: url({{$template->getResourcesPic('images/pattern_1.jpg')}})">
            <!-- Over -->
                        
            <div class="container" style="padding-top:50px;">
       
                <h2>Wonderful Partners</h2>
               
               
                <!-- icon boxes -->
                <div class="gla_icon_boxes gla_partners row">
                        
                    <!-- item -->
                    @if(count($couple->weddingPartners)>0)
                    @foreach($couple->weddingPartners as $partner)
                    <div class="gla_partner_box">
                    <a href="{{ url('/redirect?couple_id='.$couple->GUID. '&vendor_id='. $couple->MSVENDOR_GUID .'&partner_id=' . $partner->GUID . '&redirect_to='.$partner->WEDDING_PARTNER_WEBSITE) }}" target="_blank"><img src="{{ $partner->WEDDING_PARTNER_LOGO}}" height="100" alt=""></a>
                    </div>  
                    @endforeach
                    @endif

                </div>
                <!-- icon boxes end -->              
                
            </div>
            <!-- container end -->

        </section>
        <!-- section end -->


       <!-- section -->
        <section class="gla_section gla_image_bck gla_fixed gla_wht_txt" data-stellar-background-ratio="0.8" data-image="{{$couple->getSliderPic(3)}}">
            
            <!-- Over -->
            <div class="gla_over" data-color="#1e1d2d" data-opacity="0.4"></div>
            
            <div class="container text-center">
                <div class="gla_slide_midtitle">See you at the<br>wedding!</div>
                
                
            </div>
            <!-- container end -->

        </section>
        <!-- section end -->

    </section>
    <!-- Content End --> 

</div>
@endsection
