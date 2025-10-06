<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <label for="">{{$label}}</label><br>
        <input type={{$type}}  name={{$name}}><br>
        <span>
            @error($name)
            {{$message}}
            @enderror
        </span><br>
</div>