<h2>List of articles:</h2>
@foreach($articles as $article)
    <h3>{{ $article['title'] }}</h3>
    <p>{{ $article['content'] }}</p>
@endforeach

