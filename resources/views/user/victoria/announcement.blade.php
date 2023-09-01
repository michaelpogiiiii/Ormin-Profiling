@if ($data2->isEmpty())
@else
    <div class="page-section bg-light" id="announce">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Past Events</h1>
            <div class="row mt-5">
                @foreach ($data2 as $event)
                <div class="col-lg-4 py-2 wow zoomIn">
                        <div class="card-blog" >
                            <div class="header">
                                <div class="post-category">
                                    <a href="#">{{ $event->municipality }}</a>
                                </div>
                                <a href="blog-details.html" class="post-thumb">
                                    <img src="eventimage/{{ $event->photo }}" alt="">
                                </a>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a href="blog-details.html">{{ $event->name }}</a></h5>
                                <div class="site-info">

                                    <span class="mai-time"></span> <?php echo date('F d, Y', strtotime($event->date)); ?>

                                </div>
                            </div>
                        </div>
                </div>
                @endforeach

                <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="blog.html" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>
    </div>
@endif
