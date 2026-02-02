@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0 text-center">{{ __('اتصل بنا') }}</h4>
                </div>
                <div class="card-body p-4 p-md-5">

                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">{{ __('الاسم') }}</label>
                                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">{{ __('البريد الإلكتروني') }}</label>
                                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('الموضوع') }}</label>
                            <input type="text" name="subject" class="form-control rounded-3 @error('subject') is-invalid @enderror" value="{{ old('subject') }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('الرسالة') }}</label>
                            <textarea name="message" rows="5" class="form-control rounded-3 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-pill shadow">
                            {{ __('إرسال الرسالة') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
