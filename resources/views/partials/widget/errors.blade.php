 @if($errors->all())
    <div class="bg-danger p-3 mb-2 col-12">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif