@extends('layouts.app')

@section('content')
<div class="al-main">
    <div class="al-content">
        <div class="content-top">
            {{-- @TODO: Dynamic? --}}
            <h1 class="al-title">Dashboard</h1>
            <ul class="breadcrumb al-breadcrumb">
                {{-- @TODO: Dynamic --}}
                <li><a href="#">Home</a></li>
                <li>
                    Dashboard
                </li>
            </ul>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="panel medium-panel traffic-panel animated zoomIn">
                        <div class="panel-heading">
                            <h3>Example Heading</h3>
                        </div>
                        <div class="panel-body">
                            Example Body
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="panel medium-panel traffic-panel animated zoomIn">
                        <div class="panel-heading">
                            <h3>Example Heading</h3>
                        </div>
                        <div class="panel-body">
                            Example Body
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
