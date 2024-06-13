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
                <tr>
                    <td>column1</td>
                    <td>column2</td>
                    <td>column3</td>
                    <td>column4</td>
                </tr>
                <tr>
                    <td>column1</td>
                    <td>column2</td>
                    <td>column3</td>
                    <td>column4</td>
                </tr>
                <tr>
                    <td>column1</td>
                    <td>column2</td>
                    <td>column3</td>
                    <td>column4</td>
                </tr>
                <tr>
                    <td>column1</td>
                    <td>column2</td>
                    <td>column3</td>
                    <td>column4</td>
                </tr>
            </tbody>
        </table>
        </div>
       
    </div>
</section>

@endsection