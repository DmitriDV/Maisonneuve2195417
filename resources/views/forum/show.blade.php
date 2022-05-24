@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-4">
    <div class="about-heading-content">
        <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
                <div class="bg-faded rounded p-5">
                    <!-- Retour-->
                    <div class="">
                        <a href="{{ route('forum') }}" class="btn btn-outline-dark mt-4 mb-4 ">@lang('lang.button_return')</a>
                    </div>

                    @php $locale = session()->get('locale'); @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="media flex-wrap w-100 align-items-center"> <img src="https://dummyimage.com/50x50/dee2e6/6c7574.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                                        <div class="media-body ml-3">
                                            <a href="{{ route('liste.show', $article->articleHasUser->id) }}" data-abc="true">{{$article->articleHasUser->name}}</a>
                                        </div>
                                        <div class="text-muted small ml-3">
                                            <div>@lang('lang.text_forum_member') <strong>{{$article->articleHasUser->created_at->format('Y-m-d')}}</strong></div>
                                        </div>                                        
                                    </div>
                                    <div class="text-muted small ml-3">
                                        <h4 class="">@if($locale == 'fr'){{ ucfirst($article->titre_fr)}}</h4>
                                        <h4 class="">@else{{ ucfirst($article->titre_en)}}@endif</h4>
                                    </div>
                                    <div class="text-muted small ml-3">
                                        <div>@lang('lang.text_article_categorie')<strong>@if($locale == 'fr'){{$article->articleHasCategorie->categorie_fr}}@else{{$article->articleHasCategorie->categorie_en}}@endif</strong></div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <p>@if($locale == 'fr'){!! $article->contenu_fr !!}
                                    @else{!! $article->contenu_en !!}@endif</p>
                                </div>
                                <div class="card-footer d-flex flex-wrap justify-content-end align-items-center ">
                                    <div class="px-4 pt-3">    
                                        <div class="text-muted small">@lang('lang.text_forum_date'){{ ucfirst($article->created_at->format('Y-m-d'))}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($article->articleHasUser->email == $user_email)
                    <a href="{{ route('forum.edit', $article->id)}}" class="btn btn-outline-dark mt-4 ">@lang('lang.title_forum_modify')</a>
                    <hr>
                    @endif
                    <a href="{{ route('forum.pdf', $article->id)}}" class="btn btn-outline-success" target="_blank">@lang('lang.text_forum_pdf')PDF</a>
                    @if($article->articleHasUser->email == $user_email)
                    <hr>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        @lang('lang.text_forum_delete')
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
        


<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel"> @lang('lang.module_forum_delete')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @lang('lang.question_forum_delete')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close_forum_delete')</button>
        <form method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">@lang('lang.action_forum_delete')</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection