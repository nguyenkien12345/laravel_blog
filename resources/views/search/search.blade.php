<div class="container">
    <form action="{{route('search.query')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search..." />
        <button type="submit">Search</button>
    </form>
</div>