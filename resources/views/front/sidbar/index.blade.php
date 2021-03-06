<!--Sidebar-->
<div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <aside class="sidebar blog-sidebar">


        <!-- Categories -->
        <div class="sidebar-widget categories">
            <div class="sidebar-title"><h3>{{ __('front.categories') }}</h3></div>
            <ul class="archive-list">
                @if(!$categories->isEmpty())
                    @foreach($categories as $categorie)
                     <li><a href="{{url('/')}}/categorie/{{$categorie->translation()->first()->slug}}" class="clearfix"><span class="pull-left"> {{$categorie->translation()->first()->name}} </span> <span class="pull-right">({{$categorie->getArticls->count()}})</span></a></li>
                    @endforeach
                @endif
            </ul>
        </div>


        <!-- Recent Posts -->
        <div class="sidebar-widget popular-posts">
            <div class="sidebar-title"><h3>  {{ __('front.recent') }}</h3></div>
                @if(!$articlesSidbar->isEmpty())
                 @foreach($articlesSidbar as $articleSidbar)
                    <article class="post">
                        <h3 class="text"><a href="{{url('/')}}/article/{{$articleSidbar->translation()->first()->slug}}">{{$articleSidbar->translation()->first()->title}}</a></h3>
                        <div class="date">{{$articleSidbar->translation()->first()->created_at->diffForHumans()}}</div>
                    </article>
                @endforeach
                @endif
        </div>


         <!-- Tags -->
        <div class="sidebar-widget popular-tags">
            <div class="sidebar-title"><h3>Tags</h3></div>
                @if(count($tags) > 0)
                 @foreach($tags as $tag)
                      <a href="{{url('/')}}/tag/{{$tag->translation()->first()->slug}}">{{$tag->translation()->first()->name}}</a>
                @endforeach
                @endif
        </div>

    </aside>
</div>
<!--Sidebar-->