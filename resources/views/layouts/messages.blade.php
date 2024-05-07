@if ($errors->any())
    <div class="alert alert-danger">
        {{-- Display multiple messages in a list. --}}
        @if($errors->count() > 1)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        {{-- Display multiple messages in a list. --}}
        @if(is_array(session()->get('success')))
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif


@if (session()->has('messageBag') && $messageBag = session()->get('messageBag'))
    @if ($messageBag->isNotEmpty())
        {{-- Loop over message keys for proper styling. --}}
        @foreach ($messageBag->keys() as $messageBagKey)
            <div class="alert alert-{{ $messageBagKey }}">
                @php
                    $messageBagKeyMessages = $messageBag->get($messageBagKey);
                @endphp
                {{-- Display multiple messages in a list. --}}
                @if (count($messageBagKeyMessages) > 1)
                    <ul>
                        @foreach ($messageBagKeyMessages as $messageBagValue)
                            <li>{{ $messageBagValue }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ $messageBagKeyMessages[0] }}
                @endif
            </div>
        @endforeach
        @php
        // Reset messageBag
        $messageBag = new Illuminate\Support\MessageBag;
        session()->put('messageBag', $messageBag);
        @endphp
    @endif
@endif
<style>
    .alert {
        margin: 0;
    }
</style>