<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4 mb-4">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">

                        @php $locale = session()->get('locale'); @endphp
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="media flex-wrap w-100 align-items-center"> <img src="https://dummyimage.com/50x50/dee2e6/6c7574.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                                            <div class="media-body ml-3">
                                                <p>{{$article->articleHasUser->name}}</p>
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
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>