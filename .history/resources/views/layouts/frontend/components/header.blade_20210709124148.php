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
                    <a href="{{route('all.interest')}}" class="btn btn-business">Add Interest</a>
                </div>

            </div>

            @endif
		</div>
	</div>
</header>
