@extends('layout.master')
@section('title')
{{ __('RAV') }}
@endsection
@section('content')
<section class="master bg-grey" id="main-content">
    <div class="container">
        <div class="about">
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Apply Here</th>
                </tr>
            </thead>
            <tbody>
                @foreach($career as $key=>$careers)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $careers->title_name_en  }}</td>
                    <td>{{ $careers->start_date }}</td>
                    
                    <td>
                    @foreach($careers->pdf as $pdfs)
                        @if(isset($pdfs->public_url) && $pdfs->public_url !='')
                            <a href="{{ asset('resources/uploads/CareerManagement/' .$pdfs->public_url)??'' }}" target="_blank">{{$pdfs->pdf_title}} @if(isset($careers->pdf) && count($careers->pdf)>1) , @endif</a>
                        @else
                            N/A
                        @endif
                    @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
       
    </div>
</section>

@endsection