@extends('layouts.app')

@section('content')
    <section class="py-5">
        <!-- Section-->
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-2 justify-content-center">
                <div class="col mb-5">
                    <!-- Retour-->
                    <div class="">
                        <div class="text"><a class="btn btn-outline-dark mt-auto" href="{{ route('forum.create') }}">@lang('lang.button_forum_add')</a></div>
                    </div>
                </div>
                <div class="col-1">
                    <h2 class="display-one">@lang('lang.title_forum_index')</h2>
                </div>
            </div>           
            @php $locale = session()->get('locale'); @endphp
            <!--Articles en français-->
            @forelse($articles as $article)
            <div class="row">
                <div class="col-md-12">
                    <div class="card-line mb-4">
                        <div class="card-header">
                            <div class="media flex-wrap w-100 align-items-center"> <img src="https://dummyimage.com/50x50/dee2e6/6c7574.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                            </div>
                            <div class="media-body ml-3"> <a href="{{ route('liste.show', $article->articleHasUser->id) }}" data-abc="true">{{$article->articleHasUser->name}}</a></div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('forum.show', $article->id) }}">@if($locale == 'fr'){{ ucfirst($article->titre_fr)}}</a>
                            <a href="{{ route('forum.show', $article->id) }}">@else{{ ucfirst($article->titre_en)}}@endif</a>
                            <div class="text-muted small">{{ ucfirst($article->created_at->format('Y-m-d'))}}</div>
                            <details class="text-muted small">
                                <summary><small>@lang('lang.content_forum_open')</small></summary>
                                <p>@if($locale == 'fr'){{ ucfirst($article->contenu_fr)}}</p>
                                <p>@else{{ ucfirst($article->contenu_fr)}}@endif</p>
                            </details>
                        </div>
                    </div>
                </div>
            </div>            
            @empty
            <div class="row">
                <h3>@lang('lang.no_content_forum')</h3>
            </div>
            @endforelse
        </div>
    </section>
    
@endsection