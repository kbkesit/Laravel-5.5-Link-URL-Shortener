@extends('layouts.master')

@section('title')
    #ahref | Link Shortener
@endsection

@section('main-content')
    <div id="link-shortener" class="has-text-centered">
        <h1 class="title">
            "Link Shortener Made Easy"
        </h1>
        <p class="subtitle">
            <em>paste your long URL below:</em>
        </p>

        <form id="link-form" action="{{ route('link.shorten') }}" method="post">
            {{ csrf_field() }}
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input class="input long_url" type="text" id="long_url" name="long_url" placeholder="Long URL ...">
                </p>
                <p class="control">
                    <input type="submit" class="button is-info" value="Shorten!">
                </p>
            </div>
        </form>

        <div id="result">
            <p>Your Shorten Link: <span id="shorten_link_result"></span></p>
            <p>Thank you for using our service!</p>
        </div>

    </div>


@endsection