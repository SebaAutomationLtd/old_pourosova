<!doctype html>
<html lang="en">

<head>
    <title>Bosot Bari Holding Report</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('pdf/css/style.css') }}">
    
   
</head>

<body>


    <main>
        <header>
            <div class="top-header">
                <img src="{{ asset('img/logo.png') }}" width="80" alt="">
                <div class="header-text">
                    <span class="heading-text">{{ $general_settings->title_bangla }} পৌরসভা</span>
                    <span class="sub-heading-text">{{ $general_settings->title_bangla }}, ময়মনসিংহ</span>
                    <span class="report-name">বসত বাড়ি রিপোর্ট</span>
                </div>
                <img src="{{ asset('img/mujib_sotoborso.svg') }}" width="80" alt="">
            </div>

            <div class="ward-village">
                <span>ওয়ার্ড নং : ১, </span>
                <span>গ্রাম : </span>
            </div>
           
    
        </header>
        <div>
            <div class="watermark">
                <img src="{{ asset('img/BangladeshGovt.svg') }}" alt="">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>হোল্ডিং</th>
                        <th>নাম</th>
                        <th>পিতা</th>
                        <th>ভোটার আইডি নং</th>
                        <th>মেবাইল নং</th>
                        <th>বাড়ীর ধরন</th>
                        <th>রুম সংখ্যা</th>
                        <th>দৈর্ঘ</th>
                        <th>প্রস্থ</th>
                        <th>বাৎসরিক মূল্যায়ন</th>
                        <th>বাৎসরিক কর</th>
                        <th>সব শেষ কর পরিশোধ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->holding_no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->father_name }}</td>
                            <td>{{ $item->nid }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->house_type_name }}</td>
                            <td>{{ $item->number_room }}</td>
                            <td>{{ $item->length_number }}</td>
                            <td>{{ $item->width_number }}</td>
                            <td>{{ $item->house_year_value }}</td>
                            <td>{{ $item->yearly_vat }}</td>
                            <td>{{ $item->last_tax_year }}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
                
            </table>
        </div>
        
    </main>

</body>

</html>