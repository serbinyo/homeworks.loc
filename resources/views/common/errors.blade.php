@if(count($errors) > 0)

    <div class="alert alert-danger">

        <div class="message js-form-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@endif