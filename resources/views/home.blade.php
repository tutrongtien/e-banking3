@extends('layouts.main')

@section('script')
    <script type="text/javascript">
        //
        function fadeElem(currElem,nextElem){
          currElem.removeClass('current').find('img') .css({'z-index':'50'}) .end() .find('p') .css({'z-index':'50'});
          nextElem.addClass('current').find('img') .css({'opacity': '0','z-index':'100'}) .animate({opacity: 1}, 700, function(){
           currElem.find('img') .css({'z-index': '0'});
          }).end().find('p') .css({'height':'0','z-index':'100'}) .animate({height: 50},500, function(){
           currElem.find('p') .css({'z-index': '0'});
          });
        }

        //
        function widegetStatus(slides){
          slides.each(function(index){
           if($(this).attr('class') == 'current')
            $('#controlNav a').removeClass('active') .eq(index) .addClass('active');
          });
        }
        //
        function slideshow(prev){
          var slides = $('#slideshow li');
          var currElem = slides.filter('.current');
          var lastElem = slides.filter(':last');
          var firstElem = slides.filter(':first');
          // Xác định phần tử kế tiếp là prev hay next
          var nextElem = (prev)? currElem.prev() : currElem.next();
          if(prev){
           if(firstElem.attr('class') == 'current') nextElem = lastElem;
          }else if(lastElem.attr('class') == 'current')nextElem = firstElem;
          fadeElem(currElem,nextElem);
          widegetStatus(slides);
        }
        //
        function wideget(index){
          var slides = $('#slideshow li');
          var currElem = slides.filter('.current');
          var nextElem = slides.eq(index);
          fadeElem(currElem,nextElem);
          widegetStatus(slides);
        }
        //
        function vk_slideshow(time){
          var idset =setInterval('slideshow()', time);
          var liarr =$('#slideshow ul li');
          var controlNav =$('#controlNav');
          var str='';
          for(var i=0; i<liarr.length; i++){
           str+='<a></a>';
          }
          controlNav.append(str);
          controlNav.children().each(function(index){
           $(this).click(function(){
            wideget(index);clearInterval(idset);
            idset =setInterval('slideshow()', time);
           });
          }).eq(0).addClass('active');
          $('#next').click(function(){
           slideshow(); clearInterval(idset);
           idset =setInterval('slideshow()', time);
          });
          $('#prev').click(function(){
           slideshow(true); clearInterval(idset);
           idset =setInterval('slideshow()', time);
          });
        }

        $(document).ready(function(){
          vk_slideshow(4000);
        });
    </script>
@stop

@section('user')
<div class="content_info">
<div class="container">
<div class="row">

<div class="col-md-8 col-lg-9">
    <div class="breadcrumbs" >
        <ul>
        <li>
            Chào mừng quí khách !!! 
        </li>
        </ul>
    </div>

    <div id="wrap-slide">
        <div id="slideshow">
          <ul>
               <li class="current"><img src="{{ asset('img/slide/slide-01.jpg')}}" width="847.5px" height="355px" /><p></p></li>
               <li><img src="{{ asset('img/slide/slide-02.jpg')}}" width="847.5px" height="355px" /><p></p></li>
               <li><img src="{{ asset('img/slide/slide-03.jpg')}}" width="847.5px" height="355px" /><p></p></li>
               <li><img src="{{ asset('img/slide/slide-04.jpg')}}" width="847.5px" height="355px" /><p></p></li>
          </ul>
          <span id="prev">prev</span><span id="next">next</span>
          <p id="controlNav"></p>
        </div>
    </div>

</div>
<!--  -->

<div class="col-md-4 col-lg-3">

<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="true">Simulator</a></li>
<li role="presentation" class=""><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">Contact Us</a></li>
</ul>


<div class="tab-content">

<div role="tabpanel" class="tab-pane fade active in" id="tab1">
<form action="template-credit-simulator.html" class="form-theme">
<label>Credit type</label>
<div class="selector">
<select class="guests-input">
<option>Select</option>
<option>Free Investment</option>
<option>Education</option>
<option>Insurance Vehicle</option>
<option>Health</option>
<option>new or used vehicle</option>
</select>
<span class="custom-select">Select</span>
</div>
<label>Value request</label>
<input type="number" placeholder="Enter value" class="input">
<label>Term in months</label>
<div class="selector">
<select class="guests-input">
<option>6</option>
<option>9</option>
<option>12</option>
<option>24</option>
<option>36</option>
<option>48</option>
<option>60</option>
<option>72</option>
</select>
<span class="custom-select">Select</span>
</div>
<input type="submit" class="btn" value="Consult">
</form>
</div>


