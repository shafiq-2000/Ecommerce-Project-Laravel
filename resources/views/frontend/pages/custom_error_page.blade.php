@include('frontend.components.css')

@include('frontend.components.header')

<style>
    .error-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
        text-align: center;
        padding: 20px;
    }

    .error-wrapper h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 20px;
    }

    .error-wrapper img {
        width: 400px;
        max-width: 90%;
        height: auto;
        margin-bottom: 20px;
    }

    .error-wrapper p {
        font-size: 1.2rem;
        color: #666;
    }
</style>

<div class="error-wrapper">
    <h1>Oops! There's nothing here.</h1>
    <img src="{{ asset('images/404page.PNG') }}" alt="Page Not Found">
    <p>The page you are looking for doesn’t exist or has been moved.</p>
</div>

@include('frontend.components.footer')

@include('frontend.components.js')
