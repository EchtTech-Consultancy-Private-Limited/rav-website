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
                @foreach($news as $key=>$newses)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $newses->title_name_en  }}</td>
                    <td>{{ $newses->start_date }}</td>
                    <td>
                        @if(isset($newses->public_url) && $newses->public_url !='')
                            <a href="{{ $newses->public_url??'' }}" target="_blank">Click Here</a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
       
    </div>
</section>

@endsection