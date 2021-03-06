<div class='row'>                   
    <div class="col-lg-4">
        <ul class="nav nav-stacked">
            <li><h3 class="highlight">Tags <i class="fa fa-tags pull-right"></i></h3></li>
            @foreach($telo as $t)
            <a href="{{ route('tags',$t->slug) }}"><span class="label label-success">{{ $t->nama }}</span></a>
            @endforeach
        </ul>
    </div><!-- /col-lg-4 -->

    <div class="col-lg-4">
        <ul class="nav nav-stacked">
            <li><h3 class="highlight">Links <i class="fa fa-external-link pull-right"></i></h3></li>
            @foreach ($links as $link)
            <a href="{{ $link->url }}"><i class="fa fa-facebook-square fa-2x"></i> {{ $link->judul }} </a>
            @endforeach
        </ul>
    </div><!-- /col-lg-4 -->

    <div class="col-lg-4">
        <ul class="nav nav-tabs" id="recent">
            <li class="active"><a href="#home" data-toggle="tab">Recent Posts</a></li>
            <li><a href="#profile" data-toggle="tab">Recent Comments </a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                @if ($latest_post->count())
                <ul>
                    @foreach ($latest_post as $art)
                    <li><h5>{{ link_to_route('artikel',$art->judul,$art->slug,$attributes = array('class' => 'reply')) }}</h5></li>
                    @endforeach
                </ul>
                @else
                <h5>NO POSTS YET</h5>
                @endif
            </div>
            <div class="tab-pane" id="profile">
                @if ($latest_comment->count())
                <ul>
                    @foreach ($latest_comment as $com)
                    <li>
                        <h5><strong>{{ $com->nama }}</strong> on {{ link_to_route('artikel',$com->artikel->judul,$com->artikel->slug,$attributes = array('class' => 'reply')) }}</h5>
                        <p>{{ $com->komentar }}</p>
                    </li>
                    @endforeach
                </ul>
                @else
                <h5>NO POSTS YET</h5>
                @endif
            </div>
        </div>
    </div><!-- /col-lg-4 -->
</div>