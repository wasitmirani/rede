<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-2 ">
				<div class="logo"><a href="/"><img src="/assets/images/logo.png" alt=""></a></div>
			</div>
			<div class="col-lg-4 dis-flex-start">
				<p><strong>SHARE AN ADVENTURE.<br>
				MAKE A FRIEND.</strong></p>
			</div>
            <a href="{{}}" class="bg-pink-500 flex font-bold hidden hover:bg-pink-600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false">
                <ion-icon name="add-circle" class="-mb-1
                 mr-1 opacity-90 text-xl uilus-circle"></ion-icon> Upload
            </a>

            @if(!cache()->get('customer_login'))
			<div class="col-lg-6 dis-flex-end">
                <a href="{{route('customer.login')}}" class="btn btn-business">login</a>
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
