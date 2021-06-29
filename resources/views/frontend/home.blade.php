@extends('frontend.layout')
@section('content')

    <h1 class="text-center text-lg-left">DatabaseTester кош келдиңиз!</h1>
    <div class="float-lg-right main-image m-auto m-lg-0" style="background-image: url({{ asset('img/hosting.png') }})"></div>
    <p>
        Бул жерде сиз көнүгүүлөрдү чыгарып өзүңүздүн жөндөмдөрүңүздү өнүктүрсөңүз болот.
        Бул сайтты колдонуу үчүн сөзсүз түрдө катталуу керек. Эгерде катталуу менен кандайдыр
        бир проблемалар болсо, анда мугалимиңизге кайрылсаңыз болот. Бул жерде сиз:
        Here you can solve problems and improve your skills. Before you start to use
        this site you have to register. If you have some problems while registering
        you can ask your teacher for help. Here what you can do:
    </p>
    <p class="font-weight-bold">Бул жерде сиз суроо талаптарды төмөнкү БББС синтаксистеринде жазсаңыз болот: </p>
    <ul>
        <li>MySql</li>
        <li>PostgreSQL</li>
        <li>MsSQL</li>
    </ul>
    <p class="font-weight-bold">
        Мурда чыгарган чыгарылыштарды көрө аласыз.
    </p>
    <p>
        Эгерде сиз бир көнүгүүнү чыгарып жана кийинчерек ал көнүгүүнүн чыгарылышы керек
        болсо, анда сиз бул жактан көрө аласыз. Ал туура чыгарылышты көрүү үчүн
        көнүгүүнүн ылдый жагында "Акыркы туура чыгарылыш" деген баскычты басуу керек.
    </p>
    <p>
        Же бир көнүгүүнү чыгарып жатып аны кийин уланткыңыз келеби?
        Анда ал көнүгүүнү системага жөнөтүп койсоңуз система аны эстеп калат
        (Систаксистик каталар болсо дагы сактай берет. Кийин уланткыңыз келген учурда
        көнүгүүнүн ылдый жагындагы "Акыркы чыгарылыш" деген баскычты бассаңыз акыркы жөнөткөн
        кодуңуз көрсөтүлөт.
    </p>
    <div>
        <a href="{{ route('frontend.tasks.index') }}" class="btn btn-success">
            Колдонуп көрүү
        </a>
    </div>
@endsection
