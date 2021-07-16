@extends('layouts.frontend.messengermaster')
@section('content')
<div class="flex justify-between mt-6 mb-4">
    <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight"> My Interests </h1>
    <a href="#" class="text-blue-400 hover:text-blue-500"> See all</a>
</div>
<div class="relative uk-slider" uk-slider="finite: true">

    <div class="uk-slider-container pb-3">

        <ul class="uk-slider-items uk-child-width-1-6@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" style="transform: translate3d(0px, 0px, 0px);">
@foreach($myInterests as $myInterest)
            <li tabindex="-1" class="uk-active">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/11.jpg" uk-img="" style="background-image: url(&quot;file:///C:/Users/user/Downloads/instellohtml/assets/images/product/11.jpg&quot;);">
                        <div class="group-catagroy-card-content">
                            <h4> {{$myInterest->interests->interest}} </h4>
                        </div>
                    </div>
                </a>
            </li>
@endforeach
            <li tabindex="-1" class="uk-active">
                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/1.jpg" uk-img="" style="background-image: url(&quot;file:///C:/Users/user/Downloads/instellohtml/assets/images/product/1.jpg&quot;);">
                        <div class="group-catagroy-card-content">
                            <h4> headphones </h4>
                        </div>
                    </div>
                </a>

            </li>
            <li tabindex="-1" class="uk-active">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/7.jpg" uk-img="">
                        <div class="group-catagroy-card-content">
                            <h4> Fruits </h4>
                        </div>
                    </div>
                </a>

            </li>
            <li tabindex="-1" class="uk-active">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/4.jpg" uk-img="" style="background-image: url(&quot;file:///C:/Users/user/Downloads/instellohtml/assets/images/product/4.jpg&quot;);">
                        <div class="group-catagroy-card-content">
                            <h4> Mobiles </h4>
                        </div>
                    </div>
                </a>

            </li>
            <li tabindex="-1" class="uk-active">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/13.jpg" uk-img="" style="background-image: url(&quot;file:///C:/Users/user/Downloads/instellohtml/assets/images/product/13.jpg&quot;);">
                        <div class="group-catagroy-card-content">
                            <h4> Parfums </h4>
                        </div>
                    </div>
                </a>

            </li>
            <li tabindex="-1" class="uk-active">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/15.jpg" uk-img="" style="background-image: url(&quot;file:///C:/Users/user/Downloads/instellohtml/assets/images/product/15.jpg&quot;);">
                        <div class="group-catagroy-card-content">
                            <h4> Oils </h4>
                        </div>
                    </div>
                </a>

            </li>
            <li tabindex="-1" class="">

                <a href="#">
                    <div class="group-catagroy-card" data-src="assets/images/product/3.jpg" uk-img="">
                        <div class="group-catagroy-card-content">
                            <h4> Laptops </h4>
                        </div>
                    </div>
                </a>

            </li>
        </ul>

        <a class="-left-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center -mb-3 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white uk-invisible" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
        <a class="-right-5 absolute bg-white bottom-1/2 flex h-11 items-center justify-center -mb-3 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>
</div>



@endsection
