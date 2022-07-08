@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
    مجموعات المنتجات
    {{--    Type Here --}}
@endsection

{{--Add Css Links Here --}}
@section('css')

    {{--    Type Here --}}

@endsection

{{--Set The BreadCrumb Title From Here --}}
@section('breadcrumb-title')

    المجموعات
    {{--    Type Here --}}
@endsection

{{--Set The Nested Of ListBreadCrumb  From Here --}}
@section('breadcrumb')
    {{--    Type Here --}}
    <li class="breadcrumb-item active" aria-current="page"> مجموعات المنتجات</li>
@endsection


{{--Main Content Here--}}
@section('content')

{{--    Type Here --}}

    {{csrf_token()}}

@endsection



{{--Main Footer Here--}}
@section('footer')

    {{--    Type Here --}}

@endsection


{{--Add Javescript Files Here --}}
@section('js')
    {{--    Type Here --}}
@endsection
