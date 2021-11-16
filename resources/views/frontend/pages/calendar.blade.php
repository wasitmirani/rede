@extends('layouts.frontend.messengermaster')
@section('content')

<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title text-center">
                  <div class="title-text">
                      <h2>My Calendar</h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12 ">
              {{-- <ul class="nav custom-tab" id="myTab" role="tablist">
                  <li class="nav-item">
              <a class="nav-link active" id="home-taThursday" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Day 1</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Day 2</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Day 3</a>
              </li>
              <li class="nav-item d-none d-lg-block">
              <a class="nav-link" id="sunday-tab" data-toggle="tab" href="#sunday" role="tab" aria-controls="sunday" aria-selected="false">Day 4</a>
              </li> --}}

          </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel">
                  <div class="table-responsive">
                         <table class="table">
                          <thead>
                              {{-- <tr>
                                  <th class="text-center" scope="col">Date</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">TagLine</th>

                              </tr> --}}
                          </thead>
                          <tbody>
                            @foreach($events as $event)
                            <tr class="inner-box">
                                  {{-- <th scope="row">
                                      <div class="">
                                          <span>{{ \Carbon\Carbon::parse($event->start_date)->diffForHumans() }}</span>
                                          <p>Novembar</p>
                                      </div>
                                  </th> --}}
                                  <a>
                                  <td>
                                      <div class="event-img">
                                          <img src="{{ asset('/user/event/images/'.$event->image) }}" alt="">
                                      </div>
                                   </td>
                                </a>
                                   <td>
                                      <div class="event-wrap">
                                          <h3>
                                              <a href="./speakers-single.html">{{ $event->title }}</a>
                                          </h3>
                                          <div class="meta">

                                              <div class="categories">
                                                  <a href="#">{{ $event->description }}</a>
                                              </div>
                                                <div class="time">
                                                    {{ \Carbon\Carbon::parse($event->start_date)->diffForHumans() }}
                                                </div>
                                               </div>
                                           </div>
                                    </td>
                                    <td>
                                        <div class="primary-btn">
                                            <a class="btn-primary" href="{{ route('book.event',$event->id) }}">Book Now</a>
                                        </div>
                                    </td>


                            </tr>
                            @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="table-responsive">
                            <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center" scope="col">Date</th>
                                  <th scope="col">Speakers</th>
                                  <th scope="col">Session</th>
                                  <th scope="col">Venue</th>
                                  <th class="text-center" scope="col">Venue</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="inner-box">
                                  <th scope="row">
                                      <div class="event-date">
                                          <span>16</span>
                                          <p>Novembar</p>
                                      </div>
                                  </th>
                                  <td>
                                      <div class="event-img">
                                          <img src="{{ asset('')}}" alt="">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="event-wrap">
                                          <h3>
                                              <a href="./speakers-single.html">Harman Kardon</a>
                                          </h3>
                                          <div class="meta">
                                              <div class="organizers">
                                                  <a href="#">Aslan Lingker</a>
                                              </div>
                                              <div class="categories">
                                                  <a href="#">Inspire</a>
                                              </div>
                                              <div class="time">
                                                  <span>05:35 AM - 08:00 AM 2h 25'</span>
                                                   </div>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                          <div class="r-no">
                                              <span>Room B3</span>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="primary-btn">
                                              <a class="btn-primary" href="#">Read More</a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                  </div>
              </div>
              {{-- <div class="tab-pane fade" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">
                  <div class="table-responsive">
                            <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center" scope="col">Date</th>
                                  <th scope="col">Speakers</th>
                                  <th scope="col">Session</th>
                                  <th scope="col">Venue</th>
                                  <th class="text-center" scope="col">Venue</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="inner-box">
                                  <th scope="row">
                                      <div class="event-date">
                                          <span>16</span>
                                          <p>Novembar</p>
                                      </div>
                                  </th>
                                  <td>
                                      <div class="event-img">
                                          <img src="{{ asset('')}}" alt="">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="event-wrap">
                                          <h3>
                                              <a href="./speakers-single.html">Harman Kardon</a>
                                          </h3>
                                          <div class="meta">
                                              <div class="organizers">
                                                  <a href="#">Aslan Lingker</a>
                                              </div>
                                              <div class="categories">
                                                  <a href="#">Inspire</a>
                                              </div>
                                              <div class="time">
                                                  <span>05:35 AM - 08:00 AM 2h 25'</span>
                                                   </div>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                          <div class="r-no">
                                              <span>Room B3</span>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="primary-btn">
                                              <a class="btn-primary" href="#">Read More</a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                  </div>
              </div> --}}
              {{-- <div class="tab-pane fade" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                  <div class="table-responsive">
                            <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center" scope="col">Date</th>
                                  <th scope="col">Speakers</th>
                                  <th scope="col">Session</th>
                                  <th scope="col">Venue</th>
                                  <th class="text-center" scope="col">Venue</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="inner-box">
                                  <th scope="row">
                                      <div class="event-date">
                                          <span>16</span>
                                          <p>Novembar</p>
                                      </div>
                                  </th>
                                  <td>
                                      <div class="event-img">
                                          <img src="{{ asset('')}}" alt="">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="event-wrap">
                                          <h3>
                                              <a href="./speakers-single.html">Harman Kardon</a>
                                          </h3>
                                          <div class="meta">
                                              <div class="organizers">
                                                  <a href="#">Aslan Lingker</a>
                                              </div>
                                              <div class="categories">
                                                  <a href="#">Inspire</a>
                                              </div>
                                              <div class="time">
                                                  <span>05:35 AM - 08:00 AM 2h 25'</span>
                                                   </div>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                          <div class="r-no">
                                              <span>Room B3</span>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="primary-btn">
                                              <a class="btn-primary" href="#">Read More</a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                  </div>
              </div> --}}
          </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>


</script>
@endsection
