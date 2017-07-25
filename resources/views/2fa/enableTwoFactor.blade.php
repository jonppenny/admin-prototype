@extends('site.partials.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">2FA Secret Key</div>

                    <div class="panel-body">
                        @if ($enabled)
                            Two factor authentication has already been enabled on your account.
                        @else
                            Open up your 2FA mobile app and scan the following QR barcode:
                            <br/>
                            <img alt="Image of QR barcode" src="{{ $image }}"/>

                            <br/>
                            If your 2FA mobile app does not support QR barcodes,
                            enter in the following number: <code>{{ $secret }}</code>
                            <br/><br/>
                            @if ($recovery_codes)
                                <div>
                                @foreach($recovery_codes as $code)
                                    {{ $code }}<br/>
                                @endforeach
                                </div>
                            @endif
                            <br/><br/>
                            <a href="/myprofile">Back to My Profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection