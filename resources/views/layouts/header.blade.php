    <div class="d-flex flex-column flex-md-row align-item-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 mr-md-auto front-weight-normal">Example</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark {{ url()->current() === route('home.index') ? 'active' : '' }}" aria-current="page" href="{{ route('home.index') }}">Home</a>
            <a class="p-2 text-dark" {{ url()->current() === route('home.contact') ? 'active' : '' }} pe-0" href="{{ route('home.contact') }}">Contact</a>
            <a class="p-2 text-dark" {{ url()->current() === route('articles.index') ? 'active' : '' }}" href="{{ route('articles.index') }}">Articles</a>
        </nav>
    </div>
