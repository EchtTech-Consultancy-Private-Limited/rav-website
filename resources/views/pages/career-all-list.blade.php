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
                        @if(isset($careers->public_url) && $careers->public_url !='')
                            <a href="{{ asset('resources/uploads/CareerManagement/' .$careers->public_url)??'' }}" target="_blank">Click Here</a>
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