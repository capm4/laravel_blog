<!-- Sidebar Widgets Column -->
<div class="col-lg-4 col-md-6">
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">@lang('messages.categories')</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div style="list-style-type: none" class="list-group">
                        <a href="{{route('category' , array('id'=>0))}}" class="list-group-item">
                            All
                        </a>
                        @foreach($categories as $category)
                            <a href="{{route('category' , array('id'=>$category->id))}}" class="list-group-item">
                                        {{$category->title}}
                                <span class="badge">{{(count($category->posts))}}</span>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
