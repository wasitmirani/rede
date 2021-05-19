@extends('layouts.frontend.master')

@section('content')
<!-- Main Banner -->
<!-- Account -->
<section class="account">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 p-5 m-auto search-bar">
				<div class="search-wrapper">
					<div class="input-holder">
						<input type="text" class="search-input" placeholder="Type to search" />
						<button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
					</div>
					<span class="close" onclick="searchToggle(this, event);"></span>
				</div>
				<h4>Search Here</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="img-sec">
					<div class="img-box"><img src="/assets/images/profile.jpg" class="img-fluid" alt=""></div>
					<h2 class="heading-two">Tim W.</h2>
					<a href="#" class="btn btn-business">Individual</a>
					<a href="#" class="btn btn-business"><img src="/assets/images/guita.png" class="img-fluid" alt="">Electric Bass</a>
					<div class="para-two">90210   (15 miles)</div>
					<!-- Button1 -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					My Other Interests <i class="fas fa-ellipsis-v"></i>
					</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog  modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">My Other Interests</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Button1 -->
					<!-- Button2 -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
					My Other Interests <i class="fas fa-ellipsis-v"></i>
					</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Advanced Filters</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Button2 -->

				</div>
			</div>
			<div class="col-md-1 p-0">
				<ul class="nav nav-pills flex-column" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PEOPLE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">GROUPS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">EVENTS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Edit Profile</a>
					</li>
				</ul>
			</div>
			<div class="col-md-5">
				<div class="tab-content content-in" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<!-- START TABS DIV -->
						<div class="tabbable-responsive">
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true"><i class="fas fa-guitar"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false"><i class="fas fa-coffee"></i></a>
									</li>
								</ul>
							</div>
						</div>

						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
									<ul class="list-unstyled det">
										<li><i class="fas fa-map-marker-alt"></i>Eugene, Oregon</li>
										<li><i class="fas fa-user"></i>he/him</li>
										<li><i class="fas fa-birthday-cake"></i>Age 26 - 30</li>
										<li><i class="fas fa-virus"></i>Partially Vaccinated</li>
									</ul>
									<p class="para-one">Co-owner of eugene`s #1 vegan restaurant, sprout; working on my 5th cup of coffee; obsessed with space movies; I bike everywhere I go, My specialty is jaz ( although I`m an intermediate, at best )</p>
								</div>
								<div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
									<p class="para-one">Co-owner of eugene`s #1 vegan restaurant, sprout; working on my 5th cup of coffee; obsessed with space movies; I bike everywhere I go, My specialty is jaz ( although I`m an intermediate, at best )</p>
								</div>
							</div>
							<!-- END TABS DIV -->
						</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<h2 class="heading-two color-red">Groups</h2>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<h2 class="heading-two color-red">Events</h2>
					</div>
					<!-- Edit Profile -->
					<div class="tab-pane fade " id="edit" role="tabpanel" aria-labelledby="edit-tab">
						<div class="tabbable-responsive">
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="edit1-tab" data-toggle="tab" href="#edit1" role="tab" aria-controls="edit1" aria-selected="true"><i class="fas fa-user-alt"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="edit2-tab" data-toggle="tab" href="#edit2" role="tab" aria-controls="edit2" aria-selected="false"><i class="fas fa-info"></i></a>
									</li>
								</ul>
							</div>
						</div>

						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="edit1" role="tabpanel" aria-labelledby="edit1-tab">
									<form class="needs-validation" novalidate>
										<div class="form-row">
											<div class="col-md-4 mb-3">
												<img src="/assets/images/profile.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
												<h6>Upload a different photo...</h6>
												<input type="file" class="text-center center-block file-upload">
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-4 mb-3">
												<label for="validationCustom01">First name</label>
												<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
												<div class="valid-feedback">
													Looks good!
												</div>
												<div class="invalid-feedback">
													Please enter your first name.
												</div>
											</div>
											<div class="col-md-4 mb-3">
												<label for="validationCustom02">Last name</label>
												<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
												<div class="valid-feedback">
													Looks good!
												</div>
												<div class="invalid-feedback">
													Please enter your last name.
												</div>
											</div>
											<div class="col-md-4 mb-3">
												<label for="validationCustomUsername">Email</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="inputGroupPrepend">@</span>
													</div>
													<input type="email" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
													<div class="invalid-feedback">
														Please choose a username.
													</div>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6 mb-3">
												<label for="validationCustom03">City</label>
												<input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
												<div class="invalid-feedback">
													Please provide a valid city.
												</div>
											</div>
											<div class="col-md-3 mb-3">
												<label for="validationCustom04">State</label>
												<input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
												<div class="invalid-feedback">
													Please provide a valid state.
												</div>
											</div>
											<div class="col-md-3 mb-3">
												<label for="validationCustom05">Zip</label>
												<input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
												<div class="invalid-feedback">
													Please provide a valid zip.
												</div>
											</div>
										</div>
										<button class="btn btn-business" type="submit">Update</button>
									</form>
								</div>
								<div class="tab-pane fade" id="edit2" role="tabpanel" aria-labelledby="edit2-tab">
									<p class="para-one">Co-owner of eugene`s #1 vegan restaurant, sprout; working on my 5th cup of coffee; obsessed with space movies; I bike everywhere I go, My specialty is jaz ( although I`m an intermediate, at best )</p>
								</div>
							</div>
							<!-- END TABS DIV -->
						</div>
					</div>
					<!-- Edit Profile -->
				</div>
			</div>
			<div class="col-md-3">
				<div class="forward-btns">
					<ul class="list-unstyled">
						<li><a href="#"><img src="/assets/images/icon1.png" class="img-fluid" alt=""> Learn More</a></li>
						<li><a href="#"><img src="/assets/images/icon2.png" class="img-fluid" alt=""> Bookmark</a></li>
						<li><a href="#"><img src="/assets/images/icon3.png" class="img-fluid" alt=""> Save to Address Book</a></li>
						<li><a href="#"><img src="/assets/images/icon4.png" class="img-fluid" alt=""> Share </a></li>
						<li><a href="#"><img src="/assets/images/icon5.png" class="img-fluid" alt=""> Say Hello</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Account -->

@endsection
