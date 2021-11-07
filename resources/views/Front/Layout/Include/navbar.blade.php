<header id="nav-bar" class="sticky-top">
    <div class="container">
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="{{ URL::to('/') }}">
                    <i class="fas fa-home"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                পৌরসভার তথ্য
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">পৌরসভার সংক্ষিপ্ত বিবরন</a>
                                <a class="dropdown-item" href="#">পৌরসভার সাংগঠনিক
                                    কাঠামো</a>
                                <a class="dropdown-item" href="#">পৌরসভার মানচিত্র</a>
                                <a class="dropdown-item" href="#">সম্মানিত মেয়রদের তালিকা</a>
                                <a class="dropdown-item" href="#">পৌরসভার কর্মকর্তা ও
                                    কর্মচারী</a>
                                <a class="dropdown-item" href="#">শিক্ষা বিষয়ক তথ্য</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">যোগাযোগ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                জরুরী যোগাযোগ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('webpage.mayorProfile') }}">মেয়রের প্রোফাইল
                                    এবং
                                    সংযোগ</a>
                                <a class="dropdown-item" href="{{ route('webpage.councilor') }}">কাউন্সিলরদের
                                    প্রোফাইল
                                    এবং সংযোগ</a>
                                <a class="dropdown-item" href="{{ route('webpage.uno') }}">প্রধান নির্বাহী কর্মকর্তার
                                    প্রোফাইল এবং
                                    সংযোগ</a>
                                <a class="dropdown-item" href="#">তথ্য পরিষেবা
                                    কেন্দ্র</a>
                                <a class="dropdown-item" href="{{ route('webpage.admin') }}">প্রশাসন বিভাগ</a>
                                <a class="dropdown-item" href="{{ route('webpage.engineer') }}">প্রকৌশল বিভাগ</a>
                                <a class="dropdown-item" href="health">স্বাস্থ্য বিভাগ</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('webpage.notice') }}">নোটিশ</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ডাউনলোড
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('webpage.form') }}">ফরম</a>
                                <a class="dropdown-item" href="{{ route('webpage.citizen') }}">সিটিজেন েচার্টার</a>
                                <a class="dropdown-item" href="{{ route('webpage.onceEye') }}">এক নজরে</a>
                            </div>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                অন্যান্য
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">অন্যান্য</a>
                            </div>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">ডিজিটাল সেবা</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                রেজিস্ট্রেশন
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('reg.bosot') }}">বসতবাড়ী
                                    হোল্ডিং নিবন্ধন</a>
                                <a class="dropdown-item" href="{{ route('reg.business-hold') }}">ব্যবসা
                                    প্রতিষ্ঠান নিবন্ধন</a>
                                <a class="dropdown-item" href="{{ route('reg.commercial-hold') }}">বানিজ্যিক
                                    হোল্ডিং নিবন্ধন</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
