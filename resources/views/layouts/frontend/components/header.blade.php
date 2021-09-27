<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-2 ">

				<div class="logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" alt="" style="width: 115px"></a></div>


			</div>
			<div class="col-lg-4 dis-flex-start">
				<p><strong>SHARE AN ADVENTURE.<br>
				MAKE A FRIEND.</strong></p>
			</div>


            @if(!cache()->get('customer_login'))
			<div class="col-lg-6 dis-flex-end">
                <a type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-business" style="margin-right: 12px;">login</a>
                <a href="{{ route('signup') }}"  class="btn btn-business">Sign Up</a>
			</div>

            @else
            <div class="row">
                <div class="col-lg-6 dis-flex-end">
                    <a href="{{route('new.feeds')}}" class="btn btn-business">Dashboard</a>

                </div>
                <div class="col-lg-6 dis-flex-end">
                    <a href="{{route('all.interest')}}" class="btn btn-business" style="font-size: 23px;">Add Interest</a>
                </div>

            </div>

            @endif
		</div>
	</div>
</header>
