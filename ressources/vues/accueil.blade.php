@extends('gabarit')

@section('classeBody')
        accueil
@endsection

@section('contenu')
    <h1 class="screen-reader-only">Accueil</h1>
    <section class="nouveautes livres">
        <h2 class="accueil__titre">Nouveautés</h2>
        <div class="livre conteneurGrille">
            <!-- Foreach Nouveautés -->
            {{--                        Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <picture class="livre__picture">
                                <!-- Image pour mobile, tablette et poste de table -->
                                <img class="livre__image etiquette"
                                     src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                                     srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                                     alt="">
                            </picture>
                            <p class="livre__etiquette">Nouveauté</p>
                        </div>
                        <div class="livre__conteneurTitreInfos">
                            <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                            <ul class="livre__listeInfos">
                                @foreach($livre->getAuteurAssocie() as $auteur)
                                    <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                                @endforeach
                                <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                            </ul>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
        <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499">
                <stop offset="0" stop-color="#fcfcfc"/>
                <stop offset="1" stop-color="#f2f2ee"/>
            </linearGradient>
            <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954">
                <stop offset="0"/>
                <stop offset="1" stop-color="#fff"/>
            </linearGradient>
            <rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/>
            <path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/>
        </svg>
    </section>
    <section class="nouveautes livres">
        <h2 class="accueil__titre">À paraître</h2>
        <div class="livre conteneurGrille">
            <!-- Foreach À paraître -->
            {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($aparaitre as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <picture class="livre__picture">
                                <!-- Image pour mobile, tablette et poste de table -->
                                <img class="livre__image etiquette"
                                     src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                                     srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                                     alt="">
                            </picture>
                            <p class="livre__etiquette">À paraître</p>
                        </div>
                        <div class="livre__conteneurTitreInfos">
                            <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                            <ul class="livre__listeInfos">
                                @foreach($livre->getAuteurAssocie() as $auteur)
                                    <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                                @endforeach
                                <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                            </ul>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
        <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499">
                <stop offset="0" stop-color="#fcfcfc"/>
                <stop offset="1" stop-color="#f2f2ee"/>
            </linearGradient>
            <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954">
                <stop offset="0"/>
                <stop offset="1" stop-color="#fff"/>
            </linearGradient>
            <rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/>
            <path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/>
        </svg>
    </section>
    <section class="actualites">
        <div class="actualites__conteneurGrille">
            <h2 class="actualites__titre">Actualités</h2>
            <!-- Foreach Actualités -->
            @foreach($actualites as $actualite)
                <article class="actualite">
                    <picture class="actualite__picture">
                        <!-- Image pour mobile, tablette et poste de table -->
                        <img class="actualite__image etiquette"
                             src="../public/liaisons/images/actualites/{{$actualite->getId()}}-470.jpg"
                             srcset="../public/liaisons/images/actualites/{{$actualite->getId()}}-470.jpg 1x, ../public/liaisons/images/actualites/{{$actualite->getId()}}-940.jpg 2x"
                             alt="">
                    </picture>
                    <div class="actualite__conteneurInfos">
                        <h3 class="actualite__titre">{{$actualite->getTitre()}}</h3>
                        <time class="actualite__date">{{$actualite->getDate()}}</time>
                        <p class="actualite__contenu">{{$actualite->getIntro()}}</p>
                        <a class="actualite__lien" href="{{$actualite->getLienFacebook()}}">
                            <svg fill="none" height="50" viewBox="0 0 35 35" width="50" xmlns="http://www.w3.org/2000/svg"><path d="m1.5 17.5c0-8.83656 7.16344-16 16-16 8.8366 0 16 7.16344 16 16 0 8.8366-7.1634 16-16 16-8.83656 0-16-7.1634-16-16z" fill="#0050af" stroke="#0050af" stroke-width="3"/><path clip-rule="evenodd" d="m19.6577 35.0001v-13.2495h3.907l.5178-4.2838h-4.4248l.0067-2.1441c0-1.1173.1208-1.716 1.9479-1.716h2.4425v-4.28431h-3.9075c-4.6936 0-6.3456 2.07811-6.3456 5.57281v2.572h-2.9257v4.2839h2.9257v12.899s.8983.35 2.9983.35z" fill="#fff" fill-rule="evenodd"/></svg>
                        </a>
                        <a class="actualite__lien" href="{{$actualite->getLienInstagram()}}">
                            <svg fill="none" height="50" viewBox="0 0 35 35" width="50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><mask id="a" height="35" maskUnits="userSpaceOnUse" width="35" x="0" y="0"><path clip-rule="evenodd" d="m0 17.4792c0-9.65349 7.82571-17.4792 17.4792-17.4792 9.6535 0 17.4792 7.82571 17.4792 17.4792 0 9.6535-7.8257 17.4792-17.4792 17.4792-9.65349 0-17.4792-7.8257-17.4792-17.4792z" fill="#fff" fill-rule="evenodd"/></mask><path d="m1.5 17.5c0-8.83656 7.16344-16 16-16 8.8366 0 16 7.16344 16 16 0 8.8366-7.1634 16-16 16-8.83656 0-16-7.1634-16-16z" fill="#0050af" stroke="#0050af" stroke-width="3"/><g mask="url(#a)"><path clip-rule="evenodd" d="m17.5008 7.61536c-2.6843 0-3.0211.01173-4.0754.05971-1.0522.04818-1.7704.21477-2.3989.45919-.65.25244-1.20147.59014-1.75084 1.13972-.54979.54937-.88748 1.10082-1.14076 1.75062-.24503.6287-.41182 1.3471-.45918 2.3989-.04715 1.0543-.05951 1.3914-.05951 4.0756 0 2.6843.01194 3.0202.05972 4.0744.04838 1.0522.21497 1.7705.45918 2.3989.25265.6501.59035 1.2015 1.13993 1.7509.54917.5498 1.10056.8883 1.75026 1.1407.6288.2444 1.3473.411 2.3993.4592 1.0543.048 1.3909.0597 4.075.0597 2.6845 0 3.0203-.0117 4.0746-.0597 1.0522-.0482 1.7712-.2148 2.4001-.4592.6498-.2524 1.2005-.5909 1.7496-1.1407.5498-.5494.8875-1.1008 1.1408-1.7507.243-.6286.4097-1.3471.4592-2.3989.0473-1.0542.0597-1.3903.0597-4.0746 0-2.6842-.0124-3.0211-.0597-4.0754-.0495-1.0522-.2162-1.7704-.4592-2.3988-.2533-.6501-.591-1.20155-1.1408-1.75092-.5498-.54979-1.0995-.88748-1.7502-1.13972-.6301-.24442-1.3488-.41101-2.401-.45919-1.0542-.04798-1.3899-.05971-4.075-.05971zm-.8866 1.78131c.2632-.00041.5568 0 .8867 0 2.6389 0 2.9517.00947 3.9938.05683.9637.04407 1.4867.20509 1.8351.34038.4613.17914.7901.39332 1.1358.73922.346.3459.5601.6754.7397 1.1366.1353.348.2965.871.3403 1.8347.0474 1.0419.0577 1.3549.0577 3.9927 0 2.6377-.0103 2.9507-.0577 3.9926-.044.9637-.205 1.4867-.3403 1.8347-.1792.4612-.3937.7896-.7397 1.1354-.3459.3459-.6743.56-1.1358.7392-.348.1359-.8714.2965-1.8351.3406-1.0419.0473-1.3549.0576-3.9938.0576-2.6392 0-2.952-.0103-3.9939-.0576-.9637-.0445-1.4867-.2055-1.8353-.3408-.4612-.1792-.7907-.3933-1.1366-.7392-.346-.346-.56012-.6746-.73968-1.1361-.13528-.3479-.29651-.871-.34037-1.8346-.04736-1.0419-.05683-1.3549-.05683-3.9943s.00947-2.9507.05683-3.9927c.04406-.9636.20509-1.4866.34037-1.835.17915-.4613.39368-.7907.73968-1.1367.3459-.3459.6754-.56006 1.1366-.73962.3484-.1359.8716-.29651 1.8353-.34078.9118-.04118 1.2651-.05354 3.1072-.0556zm6.1626 1.64143c-.6548 0-1.186.5306-1.186 1.1856 0 .6548.5312 1.1861 1.186 1.1861.6549 0 1.1861-.5313 1.1861-1.1861s-.5312-1.1861-1.1861-1.1861zm-5.2759 1.3858c-2.8031 0-5.0757 2.2726-5.0757 5.0757s2.2726 5.0747 5.0757 5.0747 5.0749-2.2716 5.0749-5.0747-2.272-5.0757-5.0751-5.0757zm0 1.7808c1.8194 0 3.2946 1.475 3.2946 3.2946 0 1.8195-1.4752 3.2946-3.2946 3.2946-1.8197 0-3.2946-1.4751-3.2946-3.2946 0-1.8196 1.4749-3.2946 3.2946-3.2946z" fill="#fff" fill-rule="evenodd"/></g></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    {{--    Les styles des événements sont identiques aux actualités --}}
    <section class="actualites">
        <div class="actualites__conteneurGrille">
            <h2 class="actualites__titre">Événements</h2>
            <!-- Foreach Actualités -->
            @foreach($evenements as $evenement)
                <article class="actualite">
                    <picture class="actualite__picture">
                        <!-- Image pour mobile, tablette et poste de table -->
                        <img class="actualite__image etiquette"
                             src="../public/liaisons/images/evenements/{{$evenement->getId()}}-470.jpg"
                             srcset="../public/liaisons/images/evenements/{{$evenement->getId()}}-470.jpg 1x, ../public/liaisons/images/evenements/{{$evenement->getId()}}-940.jpg 2x"
                             alt="">
                    </picture>
                    <div class="actualite__conteneurInfos">
                        <h3 class="actualite__titre">{{$evenement->getTitre()}}</h3>
                        <time class="actualite__date">{{$evenement->getDate()}}</time>
                        <p class="actualite__contenu">{{$evenement->getIntro()}}</p>
                        <a class="actualite__lien" href="{{$evenement->getLienFacebook()}}">
                            <svg fill="none" height="50" viewBox="0 0 35 35" width="50" xmlns="http://www.w3.org/2000/svg"><path d="m1.5 17.5c0-8.83656 7.16344-16 16-16 8.8366 0 16 7.16344 16 16 0 8.8366-7.1634 16-16 16-8.83656 0-16-7.1634-16-16z" fill="#0050af" stroke="#0050af" stroke-width="3"/><path clip-rule="evenodd" d="m19.6577 35.0001v-13.2495h3.907l.5178-4.2838h-4.4248l.0067-2.1441c0-1.1173.1208-1.716 1.9479-1.716h2.4425v-4.28431h-3.9075c-4.6936 0-6.3456 2.07811-6.3456 5.57281v2.572h-2.9257v4.2839h2.9257v12.899s.8983.35 2.9983.35z" fill="#fff" fill-rule="evenodd"/></svg>
                        </a>
                        <a class="actualite__lien" href="{{$evenement->getLienInstagram()}}">
                            <svg fill="none" height="50" viewBox="0 0 35 35" width="50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><mask id="a" height="35" maskUnits="userSpaceOnUse" width="35" x="0" y="0"><path clip-rule="evenodd" d="m0 17.4792c0-9.65349 7.82571-17.4792 17.4792-17.4792 9.6535 0 17.4792 7.82571 17.4792 17.4792 0 9.6535-7.8257 17.4792-17.4792 17.4792-9.65349 0-17.4792-7.8257-17.4792-17.4792z" fill="#fff" fill-rule="evenodd"/></mask><path d="m1.5 17.5c0-8.83656 7.16344-16 16-16 8.8366 0 16 7.16344 16 16 0 8.8366-7.1634 16-16 16-8.83656 0-16-7.1634-16-16z" fill="#0050af" stroke="#0050af" stroke-width="3"/><g mask="url(#a)"><path clip-rule="evenodd" d="m17.5008 7.61536c-2.6843 0-3.0211.01173-4.0754.05971-1.0522.04818-1.7704.21477-2.3989.45919-.65.25244-1.20147.59014-1.75084 1.13972-.54979.54937-.88748 1.10082-1.14076 1.75062-.24503.6287-.41182 1.3471-.45918 2.3989-.04715 1.0543-.05951 1.3914-.05951 4.0756 0 2.6843.01194 3.0202.05972 4.0744.04838 1.0522.21497 1.7705.45918 2.3989.25265.6501.59035 1.2015 1.13993 1.7509.54917.5498 1.10056.8883 1.75026 1.1407.6288.2444 1.3473.411 2.3993.4592 1.0543.048 1.3909.0597 4.075.0597 2.6845 0 3.0203-.0117 4.0746-.0597 1.0522-.0482 1.7712-.2148 2.4001-.4592.6498-.2524 1.2005-.5909 1.7496-1.1407.5498-.5494.8875-1.1008 1.1408-1.7507.243-.6286.4097-1.3471.4592-2.3989.0473-1.0542.0597-1.3903.0597-4.0746 0-2.6842-.0124-3.0211-.0597-4.0754-.0495-1.0522-.2162-1.7704-.4592-2.3988-.2533-.6501-.591-1.20155-1.1408-1.75092-.5498-.54979-1.0995-.88748-1.7502-1.13972-.6301-.24442-1.3488-.41101-2.401-.45919-1.0542-.04798-1.3899-.05971-4.075-.05971zm-.8866 1.78131c.2632-.00041.5568 0 .8867 0 2.6389 0 2.9517.00947 3.9938.05683.9637.04407 1.4867.20509 1.8351.34038.4613.17914.7901.39332 1.1358.73922.346.3459.5601.6754.7397 1.1366.1353.348.2965.871.3403 1.8347.0474 1.0419.0577 1.3549.0577 3.9927 0 2.6377-.0103 2.9507-.0577 3.9926-.044.9637-.205 1.4867-.3403 1.8347-.1792.4612-.3937.7896-.7397 1.1354-.3459.3459-.6743.56-1.1358.7392-.348.1359-.8714.2965-1.8351.3406-1.0419.0473-1.3549.0576-3.9938.0576-2.6392 0-2.952-.0103-3.9939-.0576-.9637-.0445-1.4867-.2055-1.8353-.3408-.4612-.1792-.7907-.3933-1.1366-.7392-.346-.346-.56012-.6746-.73968-1.1361-.13528-.3479-.29651-.871-.34037-1.8346-.04736-1.0419-.05683-1.3549-.05683-3.9943s.00947-2.9507.05683-3.9927c.04406-.9636.20509-1.4866.34037-1.835.17915-.4613.39368-.7907.73968-1.1367.3459-.3459.6754-.56006 1.1366-.73962.3484-.1359.8716-.29651 1.8353-.34078.9118-.04118 1.2651-.05354 3.1072-.0556zm6.1626 1.64143c-.6548 0-1.186.5306-1.186 1.1856 0 .6548.5312 1.1861 1.186 1.1861.6549 0 1.1861-.5313 1.1861-1.1861s-.5312-1.1861-1.1861-1.1861zm-5.2759 1.3858c-2.8031 0-5.0757 2.2726-5.0757 5.0757s2.2726 5.0747 5.0757 5.0747 5.0749-2.2716 5.0749-5.0747-2.272-5.0757-5.0751-5.0757zm0 1.7808c1.8194 0 3.2946 1.475 3.2946 3.2946 0 1.8195-1.4752 3.2946-3.2946 3.2946-1.8197 0-3.2946-1.4751-3.2946-3.2946 0-1.8196 1.4749-3.2946 3.2946-3.2946z" fill="#fff" fill-rule="evenodd"/></g></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
