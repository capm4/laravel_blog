<!-- Page Content -->


        <!-- Post Content Column -->
        <div class="col-lg-8">
        @foreach($posts as $post)
            <div class="col-12" style="margin-bottom: 60px">
                <!-- Title -->
                <h1 class="mt-4">
                    <a href="{{ route('post',array('id'=>$post->id))}}">
                        {{$post->title}}
                    </a>
                </h1>

                <hr>

                <!-- Date/Time -->
                    <p>@lang('messages.created_at'){{' '.date_format($post->created_at, 'l jS F Y \o\n g:ia')}} by <span style="color: blue">{{$post->user->nick}}</span> </p>

                <hr>

                <!-- Preview Image -->
                 {!! Html::image('/img/post/'.$post->storeName.'/'.$post->image,'',array('class'=>'img-fluid rounded')) !!}

                <hr>
             </div>
        @endforeach
        </div>