<div role="tabpanel" class="tab-pane fade" id="tab2">
<ul class="contact-list">
<li>
<h4><i class="fa fa-envelope-o"></i>Email:</h4>
<a href="#">Contact Customer Service</a>
</li>
<li>
<h4><i class="fa fa-fax"></i>Phones:</h4>
<h5>Miami:</h5>
<p>447 50 12</p>
<h5>Number Single National</h5>
<p>02 4000 4 56234</p>
</li>
<li>
<h4><i class="fa fa-life-ring"></i>Care centers:</h4>
<a href="#"><i class="fa fa-arrow"></i>
<i class="fa fa-arrow-circle-o-right"></i> Offices
</a>
<a href="#"><i class="fa fa-arrow"></i>
<i class="fa fa-arrow-circle-o-right"></i>Cashiers
</a>
<a href="#"><i class="fa fa-arrow"></i>
<i class="fa fa-arrow-circle-o-right"></i> Point friend
</a>
</li>
</ul>
</div>

</div>

</div>

</div>
</div>
</div>
    <section class="content_info">

    <div class="content_resalt padding-bottom borders">

    <div class="title-vertical-line">
    <h2><span>Tin Tức</span></h2>
    <p class="lead">Keep informed and updated on all news related to your bank.</p>
    </div>


    <div class="container">

    <div class="row padding-top">

    <div class="col-md-4">

    <div class="item-blog-post">

    <div class="head-item-blog-post">
    <h3>Protection With you</h3>
    </div>


    <div class="img-item-blog-post">
    <img src="{{ asset('img/blog-img/1.jpg')}}" alt="">
    <div class="post-meta">
    <ul>
    <li>
    <i class="fa fa-user"></i>
    <a href="#">Iwthemes</a>
    </li>
    <li>
    <i class="fa fa-clock-o"></i>
    <span>April 23, 2015</span>
    </li>
    <li>
    <i class="fa fa-eye"></i>
    <span>234 Views</span>
    </li>
    </ul>
    </div>
    </div>


    <div class="info-item-blog-post">
    <p>Find all the support and information they need to make all decisions about saving for your future.</p>
    <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
    </div>

    </div>

    </div>


    <div class="col-md-4">

    <div class="item-blog-post">

    <div class="head-item-blog-post">
    <h3>For your future</h3>
    </div>


    <div class="img-item-blog-post">
    <img src="{{ asset('img/blog-img/2.jpg')}}" alt="">
    <div class="post-meta">
    <ul>
    <li>
    <i class="fa fa-user"></i>
    <a href="#">Iwthemes</a>
    </li>
    <li>
    <i class="fa fa-clock-o"></i>
    <span>April 23, 2015</span>
    </li>
    <li>
    <i class="fa fa-eye"></i>
    <span>234 Views</span>
    </li>
    </ul>
    </div>
    </div>


    <div class="info-item-blog-post">
    <p>Meet here all our range of products and services, rules of our products and everything related to your savings in pension.</p>
    <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
    </div>

    </div>

    </div>


    <div class="col-md-4">

    <div class="item-blog-post">

    <div class="head-item-blog-post">
    <h3>Zone Saver</h3>
    </div>


    <div class="img-item-blog-post">
    <img src="{{ asset('img/blog-img/3.jpg')}}" alt="">
    <div class="post-meta">
    <ul>
    <li>
    <i class="fa fa-user"></i>
    <a href="#">Iwthemes</a>
    </li>
    <li>
    <i class="fa fa-clock-o"></i>
    <span>April 23, 2015</span>
    </li>
    <li>
    <i class="fa fa-eye"></i>
     <span>234 Views</span>
    </li>
    </ul>
    </div>
    </div>


    <div class="info-item-blog-post">
    <p>Accompany relevant share you mean, renewed and information of interest to learn to save you and your projects come true.</p>
    <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
    </div>

    </div>

    </div>

    </div>

    </div>

    </div>

    </section>
@endsection
