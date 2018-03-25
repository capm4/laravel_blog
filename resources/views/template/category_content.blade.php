<div class="col-lg-8">
@foreach($posts as $post)
    <!-- Title -->
        <h1 class="mt-4">
            <a href="{{ route('post',array('id'=>$post->id))}}">
                {{$post->title}}
            </a>
        </h1>

        <hr>
        <!-- Preview Image -->
        {!! Html::image('/img/post/'.$post->storeName.'/'.$post->image,'',array('class'=>'img-fluid rounded')) !!}

        <hr>

        <!-- Date/Time -->
        <p>{{'Posted on '.date_format($post->created_at, 'l jS F Y \o\n g:ia')}} by <span style="color: blue">{{$post->user->nick}}</span> </p>

        <hr>

        <!-- Preview Image -->
        {!! Html::image('/img/post/'.$post->image,'',array('class'=>'img-fluid rounded')) !!}

        <hr>
    @endforeach
</div>