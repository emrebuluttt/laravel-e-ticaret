@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">{{ __('Sanal POS Ödeme Sayfası') }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                        <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                        <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo {{$token}};?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                        <script>iFrameResize({},'#paytriframe');</script>
                        <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
