
@extends('frontend.master')

@section('content2')

	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
                                <div class="central-meta">
									<div class="new-postbox">
                                        <h3 class="mb-2 text-center text-primary">Post your Job</h3>

										<div class="newpst-input">
											<form action="{{url('/post_job')}}" method="POST" enctype="multipart/form-data">
												@csrf
                                                <label for="" class="block">Job Title:</label>
                                                <div class="form-control mb-3">
                                                    <input type="text" style="border: 0; " name="title" placeholder="write title">
                                                </div>
                                                <label for="">Company Name:</label>
                                                <div class="form-control mb-3">
                                                    <input type="text" style="border: 0" name="company" placeholder="write company name">
                                                </div>
                                                <label for="">Job Type:</label>
                                                <div class="form-control mb-3">
                                                    <select id="" name="job_type">
                                                        <option value="Full-Time">Full-Time</option>
                                                        <option value="Part-Time">Part-Time</option>
                                                        <option value="Internship">Internship</option>
                                                        <option value="Volunteer">Volunteer</option>
                                                    </select>
                                                </div>
                                                <label for="">Workplace Type:</label>
                                                <div class="form-control mb-3" >
                                                    <select id="" name="workplace">
                                                        <option value="On-site">On-site</option>
                                                        <option value="remote">remote</option>
                                                        <option value="Hybrid">Hybrid</option>
                                                    </select>
                                                </div>
                                                <label for="">Job Description:</label>
                                                <div class="mb-3">
                                                  <textarea rows="3" name="desc" placeholder="write something..." class="form-control mb-2"></textarea>
                                                </div>
                                                <button type="submit">Post Job</button>
											</form>
										</div>
									</div>
								</div>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<!-- add post new box -->

                                @foreach(App\Models\job::inRandomOrder()->get() as $jobs)
                                @if ($jobs)
                                    <div class="central-meta item">
										<div class="user-post">
											<div class="friend-info">
												<figure>
													<img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$jobs->user_id)->first()->photo}}" alt="">
												</figure>
                                                <div class="friend-name">
                                                    <ins><a href="#" title="">{{App\Models\user_account::where('id',$jobs->user_id)->first()->user_name}}</a></ins>
                                                    <span>published: 15 December, 2024</span>
                                                </div>
												<div class="description">
													<h2>{{$jobs->Job_title}}</h2>
                                                    <h5>{{$jobs->Company_name}}</h5>
                                                    <h6>{{$jobs->Job_type}}, {{$jobs->workplace}}</h6>

													<p>{{$jobs->description}}</p>



												</div>
												<div class="post-meta">
												</div>
											</div>
										</div>
								    </div>
                                @endif
                                @endforeach

							</div><!-- centerl meta -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>use night mode</span>
            <input type="checkbox" id="nightmode1"/>
            <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notifications</span>
            <input type="checkbox" id="switch22" />
            <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notification sound</span>
            <input type="checkbox" id="switch33" />
            <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>My profile</span>
            <input type="checkbox" id="switch44" />
            <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show profile</span>
            <input type="checkbox" id="switch55" />
            <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>Sub users</span>
            <input type="checkbox" id="switch66" />
            <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>personal account</span>
            <input type="checkbox" id="switch77" />
            <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Business account</span>
            <input type="checkbox" id="switch88" />
            <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show me online</span>
            <input type="checkbox" id="switch99" />
            <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Delete history</span>
            <input type="checkbox" id="switch101" />
            <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Expose author name</span>
            <input type="checkbox" id="switch111" />
            <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
</div><!-- side panel -->



@endsection


@section('footer')

<script>
    $('.like2').click(function(){
        var post = $(this).val();
		var user = $('.user_id').val();
        var cnt = '#count' + post;
        var count = parseInt($(cnt).text());



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type:'POST',
            url:'/reacted',
            data:{user_id:user,post_id:post},
            success:function(data){
                if(data == 1){
                  var react = "#react" + post;
                  $(react).removeClass("ti-heart").addClass("fa-solid fa-heart");
                  $(cnt).html(count+1);
                }
                else if(data == 0){
                    var react = "#react" + post;
                  $(react).removeClass("fa-solid fa-heart").addClass("ti-heart");
                  $(cnt).html(count-1);
                }



            }
        })
    });
</script>

<script>
    $('.jreply').click(function(){
        var id = $(this).val();
        var replybox = "#replybox" + id;

        // alert(replybox);
        var check = $(replybox).attr('hidden');



        if(check!== undefined){
            $(replybox).removeAttr('hidden');
        }
        else{
            $(replybox).attr('hidden','hidden');
        }
    })
</script>

@endsection
